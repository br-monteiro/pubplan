<?php

/*
 * @Controller Index
 */
namespace App\Controllers;

use HTR\System\ControllerAbstract as Controller;
use HTR\Interfaces\ControllerInterface as CtrlInterface;
use HTR\Helpers\Access\Access;
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
        
        $this->access = new Access();
    }

    /*
     * Action DEFAULT
     * Atenção: Todo Controller deve conter uma Action 'indexAction'
     */
    public function indexAction()
    {
        $publicacoes = new Publicacoes($this->access->pdo);
        $this->view['resultCarousel'] = $publicacoes->filtroCarousel();
        $categorias = new Categoria($this->access->pdo);
        $this->view['resultCategorias'] = $categorias->returnAll();
        $this->view['numPag'] = $this->getParam('pagina');
        // Renderiza a view index.phtml com o layout blank
        $this->render('Index.index');
    }

    public function detalhesAction()
    {
        $publicacoes = new Publicacoes($this->access->pdo);
        $categorias = new Categoria($this->access->pdo);

        $this->view['resultPublicacao'] = $publicacoes->findById($this->getParam('id'));
        $tags = isset($this->view['resultPublicacao']['palavras_chave']) ? $this->view['resultPublicacao']['palavras_chave'] : [];
        $this->view['resultTagsPublicacao'] = explode(', ', $tags);

        $this->view['resultCategorias'] = $categorias->returnAll();

        // Renderiza a view detalhes.phtml com o layout blank
        $this->render('Index.detalhes');
    }

    public function filtroCategoriaAction(){
        $publicacoesModel = new Publicacoes($this->access->pdo);
        $categorias = new Categoria($this->access->pdo);

        $find = $this->getParam('id');

        $result = $publicacoesModel->filterByCategoria($this->getParam('pagina'), $find);

        $this->view['action'] = 'filtrocategoria';

        $this->view['resultCategorias'] = $categorias->returnAll();

        $this->view['resultPublicacoes'] = $result[0];

        $this->view['btn'] = $result[1];

        $this->view['findBy'] = 'id/' . $find;

        $this->render('Index.filtro_categorias');
    }
    
    public function buscaAction()
    {
        $publicacoes = new Publicacoes($this->access->pdo);
        
        $publicacoes->paginatorFiltro($this->getParam('pagina'), $this->getParam('por'));
        $this->view['resultPublicacoes'] = $publicacoes->getResultadoPaginator();
        $this->view['btn'] = $publicacoes->getNavePaginator();

        $this->render('Index.lista_resultados');
    }
}
