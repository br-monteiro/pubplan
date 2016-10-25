<?php

/*
 * @Controller Index
 */
namespace App\Controllers;

use HTR\System\ControllerAbstract as Controller;
use HTR\Interfaces\ControllerInterface as CtrlInterface;
use App\Models\CategoriasModel as Categoria;
use App\Models\PublicacoesModel as Publicacoes;

class IndexController extends Controller implements CtrlInterface
{

    /*
     * Inicia os atributos usados na View
     */
    public function __construct()
    {
        $this->view['controller'] =  APPDIR . 'index/';
        parent::__construct();
    }

    /*
     * Action DEFAULT
     * Atenção: Todo Controller deve conter uma Action 'indexAction'
     */
    public function indexAction()
    {
        $publicacoes = new Publicacoes();
        $this->view['resultPublicacoes'] = $publicacoes->returnAll();
        $categorias = new Categoria();
        $this->view['resultCategorias'] = $categorias->returnAll();
        // Renderiza a view index.phtml com o layout blank
        $this->render('Index.index');
    }
    
    public function DetalhesAction()
    {
        $publicacoes = new Publicacoes();
        $this->view['resultPublicacao'] = $publicacoes->findById($this->getParam('id'));
        
        // Renderiza a view detalhes.phtml com o layout blank
        $this->render('Index.detalhes');
    }
}
