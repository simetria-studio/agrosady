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
        @foreach($posts as $post)
        <div class="row">
            <a class="noticia-item-home cor-cinza" href="{!! route('page.blog-view', $post->slug) !!}">
                <div class="col-sm-6">
                    <div class="img-noticia">
                        @if($post->imagem_destaque != '')
                        <img class="img-responsive margem-auto margem-baixo30" src="{!! Config::get('prowork.base_img') !!}{{$post->present()->getThumbUrl($post->imagem_destaque, 600, 325)}}" alt="">
                        @else
                        <img class="img-responsive margem-auto margem-baixo30" src="{{ url() }}/frontend/img/img-noticia-padrao.png">
                        @endif
                        <div class="img-noticia-hover"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3 class="noticia-titulo cor-cinza font-size23 margem-baixo20">{{$post->present()->shortDescription($post->titulo, 120)}}</h3>
                    <p class="cor-cinza"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->present()->formatDate($post->data_publicacao)}}</p>
                    <p class="borda"></p>
                    <p class="cor-cinza font-size16">{{$post->present()->shortDescription($post->descricao, 240)}}</p>
                </div>
            </a>
        </div>
        @endforeach
        <div class="row">
            <div class="col-sm-12 text-right">
                {!! $posts->appends(Request::input())->render() !!}
            </div>
        </div>
    </div>
</section>

@include('frontend/shared/fale-conosco')

@include('frontend/shared/rodape')

@stop


@section('script')

@stop