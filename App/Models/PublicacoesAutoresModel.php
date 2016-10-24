<?php
/**
 * @model PublicacoesAutoresModel
 * @created at 23-10-2016 12:02:40
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Models;

use HTR\System\ModelCRUD;
use HTR\Database\Instruction\Delete;

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
            ->setFields(['autores.id'])
            ->setFilters()
            ->where('pubaut.publicacoes_id', '=', $id);

        return $this->db->execute()->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Método responsável por salvar os registros
     */
    public function novo($dadosAutores, $publicacaoId)
    {
        $dadosAutores = is_array($dadosAutores) ? $dadosAutores : [$dadosAutores];

        foreach ($dadosAutores as $autor) {
            // Valida dados
            $this->validateAll($autor);

           $dados = [
              'autores_id' => $this->getAutoresId(),
              'publicacoes_id' => $publicacaoId,
            ];

            $this->insert($dados);
        }

        return true;
    }
    
    public function remove($autorId, $publicacaoId)
    {
        $this->db->instruction(new Delete($this->entidade))
            ->setFilters()
            ->where('autores_id', '=', $autorId)
            ->whereOperator('AND')
            ->where('publicacoes_id', '=', $publicacaoId);

        return $this->db->execute();
    }

    /*
     * Validação dos Dados enviados pelo formulário
     */
    private function validateAll($autorId)
    {
        // Seta todos os valores
        $this->setAutoresId(filter_var($autorId, FILTER_VALIDATE_INT));

        $this->validateAutoresId();
    }
}
