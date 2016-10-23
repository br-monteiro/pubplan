<?php
/**
 * @model RankingsModel
 * @created at 23-10-2016 18:56:45
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Models;

use HTR\System\ModelCRUD;

class RankingsModel extends ModelCRUD
{
    /**
     * Entidade padrão do Model
     */
    protected $entidade = 'rankings';

    /**
     * @param \PDO $pdo Recebe uma instância do PDO
     */
    public function __construct(\PDO $pdo = null)
    {
        parent::__construct($pdo);
    }

    /**
     * Método responsável por salvar os registros
     */
    public function novo($publicacaoId)
    {

       $dados = [
          'publicacoes_id' => $publicacaoId,
          'timestamp' => time(),
        ];

        $this->insert($dados);
    }
}
