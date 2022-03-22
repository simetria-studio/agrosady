<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\URLGenerator as URL;
use App\Http\Controllers\Controller;
use Notifications;
use Mail;
use App\Prowork\Banner\Repositories\BannerRepository;
use App\Prowork\Blog\Repositories\BlogCategoriaRepository;
use App\Prowork\Blog\Repositories\BlogPostRepository;
use App\Prowork\Produtos\Repositories\ProdutoCategoriaRepository;
use App\Prowork\Produtos\Repositories\ProdutoRepository;
use App\Prowork\GaleriaImagem\Repositories\GaleriaImagemRepository;
use App\Prowork\Seo\Repositories\SeoRepository;
use App\Prowork\Institucional\Repositories\InstitucionalRepository;
use App\Http\Requests\FormContatoRequest;
use App\Http\Requests\FormTrabalheConoscoRequest;
use App\Http\Requests\FormProdutoRequest;
use App\Http\Requests\FormKitsRequest;
use SEOMeta;
use OpenGraph;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

class PageController extends Controller {

    protected $BannerRepository;
    protected $BlogCategoriaRepository;
    protected $BlogPostRepository;
    protected $ProdutoCategoriaRepository;
    protected $ProdutoRepository;
    protected $url;
    protected $GaleriaImagemRepository;
    protected $SeoRepository;
    protected $InstitucionalRepository;

    public function __construct(BlogCategoriaRepository $BlogCategoriaRepository, BlogPostRepository $BlogPostRepository, ProdutoCategoriaRepository $ProdutoCategoriaRepository, ProdutoRepository $ProdutoRepository, BannerRepository $BannerRepository, URL $url, GaleriaImagemRepository $GaleriaImagemRepository, SeoRepository $SeoRepository, InstitucionalRepository $InstitucionalRepository) {

        $this->BannerRepository = $BannerRepository;
        $this->BlogCategoriaRepository = $BlogCategoriaRepository;
        $this->BlogPostRepository = $BlogPostRepository;
        $this->ProdutoCategoriaRepository = $ProdutoCategoriaRepository;
        $this->ProdutoRepository = $ProdutoRepository;
        $this->url = $url;
        $this->GaleriaImagemRepository = $GaleriaImagemRepository;
        $this->SeoRepository = $SeoRepository;
        $this->InstitucionalRepository = $InstitucionalRepository;

        $cats_menu = $this->ProdutoCategoriaRepository->categorias(); //envia as categorias para todas as views para montar o menu dropdown de produtos
        View::share('cats_menu', $cats_menu);
    }

//    institucional
    public function institucional($slug) {
        $pagina_institucional = $this->InstitucionalRepository->getBySlug($slug);
        //        SEO
        SEOMeta::setTitle($pagina_institucional->titulo);
        SEOMeta::setDescription($pagina_institucional->present()->shortDescription($pagina_institucional->descricao, 200));
        OpenGraph::setTitle($pagina_institucional->titulo);
        OpenGraph::setDescription($pagina_institucional->present()->shortDescription($pagina_institucional->descricao, 200));
        OpenGraph::setUrl($this->url->current());

        return view('frontend/institucional', compact('pagina_institucional'));
    }

//    HOME
    public function home() {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('Home');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $banners = $this->BannerRepository->paginateImagemFrontend(array('filtro_banner' => 1), 100);
        $posts = $this->BlogPostRepository->paginateFrontend('', 3, '');
        return view('frontend/home', compact('banners', 'posts', 'categorias'));
    }

//    QUEM SOMOS
    public function quemSomos() {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('QuemSomos');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $pagina_institucional = $this->InstitucionalRepository->showPaginaNome('Quem-Somos');

        return view('frontend/quem-somos', compact('pagina_institucional'));
    }

//  BLOG
    public function blogList(request $request) {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('Notícias');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $filtro = $request->all();
        $posts = $this->BlogPostRepository->paginateFrontend('', 5, $filtro);
        return view('frontend/blog-list', compact('posts'));
    }

    public function blogView($slug) {
        $post = $this->BlogPostRepository->getBySlug($slug);
        if ($post) {
            //        SEO
            foreach ($post->categorias as $categoria) {
                $categorias[] = $categoria->nome;
            }
            SEOMeta::setTitle($post->titulo);
            if ($post->subtitulo != '') {
                SEOMeta::setDescription($post->subtitulo);
            } else {
                SEOMeta::setDescription($post->descricao);
            }
            SEOMeta::addMeta('article:published_time', $post->data_publicacao, 'property');
            SEOMeta::addMeta('article:section', implode(', ', $categorias), 'property');
            if ($post->imagem_destaque != '') {
                OpenGraph::addImage(Config::get('prowork.base_img') . $post->imagem_destaque);
            }
            OpenGraph::setTitle($post->titulo);
            if ($post->subtitulo != '') {
                OpenGraph::setDescription($post->subtitulo);
            } else {
                OpenGraph::setDescription($post->descricao);
            }
            OpenGraph::setUrl($this->url->current());
        } else {
            return redirect()->route('page.blog-list');
        }

        return view('frontend/blog-view', compact('post'));
    }

//  PRODUTOS
    public function produtosList() {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('Produtos');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $produtos = $this->ProdutoRepository->paginate('', 15);
        $categorias = $this->ProdutoCategoriaRepository->categorias();
        return view('frontend/produtos-list', compact('produtos', 'categorias'));
    }

    public function produtosCategoriaList($slug) {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('Produtos');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }
        $categoria = $this->ProdutoCategoriaRepository->getBySlug($slug);
        if ($categoria) {
            $categorias = $this->ProdutoCategoriaRepository->subcategorias($categoria->id); //lista de subcategorias da categoria selecionada.
            $categorias_pai = $this->ProdutoCategoriaRepository->categoriasPai($categoria->id); //lista as categorias pai para gerar o caminho de navegação (breadcrumbs)
            $categorias_filhas = $this->ProdutoCategoriaRepository->categoriasFilha($categoria->id); //pego todas as categorias abaixo para listar os produtos.
            $produtos = $this->ProdutoRepository->paginateByCategorias('', $categorias_filhas, 15); // lista todos os produtos que pertencem as categorias filhas
        } else {
            return redirect()->route('page.produtos-list');
        }
        return view('frontend/produtos-list', compact('produtos', 'categoria', 'categorias', 'categorias_pai'));
    }

    public function produtosView($slug) {
        $produto = $this->ProdutoRepository->getBySlug($slug);
        if ($produto) {
            //        SEO
            foreach ($produto->categorias as $categoria) {
                $categorias[] = $categoria->nome;
            }
            SEOMeta::setTitle($produto->nome);
            SEOMeta::setDescription($produto->present()->shortDescription($produto->descricao, 200));
            SEOMeta::addMeta('article:section', implode(', ', $categorias), 'property');
            if ($produto->imagem_destaque != '') {
                OpenGraph::addImage(Config::get('prowork.base_img') . $produto->imagem_destaque);
            }
            OpenGraph::setDescription($produto->present()->shortDescription($produto->descricao, 200));
            OpenGraph::setUrl($this->url->current());

            $categorias_pai = $this->ProdutoCategoriaRepository->categoriasPai($produto->categorias[0]->id);
        } else {
            return redirect()->route('page.produtos-list');
        }
        return view('frontend/produtos-view', compact('produto', 'categorias_pai'));
    }


    public function formProduto(FormProdutoRequest $request) {

        $input = $request->all();

        $res = Mail::send('emails.produto', ['dados' => $input], function ($m) use ($input) {
                    $m->from('nao-responda@donagraca.com', 'Agrossady');
                    $m->to('contato@agrosady.com.br', '')->subject('Solicitação de produto');
                });

        if ($res) {
            Notifications::success('Dados enviados com sucesso!', 'forms');
        } else {
            Notifications::error('Não foi possível enviar os dados. Por favor, entre em contato por telefone.', 'forms');
        }
        return redirect()->route('page.produtos-view', $input['slug']);
    }


    //    TABELA DE KITS
    public function tabelaDeKits() {
        return view('frontend/tabela-de-kits');
    }

    public function formKits(FormKitsRequest $request) {

        $input = $request->all();

        $res = Mail::send('emails.tabela-de-kits', ['dados' => $input], function ($m) use ($input) {
                    $m->from('nao-responda@donagraca.com', 'Site Agrosady');
                    $m->to('contato@agrosady.com.br', '')->subject('Tabela de Kits');
                });

        if ($res) {
            Notifications::success('Dados enviados com sucesso!', 'form-kits');
        } else {
            Notifications::error('Não foi possível enviar os dados. Por favor, entre em contato por telefone.', 'form-kits');
        }
        return redirect()->route('page.tabela-de-kits');
    }


//    GALERIA DE IMAGENS
    public function galeriaImagem() {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('GaleriaImagens');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $galerias = $this->GaleriaImagemRepository->paginateGaleria(array(), 9, array('created_at', 'desc'));
        return view('frontend/galeria-imagem', compact('galerias'));
    }

    public function galeriaImagemView($slug) {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('GaleriaImagens');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }

        $galeria = $this->GaleriaImagemRepository->paginateImagem(['filtro_galeria' => $slug], 16);
        return view('frontend/galeria-imagem-view', compact('galeria'));
    }

    //    CONTATO
    public function contato() {
        //        SEO
        $pagina = $this->SeoRepository->showPaginaNome('Contato');
        if (!$pagina->isEmpty()) {
            SEOMeta::setTitle($pagina[0]->seo_title);
            SEOMeta::setDescription($pagina[0]->seo_description);
            SEOMeta::addKeyword($pagina[0]->seo_keywords);
            OpenGraph::setTitle($pagina[0]->seo_title);
            OpenGraph::setDescription($pagina[0]->seo_description);
            OpenGraph::setUrl($this->url->current());
        }
        return view('frontend/contato');
    }


    public function formContato(FormContatoRequest $request) {
        $input = $request->all();

        if($input['escavado'] == "Sim"){
            $view_email = 'emails.contato_escavado';
        }
        
        if($input['escavado'] == "Não"){
            $view_email = 'emails.contato_nao_escavado';
        }

        $res = Mail::send($view_email, ['dados' => $input], function ($m) use ($input) {
                    $m->from('nao-responda@donagraca.com', 'Site Agrosady');
                    $m->to('contato@agrosady.com.br', '')->subject('Contato do Site');
                    
                    //FOTO1
                    if (isset($input['foto1'])) {
                        $m->attach($input['foto1']->getRealPath(), array(
                            'as' => 'foto1.' . $input['foto1']->getClientOriginalExtension(),
                            'mime' => $input['foto1']->getMimeType())
                        );
                    }
                    
                    //FOTO2
                    if (isset($input['foto2'])) {
                        $m->attach($input['foto2']->getRealPath(), array(
                            'as' => 'foto2.' . $input['foto2']->getClientOriginalExtension(),
                            'mime' => $input['foto2']->getMimeType())
                        );
                    }
                    
                    //FOTO3
                    if (isset($input['foto3'])) {
                        $m->attach($input['foto3']->getRealPath(), array(
                            'as' => 'foto3.' . $input['foto3']->getClientOriginalExtension(),
                            'mime' => $input['foto3']->getMimeType())
                        );
                    }
                    
                    //FOTO4
                    if (isset($input['foto4'])) {
                        $m->attach($input['foto4']->getRealPath(), array(
                            'as' => 'foto4.' . $input['foto4']->getClientOriginalExtension(),
                            'mime' => $input['foto4']->getMimeType())
                        );
                    }
                    
                    //FOTO5
                    if (isset($input['foto5'])) {
                        $m->attach($input['foto5']->getRealPath(), array(
                            'as' => 'foto5.' . $input['foto5']->getClientOriginalExtension(),
                            'mime' => $input['foto5']->getMimeType())
                        );
                    }
                });

        if ($res) {
            Notifications::success('Dados enviados com sucesso!', 'form-contato');
        } else {
            Notifications::error('Não foi possível enviar os dados. Por favor, entre em contato por telefone.', 'form-contato');
        }
        return redirect()->route('page.contato');
    }

    
    public function formTrabalheConosco(FormTrabalheConoscoRequest $request) {

        $input = $request->all();

        $res = Mail::send('emails.form-trabalhe-conosco', ['dados' => $input], function ($m) use ($input) {
                    $m->from('nao-responda@donagraca.com', 'Site Agrosady');
                    $m->to('financeiro@agrosady.com.br', 'Trabalhe Conosco')->subject('Trabalhe Conosco');
                    
                    //ANEXO
                    if (isset($input['anexo'])) {
                        $m->attach($input['anexo']->getRealPath(), array(
                            'as' => 'anexo.' . $input['anexo']->getClientOriginalExtension(),
                            'mime' => $input['anexo']->getMimeType())
                        );
                    }
                });

        if ($res) {
            Notifications::add('Dados enviados com sucesso!', 'success', 'form-trabalhe-conosco');
        } else {
            Notifications::add('Não foi possível enviar os dados. Por favor, entre em contato por telefone.', 'danger', 'form-trabalhe-conosco');
        }
        return redirect()->route('page.contato');
    }

}
