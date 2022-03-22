@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'noticias'])

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-noticias.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Mantenha-se informado</h1>
                <p class="font-size30 cor-branco black">das principais notícias do universo agro.</p>
            </div>
        </div>
    </div>
</section>

<section class="noticias">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="noticia-item noticia-grande margem-baixo40">
                    <p class="cor-cinza"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->present()->formatDate($post->data_publicacao)}}</p>
                    @if($post->imagem_destaque != '')
                    <img class="img-responsive margem-auto margem-baixo30" src="{!! Config::get('prowork.base_img') !!}{{$post->present()->getThumbUrl($post->imagem_destaque, 600, 325)}}" alt="">
                    @endif
                    <h2 class="noticia-titulo cor-preto margem-baixo20">{!!$post->titulo!!}</h2>
                    <h3 class="noticia-titulo cor-preto margem-baixo20">{!!$post->subtitulo!!}</h3>
                    <hr class="pequeno direita margem-baixo15 margem-cima15">
                    <div class="editor-texto">
                        {!!$post->descricao!!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a class="cor-vermelho text-uppercase font-size20" href="{!! route('page.blog-list') !!}">Voltar</a>
            </div>
        </div>
    </div>

</section>

@include('frontend/shared/fale-conosco')

@include('frontend/shared/rodape')

@stop


@section('script')

@stop