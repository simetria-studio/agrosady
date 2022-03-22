<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//URLS ANTIGAS REDIRECIONAR PARA NOVAS
Route::get('/agro-sady', function () {
    return redirect('quem-somos');
});
Route::get('/categoria/dicas-e-orientacoes', function () {
    return redirect('noticias');
});
Route::get('/categoria/orcamento', function () {
    return redirect('contato');
});
Route::get('/categoria/contato', function () {
    return redirect('contato');
});
Route::get('/categoria/servicos/kit-geomembrana', function () {
    return redirect('/produtos/solucoes-geomembrana');
});
Route::get('/servicos/barragens/barragens-2', function () {
    return redirect('/produto/barragens');
});
Route::get('/servicos/estufa-p-secagem-de-cafe', function () {
    return redirect('/produtos/solucoes-geomembrana');
});
Route::get('/produto/estufa', function () {
    return redirect('/produtos/solucoes-geomembrana');
});
Route::get('/produto/estufa-sady', function () {
    return redirect('/produtos/solucoes-geomembrana');
});
Route::get('/servicos/kit-geomembrana/kit-geomembrana', function () {
    return redirect('/produto/kit-tanque-agrosady');
});
Route::get('/produto/secador-natural-de-polvilho-goma-de-mandioca', function () {
    return redirect('/produtos/solucoes-geomembrana');
});
Route::get('/servicos/tanques-de-piscicultura/tanque-de-piscicultura', function () {
    return redirect('/produto/tanques-para-piscicultura');
});
Route::get('/servicos/tanques-para-irrigacao/tanques-para-irrigacao', function () {
    return redirect('/produto/tanques-para-irrigacao');
});
Route::get('/produto/viveiro-para-mudas-2', function () {
    return redirect('/produtos/solucoes-geomembrana');
});

/* * ******** ROTAS FRONTEND *********** */
Route::group(['as' => 'page.', 'prefix' => ''], function () {
//    INSTITUCIONAL
    Route::get('/institucional/{slug}', ['as' => 'institucional', 'uses' => 'PageController@institucional']);

//	HOME
    Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);
//	QUEM SOMOS
    Route::get('/quem-somos', ['as' => 'quem-somos', 'uses' => 'PageController@quemSomos']);
//	BLOG
    Route::get('noticias', ['as' => 'blog-list', 'uses' => 'PageController@blogList']);
    Route::get('noticias/{slug}', ['as' => 'blog-view', 'uses' => 'PageController@blogView']);
//	PRODUTOS
    Route::get('produtos', ['as' => 'produtos-list', 'uses' => 'PageController@produtosList']);
    Route::get('produtos/{slug}', ['as' => 'produtos-categoria-list', 'uses' => 'PageController@produtosCategoriaList']);
    Route::get('produto/{slug}', ['as' => 'produtos-view', 'uses' => 'PageController@produtosView']);
    Route::post('produto', ['as' => 'form-produto', 'uses' => 'PageController@formProduto']);
    
//	TABELA DE KITS
    Route::get('tabela-de-kits', ['as' => 'tabela-de-kits', 'uses' => 'PageController@tabelaDeKits']);
    Route::post('form-kits', ['as' => 'form-kits', 'uses' => 'PageController@formKits']);

//	GALERIA DE IMAGENS
    Route::get('nossas-obras', ['as' => 'galerias-imagem', 'uses' => 'PageController@galeriaImagem']);
    Route::get('nossas-obras/{slug}', ['as' => 'galeria-imagem-view', 'uses' => 'PageController@galeriaImagemView']);
//    CONTATO
    Route::get('contato', ['as' => 'contato', 'uses' => 'PageController@contato']);
    Route::post('contato', ['as' => 'form-contato', 'uses' => 'PageController@formContato']);
    Route::post('trabalhe-conosco', ['as' => 'form-trabalhe-conosco', 'uses' => 'PageController@formTrabalheConosco']);
});



/* * ******** ROTA ADMIN *********** */
Route::get('/admin', ['as' => 'admin', 'middleware' => ['auth', 'needsRole'], 'is' => 'Administrador', 'uses' => 'BaseController@index']);

/* * ******** ROTAS Banner *********** */
Route::group(['as' => 'banner.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['banner.total'], 'prefix' => 'admin/banner'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'BannerController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'BannerController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'BannerController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'BannerController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'BannerController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'BannerController@destroy']);

    Route::get('{id_banner}/imagens', ['as' => 'imagem.index', 'uses' => 'BannerController@indexImagem']);
    Route::get('imagem/criar/{id}', ['as' => 'imagem.create', 'uses' => 'BannerController@createImagem']);
    Route::post('imagem/salvar/{id_banner}', ['as' => 'imagem.store', 'uses' => 'BannerController@storeImagem']);
    Route::get('imagem/delete/{id}/{id_banner}', ['as' => 'imagem.destroy', 'uses' => 'BannerController@destroyImagem']);
});

/* * ******** ROTAS BLOG *********** */
Route::group(['as' => 'blog.post.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['blog.total'], 'prefix' => 'admin/blog/post'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'BlogPostController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'BlogPostController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'BlogPostController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'BlogPostController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'BlogPostController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'BlogPostController@destroy']);
});

Route::group(['as' => 'blog.categoria.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['blog.total'], 'prefix' => 'admin/blog/categoria'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'BlogCategoriaController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'BlogCategoriaController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'BlogCategoriaController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'BlogCategoriaController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'BlogCategoriaController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'BlogCategoriaController@destroy']);
});

/* * ******** ROTAS UND *********** */
Route::group(['as' => 'und.post.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['und.total'], 'prefix' => 'admin/und/post'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UndPostController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'UndPostController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'UndPostController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'UndPostController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'UndPostController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'UndPostController@destroy']);
});

Route::group(['as' => 'und.categoria.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['und.total'], 'prefix' => 'admin/und/categoria'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UndCategoriaController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'UndCategoriaController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'UndCategoriaController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'UndCategoriaController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'UndCategoriaController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'UndCategoriaController@destroy']);
});

Route::group(['as' => 'und.perguntas.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['und.total'], 'prefix' => 'admin/und/perguntas'], function () {
    Route::get('criar/{id}', ['as' => 'create', 'uses' => 'UndPerguntaController@create']);
    Route::post('salvar/{id}', ['as' => 'store', 'uses' => 'UndPerguntaController@store']);
    Route::get('/{id}', ['as' => 'index', 'uses' => 'UndPerguntaController@index']);
    Route::get('delete/{id_pergunta}/{id_post}', ['as' => 'destroy', 'uses' => 'UndPerguntaController@destroy']);
    Route::get('ver-prova/{id}', ['as' => 'viewprova', 'uses' => 'UndPerguntaController@verProva']);
    Route::get('ver-resultado-prova/{id}', ['as' => 'viewresultadoprova', 'uses' => 'UndPerguntaController@verResultado']);
});

/* * ******** ROTAS AGENDA DE EVENTOS *********** */
Route::group(['as' => 'galeria-evento.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['ae.total'], 'prefix' => 'admin/galeria-evento'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'GaleriaEventoController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'GaleriaEventoController@createEvento']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'GaleriaEventoController@storeEvento']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'GaleriaEventoController@editEvento']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'GaleriaEventoController@updateEvento']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'GaleriaEventoController@destroyEvento']);
});

/* * ******** ROTAS GALERIA DE IMAGEM *********** */
Route::group(['as' => 'galeria-imagem.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['gi.total'], 'prefix' => 'admin/galeria-imagem'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'GaleriaImagemController@index']);
    Route::get('galeria/criar', ['as' => 'galeria.create', 'uses' => 'GaleriaImagemController@createGaleria']);
    Route::post('galeria/salvar', ['as' => 'galeria.store', 'uses' => 'GaleriaImagemController@storeGaleria']);
    Route::get('galeria/editar/{id}', ['as' => 'galeria.edit', 'uses' => 'GaleriaImagemController@editGaleria']);
    Route::post('galeria/atualizar/{id}', ['as' => 'galeria.update', 'uses' => 'GaleriaImagemController@updateGaleria']);
    Route::get('galeria/delete/{id}', ['as' => 'galeria.destroy', 'uses' => 'GaleriaImagemController@destroyGaleria']);

    Route::get('imagem/criar/{id}', ['as' => 'imagem.create', 'uses' => 'GaleriaImagemController@createImagem']);
    Route::post('imagem/salvar/{id}', ['as' => 'imagem.store', 'uses' => 'GaleriaImagemController@storeImagem']);
    Route::get('imagem/editar/{id}', ['as' => 'imagem.edit', 'uses' => 'GaleriaImagemController@editImagem']);
    Route::post('imagem/atualizar/{id}', ['as' => 'imagem.update', 'uses' => 'GaleriaImagemController@updateImagem']);
    Route::get('imagem/delete/{id}', ['as' => 'imagem.destroy', 'uses' => 'GaleriaImagemController@destroyImagem']);
    Route::get('imagem/define-como-capa/{id}', ['as' => 'imagem.setImgCapaGaleria', 'uses' => 'GaleriaImagemController@setImgCapaGaleria']);
});

/* * ******** ROTAS BOBLIOTECA VIRTUAL *********** */
Route::group(['as' => 'bv.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['bv.total'], 'prefix' => 'admin/bv'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'BvController@index']);
    Route::get('/pasta/criar', ['as' => 'pasta.create', 'uses' => 'BvController@createPasta']);
    Route::post('/pasta/salvar', ['as' => 'pasta.store', 'uses' => 'BvController@storePasta']);
    Route::get('/pasta/editar/{id}', ['as' => 'pasta.edit', 'uses' => 'BvController@editPasta']);
    Route::post('/pasta/atualizar/{id}', ['as' => 'pasta.update', 'uses' => 'BvController@updatePasta']);
    Route::get('/pasta/delete/{id}', ['as' => 'pasta.destroy', 'uses' => 'BvController@destroyPasta']);

    Route::get('/arquivo/index/{id}', ['as' => 'arquivo.index', 'uses' => 'BvController@listArquivos']);
    Route::get('/arquivo/criar/{id}', ['as' => 'arquivo.create', 'uses' => 'BvController@createArquivo']);
    Route::post('/arquivo/salvar/{id}', ['as' => 'arquivo.store', 'uses' => 'BvController@storeArquivo']);
    Route::get('/arquivo/delete/{id_pasta}/{id_arquivo}', ['as' => 'arquivo.destroy', 'uses' => 'BvController@destroyArquivo']);
});

/* * ******** ROTAS GALERIA DE VÍDEOS *********** */
Route::group(['as' => 'galeria-video.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['gv.total'], 'prefix' => 'admin/galeria-video'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'GaleriaVideoController@index']);
    Route::get('galeria/criar', ['as' => 'galeria.create', 'uses' => 'GaleriaVideoController@createGaleria']);
    Route::post('galeria/salvar', ['as' => 'galeria.store', 'uses' => 'GaleriaVideoController@storeGaleria']);
    Route::get('galeria/editar/{id}', ['as' => 'galeria.edit', 'uses' => 'GaleriaVideoController@editGaleria']);
    Route::post('galeria/atualizar/{id}', ['as' => 'galeria.update', 'uses' => 'GaleriaVideoController@updateGaleria']);
    Route::get('galeria/delete/{id}', ['as' => 'galeria.destroy', 'uses' => 'GaleriaVideoController@destroyGaleria']);

    Route::get('video/criar/{id}', ['as' => 'video.create', 'uses' => 'GaleriaVideoController@createVideo']);
    Route::post('video/salvar/{id}', ['as' => 'video.store', 'uses' => 'GaleriaVideoController@storeVideo']);
    Route::get('video/editar/{id}', ['as' => 'video.edit', 'uses' => 'GaleriaVideoController@editVideo']);
    Route::post('video/atualizar/{id}', ['as' => 'video.update', 'uses' => 'GaleriaVideoController@updateVideo']);
    Route::get('video/delete/{id}', ['as' => 'video.destroy', 'uses' => 'GaleriaVideoController@destroyVideo']);
});

/* * ******** ROTAS USUÁRIO *********** */
Route::group(['as' => 'usuario.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['usuario.total'], 'prefix' => 'admin/usuario'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UsuarioController@index']);
    Route::get('usuario/criar', ['as' => 'usuario.create', 'uses' => 'UsuarioController@createUsuario']);
    Route::post('usuario/salvar', ['as' => 'usuario.store', 'uses' => 'UsuarioController@storeUsuario']);
    Route::get('usuario/editar/{id}', ['as' => 'usuario.edit', 'uses' => 'UsuarioController@editUsuario']);
    Route::post('usuario/atualizar/{id}', ['as' => 'usuario.update', 'uses' => 'UsuarioController@updateUsuario']);
    Route::get('usuario/delete/{id}', ['as' => 'usuario.destroy', 'uses' => 'UsuarioController@destroyUsuario']);

});

/* * ******** ROTAS ENQUETE *********** */
Route::group(['as' => 'enquete.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['enquete.total'], 'prefix' => 'admin/enquetes'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'EnqueteController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'EnqueteController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'EnqueteController@store']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'EnqueteController@destroy']);
    Route::get('resultado/{id}', ['as' => 'resultado', 'uses' => 'EnqueteController@verResultado']);
});

/* * ******** ROTAS MÓDULO ORÇAMENTO *********** */

Route::group(['as' => 'operacao.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['operacao.total'], 'prefix' => 'admin/operacao'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'OrcamentoController@index']);
    Route::get('orcamento/criar', ['as' => 'orcamento.create', 'uses' => 'OrcamentoController@createOrcamento']);
    Route::post('orcamento/salvar', ['as' => 'orcamento.store', 'uses' => 'OrcamentoController@storeOrcamento']);
    Route::get('orcamento/editar/{id}', ['as' => 'orcamento.edit', 'uses' => 'OrcamentoController@editOrcamento']);
    Route::post('orcamento/atualizar/{id}', ['as' => 'orcamento.update', 'uses' => 'OrcamentoController@updateOrcamento']);
    Route::get('orcamento/delete/{id}', ['as' => 'orcamento.destroy', 'uses' => 'OrcamentoController@destroyOrcamento']);
    Route::get('orcamento/editStatusOrcamento/{id}/{status}', ['as' => 'orcamento.editStatusOrcamento', 'uses' => 'OrcamentoController@editStatusOrcamento']);
    Route::get('orcamento/getUser/{id}', ['as' => 'orcamento.getUser', 'uses' => 'OrcamentoController@getUserByOcamento']);

    Route::get('coleta/', ['as' => 'coleta.index', 'uses' => 'OrcamentoController@listColeta']);
    Route::get('coleta/criar', ['as' => 'coleta.create', 'uses' => 'OrcamentoController@createColeta']);
    Route::post('coleta/salvar', ['as' => 'coleta.store', 'uses' => 'OrcamentoController@storeColeta']);
    Route::get('coleta/editar/{id}', ['as' => 'coleta.edit', 'uses' => 'OrcamentoController@editColeta']);
    Route::post('coleta/atualizar/{id}', ['as' => 'coleta.update', 'uses' => 'OrcamentoController@updateColeta']);
    Route::get('coleta/delete/{id}', ['as' => 'coleta.destroy', 'uses' => 'OrcamentoController@destroyColeta']);
    Route::get('coleta/editStatusColeta/{id}/{status}', ['as' => 'coleta.editStatusColeta', 'uses' => 'OrcamentoController@editStatusColeta']);
    Route::get('coleta/getUser/{id}', ['as' => 'coleta.getUser', 'uses' => 'OrcamentoController@getUserByColeta']);
});

/* * ******** ROTAS MÓDULO RASTREIO *********** */

Route::group(['as' => 'rastreio.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['rastreio.total'], 'prefix' => 'admin/rastreio'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'RastreioController@index']);
    Route::get('objeto/criar', ['as' => 'objeto.create', 'uses' => 'RastreioController@createObjeto']);
    Route::post('objeto/salvar', ['as' => 'objeto.store', 'uses' => 'RastreioController@storeObjeto']);
    Route::get('objeto/delete/{id}', ['as' => 'objeto.destroy', 'uses' => 'RastreioController@destroyObjeto']);

    Route::get('movimentacao/', ['as' => 'movimentacao.index', 'uses' => 'RastreioController@listMovimentacao']);
    Route::get('movimentacao/criar/{id}', ['as' => 'movimentacao.create', 'uses' => 'RastreioController@createMovimentacao']);
    Route::post('movimentacao/salvar/{id}', ['as' => 'movimentacao.store', 'uses' => 'RastreioController@storeMovimentacao']);
    Route::get('movimentacao/listMov/{id}', ['as' => 'movimentacao.listMov', 'uses' => 'RastreioController@listMovimentacao']);
    //Route::post('movimentacao/atualizar/{id}', ['as' => 'movimentacao.update', 'uses' => 'RastreioController@updateMovimentacao']);
    //Route::get('movimentacao/delete/{id}', ['as' => 'movimentacao.destroy', 'uses' => 'RastreioController@destroyMovimentacao']);
});

/* * ******** ROTAS MÓDULO MOTORISTA *********** */

Route::group(['as' => 'motorista.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['motorista.total'], 'prefix' => 'admin/motorista'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'MotoristaController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'MotoristaController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'MotoristaController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'MotoristaController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'MotoristaController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'MotoristaController@destroy']);
});

/* * ******** ROTAS RD DIGITAL *********** */
Route::group(['as' => 'rd-digital.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['rd.total'], 'prefix' => 'admin/rd-digital'], function () {
    Route::get('/arquivo/index', ['as' => 'arquivo.index', 'uses' => 'RdDigitalController@listArquivos']);
    Route::get('/arquivo/criar', ['as' => 'arquivo.create', 'uses' => 'RdDigitalController@createArquivo']);
    Route::post('/arquivo/salvar', ['as' => 'arquivo.store', 'uses' => 'RdDigitalController@storeArquivo']);
    Route::get('/arquivo/delete/{id}', ['as' => 'arquivo.destroy', 'uses' => 'RdDigitalController@destroyArquivo']);
});

/* * ******** ROTAS SEO *********** */
Route::group(['as' => 'seo.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['seo.total'], 'prefix' => 'admin/seo'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'SeoController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'SeoController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'SeoController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'SeoController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'SeoController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'SeoController@destroy']);
});

/* * ******** ROTAS INSTITUCIONAL *********** */
Route::group(['as' => 'institucional.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['institucional.total'], 'prefix' => 'admin/institucional'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'InstitucionalController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'InstitucionalController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'InstitucionalController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'InstitucionalController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'InstitucionalController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'InstitucionalController@destroy']);
});

/* * ******** ROTAS PRODUTOS *********** */
Route::group(['as' => 'produto.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['produtos.total'], 'prefix' => 'admin/produtos/produto'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProdutoController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'ProdutoController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'ProdutoController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'ProdutoController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'ProdutoController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'ProdutoController@destroy']);
    
    Route::get('imagem/criar/{id}', ['as' => 'imagem.create', 'uses' => 'ProdutoImagemController@createImagem']);
    Route::post('imagem/salvar/{id}', ['as' => 'imagem.store', 'uses' => 'ProdutoImagemController@storeImagem']);
    Route::post('imagem/atualizar/{id}', ['as' => 'imagem.update', 'uses' => 'ProdutoImagemController@updateImagem']);
    Route::get('imagem/delete/{id}', ['as' => 'imagem.destroy', 'uses' => 'ProdutoImagemController@destroyImagem']);
    Route::get('imagem/define-como-capa/{id}', ['as' => 'imagem.setImgCapaGaleria', 'uses' => 'ProdutoImagemController@setImgCapaGaleria']);
    
    Route::post('atributo/atualizar/{id}', ['as' => 'atributo.update', 'uses' => 'ProdutoAtributoController@updateAtributo']);
    Route::get('atributo/delete/{id}', ['as' => 'atributo.destroy', 'uses' => 'ProdutoAtributoController@destroyAtributo']);
});

Route::group(['as' => 'produto.categoria.', 'middleware' => ['auth', 'needsPermission'], 'shield' => ['produtos.total'], 'prefix' => 'admin/produtos/categoria'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProdutoCategoriaController@index']);
    Route::get('criar', ['as' => 'create', 'uses' => 'ProdutoCategoriaController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'ProdutoCategoriaController@store']);
    Route::get('editar/{id}', ['as' => 'edit', 'uses' => 'ProdutoCategoriaController@edit']);
    Route::post('atualizar/{id}', ['as' => 'update', 'uses' => 'ProdutoCategoriaController@update']);
    Route::get('delete/{id}', ['as' => 'destroy', 'uses' => 'ProdutoCategoriaController@destroy']);
});

/* * ******** ROTAS LOGIN *********** */
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.post.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);
Route::get('auth/register', ['as' => 'auth.get.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'auth.post.register', 'uses' => 'Auth\AuthController@postRegister']);

/* * ******** RESETAR SENHA *********** */
// Rotas para solicitar trocar de senha...
Route::get('password/email', ['as' => 'resetar-senha-email', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', ['as' => 'enviar-resetar-senha-email', 'uses' => 'Auth\PasswordController@postEmail']);

// Rotas para trocar a senha...
Route::get('password/reset/{token}', ['as' => 'resetar-senha', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset', ['as' => 'enviar-resetar-senha', 'uses' => 'Auth\PasswordController@postReset']);
