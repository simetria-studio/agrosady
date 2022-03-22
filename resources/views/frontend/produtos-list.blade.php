@extends('frontend/shared/layout')

@section('conteudo')

@if(isset($categoria))
@include('frontend/shared/topo-interno', ['menu'=>'produtos', 'submenu'=>$categoria->nome ])
@else
@include('frontend/shared/topo-interno', ['menu'=>'produtos'])
@endif

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-produtos.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Variedade e qualidade</h1>
                <p class="font-size30 cor-branco black">Temos soluções para atender as suas necessidades.</p>
            </div>
        </div>
    </div>
</section>


<section class="nav-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <ol class="breadcrumb">
                    @if(isset($categorias_pai))
                    <li><a href="{!! route('page.produtos-list') !!}">Produtos</a></li>

                    @foreach($categorias_pai as $cat_pai)
                    <li><a href="{!! route('page.produtos-categoria-list', $cat_pai->slug) !!}">{!!$cat_pai->nome!!}</a></li>
                    @endforeach

                    <li class="active">{!!$categoria->nome!!}</li>
                    @else
                    <li class="active">Produtos</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</section>


<section class="produtos">

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @if(isset($categoria))
                <h3 class="categoria-nome active">{!!$categoria->nome!!}</h3>
                @else
                <h3 class="categoria-nome active">Categorias</h3>
                @endif

                <ul class="lista-categorias">
                    @foreach($categorias as $categoria)
                    <li>
                        <a class="categoria-nome" href="{!! route('page.produtos-categoria-list', $categoria->slug) !!}">{!!$categoria->nome!!}</a>
                        <ul class="lista-subcategoria">
                            @foreach($categoria->categoria_filha as $subcategoria)
                            <li>
                                <a class="subcategoria-nome" href="{!! route('page.produtos-categoria-list', $subcategoria->slug) !!}">{!!$subcategoria->nome!!}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-8">

                <div class="row">
                    @foreach($produtos as $produto)
                    <div class="margem-baixo40 col-sm-6 col-md-4">
                        <a class="produto-item" href="{!! route('page.produtos-view', $produto->slug) !!}">
                            <div class="img-produto margem-baixo30">
                                @if($produto->imagem_destaque != '')
                                <img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$produto->imagem_destaque}}" alt="">
                                @else
                                <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/produto-sem-imagem.jpg">
                                @endif
                                <div class="img-produto-hover"></div>
                            </div>
                            <h2 class="produto-titulo cor-cinza font-size20 margem-baixo20">{{$produto->present()->shortDescription($produto->nome, 35)}}</h2>
                            <p class="borda"></p>
                            <p class="produto-descricao cor-cinza margem-baixo20">{{$produto->present()->shortDescription($produto->descricao, 110)}}</p>
                            <p class="bt-6">Ver Detalhes</p>
                        </a>
                    </div>
                    @endforeach

                </div>
                <div class="text-center">
                    {!! $produtos->appends(Request::input())->render() !!}
                </div>
            </div>
        </div>
    </div>


</section>

@include('frontend/shared/fale-conosco')

@include('frontend/shared/rodape')

@stop


@section('script')

@stop