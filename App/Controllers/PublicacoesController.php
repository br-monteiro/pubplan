<?php
/**
 * @Controller PublicacoesController
 * @Created at 20-10-2016 16:12:40
 * - Criado Automaticamente pelo HTR Assist
 */

namespace App\Controllers;

use HTR\System\ControllerAbstract as Controller;
use HTR\Interfaces\ControllerInterface;
use HTR\Helpers\Access\Access;
use App\Models\PublicacoesModel;

class PublicacoesController extends Controller implements ControllerInterface
{
    // Model padrão usado para este Controller
    private $modelDefault;

    // Atributo que guarda o Objeto de Proteção de Páginas (Access)
    private $access;

    public function __construct()
    {
        parent::__construct();

        $this->view['controller'] = APPDIR . 'publicacoes/';

        $this->modelDefault = PublicacoesModel::class;

        // Instancia o Helper que auxilia na proteção de páginas e autenticação de usuários
        $this->access = new Access();
    }

    /**
     * Action DEFAULT
     * Atenção: Todo Controller deve implementar a interface HTR\Interfaces\ControllerInterface
     */
    public function indexAction()
    {
        // Chama a Action Ver
        $this->visualizarAction();
    }

    /**
     * Action responsável por renderizar o formulário para novos registros
     */
    public function novoAction()
    {
        // relação com model CategoriasModel
        $categoriasModel = new \App\Models\CategoriasModel($this->access->pdo);
        $this->view['resultCategorias'] = $categoriasModel->returnAll();
        // relação com model IdiomasModel
        $idiomasModel = new \App\Models\IdiomasModel($this->access->pdo);
        $this->view['resultIdiomas'] = $idiomasModel->returnAll();
        // relação com model TiposModel
        $tiposModel = new \App\Models\TiposModel($this->access->pdo);
        $this->view['resultTipos'] = $tiposModel->returnAll();
        // relação com model AutoresModel
        $autoresModel = new \App\Models\AutoresModel($this->access->pdo);
        $this->view['resultAutores'] = $autoresModel->returnAll();

        $this->render('publicacoes.form_novo');
    }

    /**
     * Action responsável por renderizar o formulário para edição de registros
     */
    public function editarAction()
    {
        // Instanciando o Model padrão usado.
        $model = new $this->modelDefault($this->access->pdo);

        // relação com model CategoriasModel
        $categoriasModel = new \App\Models\CategoriasModel($this->access->pdo);
        $this->view['resultCategorias'] = $categoriasModel->returnAll();
        // relação com model IdiomasModel
        $idiomasModel = new \App\Models\IdiomasModel($this->access->pdo);
        $this->view['resultIdiomas'] = $idiomasModel->returnAll();
        // relação com model TiposModel
        $tiposModel = new \App\Models\TiposModel($this->access->pdo);
        $this->view['resultTipos'] = $tiposModel->returnAll();
        // relação com model AutoresModel
        $autoresModel = new \App\Models\AutoresModel($this->access->pdo);
        $this->view['resultAutores'] = $autoresModel->returnAll();

        $this->view['result'] = $model->findById($this->getParam('id'));
        $this->render('publicacoes.form_editar');
    }

    /**
     * Action responsável por eliminar os registros
     */
    public function eliminarAction()
    {
        // Instanciando o Model padrão usado.
        $model = new $this->modelDefault($this->access->pdo);
        $model->remover($this->getParam('id'));
    }

    /**
     * Action responsável por eliminar os registros
     */
    public function visualizarAction()
    {
        // Instanciando o Model padrão usado.
        $model = new $this->modelDefault($this->access->pdo);
        // Atribui os resultados retornados pela consulta
        // feita através do método paginator()
        $model->paginator($this->getParam('pagina'));
        $this->view['result'] = $model->getResultadoPaginator();
        $this->view['btn'] = $model->getNavePaginator();

        $this->render('publicacoes.index');
    }
    

    /**
     * Action responsável controlar a inserção de registros
     */
    public function registraAction()
    {
        // Instanciando o Model padrão usado.
        $model = new $this->modelDefault($this->access->pdo);
        $model->novo();
    }

    /**
     * Action responsável controlar a edição de registros
     */
    public function alteraAction()
    {
        // Instanciando o Model padrão usado.
        $model = new $this->modelDefault($this->access->pdo);
        $model->editar();
    }
}
