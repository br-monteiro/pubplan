<?php
/**
 * @model PublicacoesModel
 * @created at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Models;

use HTR\System\ModelCRUD;
use HTR\Helpers\Mensagem\Mensagem as msg;
use HTR\Helpers\Paginator\Paginator;
use HTR\System\Security;
use App\Models\PublicacoesAutoresModel;

class PublicacoesModel extends ModelCRUD
{
    use \App\Validators\PublicacoesValidatorTrait;

    /**
     * Entidade padrão do Model
     */
    protected $entidade = 'publicacoes';
    protected $id;
    protected $titulo;
    protected $ano;
    protected $editora;
    protected $edicao;
    protected $isbn;
    protected $sinopse;
    protected $palavrasChave;
    protected $numeroPagias;
    protected $link;
    protected $idiomasId;
    protected $categoriasId;
    protected $tiposId;
    protected $rankingsId;
    protected $autores;

    private $resultadoPaginator;
    private $navePaginator;

    /**
     * @param \PDO $pdo Recebe uma instância do PDO
     */
    public function __construct(\PDO $pdo = null)
    {
        parent::__construct($pdo);
    }

    /**
     * Método uaso para retornar todos os dados da tabela.
     */
    public function returnAll()
    {
        /**
         * Método padrão do sistema usado para retornar todos os dados da tabela
         */
        return $this->findAll();
    }

    /**
     * :: REESCRITA DO MÉTODO MÁGICO | IMPLEMENTAÇÃO DISPONÍVEL APENAS PARA PublicacoesModel ::
     * Consulta o registro de publicação por ID
     * @param int $id Id da publicação a ser consultatada
     */
    public function findById($id)
    {
        /**
         * Instancia o model de relacionamento com autores
         */
        $autoresByPublicacoes = new PublicacoesAutoresModel($this->pdo);
        /**
         * consulta todos os autores da publicação identificada com este ID
         */
        $autores = $autoresByPublicacoes->returnAllByPublicacao($id);
        $val = [];
        foreach ($autores as $value) {
            $val[] = $value['id'];
        }

        /**
         * Consulta os dados da publicação
         */
        $value = parent::findById($id);
        /**
         * Agrega aos dados da publicação os dados dos autores
         */
        $value['autores'] = $val;

        return $value;
    }

    public function paginator($pagina)
    {
        /**
         * Preparando as diretrizes da consulta
         */
        $dados = [
            'pdo' => $this->pdo,
            'select' => ' *,publicacoes.id as id_p, idiomas.nome as nome_idioma, '
                . 'categorias.nome as nome_categoria, '
                . 'tipos.nome as nome_tipos',
            'entidade' => '`publicacoes`
                INNER JOIN idiomas ON idiomas_id=idiomas.id
                INNER JOIN categorias ON categorias_id=categorias.id
                INNER JOIN tipos ON tipos.id=tipos_id',
            'pagina' => $pagina,
            'maxResult' => 20
        ];

        // Instacia o Helper que auxilia na paginação de páginas
        $paginator = new Paginator($dados);
        // Resultado da consulta
        $this->resultadoPaginator =  $paginator->getResultado();
        // Links para criação do menu de navegação da paginação @return array
        $this->navePaginator = $paginator->getNaveBtn();
    }


    /**
     * Acessivel para o Controller coletar os resultados
     */
    public function getResultadoPaginator()
    {
        return $this->resultadoPaginator;
    }

    /**
     * Acessivel para o Controller coletar os links da paginação
     */
    public function getNavePaginator()
    {
        return $this->navePaginator;
    }

    private function upload($dados, $id)
    {
        if (!$dados) {
            return;
        }

        if (file_exists('imagem/upload/' . $id . '.jpg')) {
            return;
        }

        if (empty($dados['imglivro'])) {
            msg::showMsg('É necessário fornecer uma <strong>imagem de capa</strong> para publicação.', 'danger');
        }

        if ($dados['imglivro']['type'] != 'image/jpeg') {
            msg::showMsg('A imagem de capa deve ser do tipo JPEG. '
                . '<strong>Extensão *.jpg</strong>.', 'danger');
        }

        if ($dados['imglivro']['size'] == 0) {
            msg::showMsg('Ocorreu um erro ao enviar a capa do livro.'
                . 'Verifique se o tamanho da imagem ultrapassa <strong>2MB</strong>.', 'danger');
        }

        if (!move_uploaded_file($dados['imglivro']['tmp_name'], 'images/uploads/' . $id . '.jpg')) {
            msg::showMsg('Ocorreu um erro ao salvar a capa do livro'
                . 'Verifique sua conexão com a internet.', 'danger');
        }

        if (!isset($dados['arquivo'])) {
            return;
        }

        if ($dados['arquivo']['type'] != 'application/pdf') {
            msg::showMsg('O arquivo de publicação deve ser no formato PDF. '
                . '<strong>Extensão *.jpg</strong>.', 'danger');
        }

        if ($dados['arquivo']['size'] == 0) {
            msg::showMsg('Ocorreu um erro ao enviar o arquivo de puplicação.'
                . 'Verifique se o tamanho da imagem ultrapassa <strong>10MB</strong>.', 'danger');
        }

        if (!move_uploaded_file($dados['arquivo']['tmp_name'], 'files_uploads/' . $id . '.pdf')) {
            msg::showMsg('Ocorreu um erro ao salvar o arquivo de publicação.'
                . 'Verifique sua conexão com a internet.', 'danger');
        }
    }

    /**
     * Método responsável por salvar os registros
     */
    public function novo()
    {
        $token = new Security();
        $token->checkToken();

        $pubAuts = new PublicacoesAutoresModel($this->pdo);

        // Valida dados
        $this->validateAll();
        // Verifica se há registro igual e evita a duplicação
        $this->notDuplicate();

       $dados = [
          'titulo' => $this->getTitulo(),
          'ano' => $this->getAno(),
          'editora' => $this->getEditora(),
          'edicao' => $this->getEdicao(),
          'isbn' => $this->getIsbn(),
          'sinopse' => $this->getSinopse(),
          'palavras_chave' => $this->getPalavrasChave(),
          'numero_pagias' => $this->getNumeroPagias(),
          'link' => $this->getLink(),
          'idiomas_id' => $this->getIdiomasId(),
          'categorias_id' => $this->getCategoriasId(),
          'tipos_id' => $this->getTiposId(),
        ];

       if ($this->insert($dados)) {

            $id = $this->pdo->lastInsertId();

            $this->upload($_FILES, $id);

            $pubAuts->novo($this->getAutores(), $id);

            if (!$this->validateLink($id)) {
                $pubAuts->remove($this->getAutores(), $this->pdo->lastInsertId());
                $this->delete($id);
                return;
            }

            msg::showMsg('111', 'success');
        }
    }

    /**
     * Método responsável por alterar os registros
     */
    public function editar()
    {
        $token = new Security();
        $token->checkToken();

        // Valida dados
        $this->validateAll();
        // valida o link
        if(!$this->validateLink($this->getId())) {
            return;
        }
        // Verifica se há registro igual e evita a duplicação
        $this->notDuplicate();

       $dados = [
          'titulo' => $this->getTitulo(),
          'ano' => $this->getAno(),
          'editora' => $this->getEditora(),
          'edicao' => $this->getEdicao(),
          'isbn' => $this->getIsbn(),
          'sinopse' => $this->getSinopse(),
          'palavras_chave' => $this->getPalavrasChave(),
          'numero_pagias' => $this->getNumeroPagias(),
          'link' => $this->getLink(),
          'idiomas_id' => $this->getIdiomasId(),
          'categorias_id' => $this->getCategoriasId(),
          'tipos_id' => $this->getTiposId(),
        ];

        $pubAuts = new PublicacoesAutoresModel($this->pdo);
        $pubAuts->updateListOfAuthors($this->getAutores(), $this->getId());

        $this->upload($_FILES, $this->getId());

        if ($this->update($dados, $this->getId())) {
            msg::showMsg('001', 'success');
        }
    }

    /**
     * Método responsável por remover os registros do sistema
     */
    public function remover($id)
    {
        if ($this->delete($id)) {
            header('Location: ' . APPDIR . 'publicacoes/visualizar/');
        }
    }
    
    /**
     * Método responsável por filtro de carousel do sistema
     */
    public function filtroCarousel(){
        $query = "SELECT publicacoes.id, publicacoes.titulo FROM `rankings` "
                . "INNER JOIN publicacoes ON publicacoes_id=publicacoes.id "
                . "WHERE timestamp BETWEEN ? AND ? LIMIT 3";
        $stmt = $this->pdo->prepare($query);
        $Inicio = strtotime('today');
        $Fim = strtotime('+1 month');
        $stmt->execute([$Inicio, $Fim]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    /**
     * Método responsável por colocar as publicações na home do sistema com LIMIT 30
     */
    public function publicacoesLimit(){
        $query = "SELECT * FROM {$this->entidade} LIMIT 20";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    
    /**
     * Método responsável por filtro de categorias do sistema
     */
    public function filtroCategoria($id){
        $query = "SELECT * FROM {$this->entidade} WHERE categorias_id = ? ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Evita a duplicidade de registros no sistema
     */
    private function notDuplicate()
    {
        // Não deixa duplicar os valores do campo titulo
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('titulo', '=' , $this->getTitulo());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>Título da Obra</strong>.'
                . '<script>focusOn("titulo")</script>', 'warning');
        }
        // Não deixa duplicar os valores do campo ano
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('ano', '=' , $this->getAno());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>Ano</strong>.'
                . '<script>focusOn("ano")</script>', 'warning');
        }
        // Não deixa duplicar os valores do campo editora
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('editora', '=' , $this->getEditora());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>Editora</strong>.'
                . '<script>focusOn("editora")</script>', 'warning');
        }

        // Não deixa duplicar os valores do campo isbn
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('isbn', '=' , $this->getIsbn());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>ISBN</strong>.'
                . '<script>focusOn("isbn")</script>', 'warning');
        }
        // Não deixa duplicar os valores do campo sinopse
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('sinopse', '=' , $this->getSinopse());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>Sinopse</strong>.'
                . '<script>focusOn("sinopse")</script>', 'warning');
        }

    }

    /*
     * Validação dos Dados enviados pelo formulário
     */
    private function validateAll()
    {
        // Seta todos os valores
        $this->setId(filter_input(INPUT_POST, 'id'));
        $this->setTitulo(filter_input(INPUT_POST, 'titulo'));
        $this->setAno(filter_input(INPUT_POST, 'ano'));
        $this->setEditora(filter_input(INPUT_POST, 'editora'));
        $this->setEdicao(filter_input(INPUT_POST, 'edicao'));
        $this->setIsbn(filter_input(INPUT_POST, 'isbn'));
        $this->setSinopse(filter_input(INPUT_POST, 'sinopse'));
        $this->setPalavrasChave(filter_input(INPUT_POST, 'palavras_chave'));
        $this->setNumeroPagias(filter_input(INPUT_POST, 'numero_pagias'));
        $this->setLink(filter_input(INPUT_POST, 'link'));
        $this->setIdiomasId(filter_input(INPUT_POST, 'idiomas_id'));
        $this->setCategoriasId(filter_input(INPUT_POST, 'categorias_id'));
        $this->setTiposId(filter_input(INPUT_POST, 'tipos_id'));
        $this->setAutores(filter_input_array(INPUT_POST)['autores']);

        // Inicia a Validação dos dados
        $this->validateId();
        $this->validateTitulo();
        $this->validateAno();
        $this->validateEditora();
        $this->validateEdicao();
        $this->validateIsbn();
        $this->validateSinopse();
        $this->validatePalavrasChave();
        $this->validateNumeroPagias();
        $this->validateIdiomasId();
        $this->validateCategoriasId();
        $this->validateTiposId();
    }

    private function setId($value)
    {
        $this->id = $value ? : time();
        return $this;
    }
}
