@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>''])


<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-galeria.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">{!! $pagina_institucional->titulo!!}</h1>
            </div>
        </div>
    </div>
</section>


<section class="institucional">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="editor-texto">
                    {!! $pagina_institucional->conteudo !!}
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