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

                <ul class="block-grid-md-3 block-grid-sm-3 block-grid-xs-1 block-grid-xxs-1">
                    @foreach ($galerias->getCollection()->all() as $key => $val)
                    <li>
                        <a class="galeria-imagem-item" href="{!! route('page.galeria-imagem-view', $val->slug) !!}">
                            <div class="line-height-img text-center">
                                <img class="img-responsive" src="{!! Config::get('prowork.base_img') !!}{{ $val->img_capa }}">
                            </div>
                            <div class="galeria-hover text-center">
                                <h2 class="cor-branco font-size16 margem-baixo2">{{ $val->titulo }}</h2>
                                <p class="cor-branco font-size13 margem-baixo2 visible-lg visible-md">{{$val->present()->shortDescription($val->descricao, 80)}}</p>
                            </div>
                            
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="text-center">
                    {!! $galerias->appends(Request::input())->render() !!}
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