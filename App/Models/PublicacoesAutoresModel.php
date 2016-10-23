<?php
/**
 * @model PublicacoesAutoresModel
 * @created at 23-10-2016 12:02:40
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Models;

use HTR\System\ModelCRUD;
use HTR\Helpers\Mensagem\Mensagem as msg;
use HTR\Helpers\Paginator\Paginator;
use HTR\System\Security;

class PublicacoesAutoresModel extends ModelCRUD
{
    use \App\Validators\PublicacoesAutoresValidatorTrait;

    /**
     * Entidade padrão do Model
     */
    protected $entidade = 'publicacoes_autores';
    protected $id;
    protected $autoresId;
    protected $publicacoesId;

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
     * Retorna todos os dados de autores relacionados com a publicação
     * @param int $id
     */
    public function returnAllByPublicacao($id)
    {
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade . " AS pubaut"))
            ->join('autores', 'id = pubaut.autores_id')
            ->setFields(['pubaut.id', 'autores.nome'])
            ->setFilters()
            ->where('pubaut.publicacoes_id', '=', $id);

        return $this->db->execute()->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function paginator($pagina)
    {
        /**
         * Preparando as diretrizes da consulta
         */
        $dados = [
            'pdo' => $this->pdo,
            'entidade' => $this->entidade,
            'pagina' => $pagina,
            'maxResult' => 20,
            // USAR QUANDO FOR PARA DEMONSTRAR O RESULTADO DE UMA PESQUISA
            //'orderBy' => 'nome ASC',
            //'where' => 'nome LIKE ?',
            //'bindValue' => [0 => '%MONTEIRO%']
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

    /**
     * Método responsável por salvar os registros
     */
    public function novo()
    {
        $token = new Security();
        $token->checkToken();

        // Valida dados
        $this->validateAll();
        // Verifica se há registro igual e evita a duplicação
        $this->notDuplicate();

       $dados = [
          'autores_id' => $this->getAutoresId(),
          'publicacoes_id' => $this->getPublicacoesId(),
        ];

        if ($this->insert($dados)) {
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
        // Verifica se há registro igual e evita a duplicação
        $this->notDuplicate();

       $dados = [
          'autores_id' => $this->getAutoresId(),
          'publicacoes_id' => $this->getPublicacoesId(),
        ];

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
            header('Location: ' . APPDIR . 'publicacoesAutores/visualizar/');
        }
    }

    /**
     * Evita a duplicidade de registros no sistema
     */
    private function notDuplicate()
    {
        // Não deixa duplicar os valores do campo autores_id
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('autores_id', '=' , $this->getAutoresId());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>autores_id</strong>.'
                . '<script>focusOn("autores_id")</script>', 'warning');
        }
        // Não deixa duplicar os valores do campo publicacoes_id
        $this->db->instruction(new \HTR\Database\Instruction\Select($this->entidade))
                ->setFields(['id'])
                ->setFilters()
                ->where('id', '!=', $this->getId())
                ->whereOperator('AND')
                ->where('publicacoes_id', '=' , $this->getPublicacoesId());
        $result = $this->db->execute()->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            msg::showMsg('Já existe um registro com este(s) caractere(s) no campo '
                . '<strong>publicacoes_id</strong>.'
                . '<script>focusOn("publicacoes_id")</script>', 'warning');
        }
    }

    /*
     * Validação dos Dados enviados pelo formulário
     */
    private function validateAll()
    {
        // Seta todos os valores
        $this->setId(filter_input(INPUT_POST, 'id'));
        $this->setAutoresId(filter_input(INPUT_POST, 'autores_id'));
        $this->setPublicacoesId(filter_input(INPUT_POST, 'publicacoes_id'));

        // Inicia a Validação dos dados
        $this->validateId();
        $this->validateAutoresId();
        $this->validatePublicacoesId();
    }

    private function setId($value)
    {
        $this->id = $value ? : time();
        return $this;
    }
}
