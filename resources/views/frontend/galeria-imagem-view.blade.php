@extends('frontend/shared/layout')      

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'obras'])

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-galeria.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Equipe capacitada</h1>
                <p class="font-size30 cor-branco black">realizando um trabalho que torna tudo possível.</p>
            </div>
        </div>
    </div>
</section>

<section class="galerias">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="cor-cinza font-size30 text-center margem-baixo30">{{ count($galeria) <= 0 ? 'A galeria não possui imagens cadastrada.' : $galeria->first()->gi_galeria->titulo }}</h2>
                <ul class="block-grid-md-4 block-grid-sm-3 block-grid-xs-1 block-grid-xxs-1 margem-baixo30">
                    @foreach($galeria as $key=>$img)
                    <li>
                        <a href="#galeria-imagem-slide" data-slide-to="{!!$key!!}">
                            <img data-toggle="modal" data-target="#modal-galeria" class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{!! $img->caminho !!}">
                        </a>
                    </li>
                    @endforeach
                </ul>

                <div class="text-center">
                    {!! $galeria->appends(Request::input())->render() !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 text-center">
                <a class="cor-vermelho text-uppercase font-size20" href="{!! route('page.galerias-imagem') !!}">Voltar</a>
            </div>
        </div>


        <div class="modal fade" id="modal-galeria" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">{{ count($galeria) <= 0 ? 'Nenhuma imagem encontrada.' : $galeria->first()->gi_galeria->titulo }}</h4>
                    </div>
                    <div class="modal-body">

                        <div id="galeria-imagem-slide" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                @foreach($galeria as $key=>$img)
                                <div class="item {!! ($key == 0)? 'active' : '' !!}">
                                    <img class="img-responsive center-block" src="{!! Config::get('prowork.base_img') !!}{!! $img->caminho !!}">
                                </div>
                                @endforeach
                            </div>
                            <!--Controls--> 
                            <a class="left carousel-control" href="#galeria-imagem-slide" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#galeria-imagem-slide" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
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