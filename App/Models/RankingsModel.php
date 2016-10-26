<?php
/**
 * @model RankingsModel
 * @created at 23-10-2016 18:56:45
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Models;

use HTR\System\ModelCRUD;
use HTR\Helpers\Mensagem\Mensagem as msg;
use App\Models\PublicacoesModel;

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

        $publicacoesModel = new PublicacoesModel($this->pdo);
        // consulta pelo ID da publicação
        $publicacao = $publicacoesModel->findById($publicacaoId);
        // verifica se publicação é válida
        // caso false retorna false
        if (!isset($publicacao['id'])) {
            return false;
        }

        $dados = [
            'publicacoes_id' => $publicacaoId,
            'timestamp' => time(),
        ];

        // insere um novo registro no ranking
        $this->insert($dados);

        return $publicacoesModel->loadPublicacao($publicacao);
    }
}
