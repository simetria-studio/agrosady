@extends('frontend/shared/layout')      

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'quem-somos'])

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-quem-somos.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Nossa História</h1>
                <p class="font-size30 cor-branco black">Entenda porque somos exemplo de qualidade no mercado agro.</p>
            </div>
        </div>
    </div>
</section>

<section class="quem-somos-parte1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="editor-texto">
                    {!! $pagina_institucional[0]->conteudo !!}
                </div>
            </div>
        </div>
    </div>
</section>

<section class="quem-somos-parte2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <p class="font-size25 cor-branco">Comprometimento em garantir a satisfação  </p>
                <p class="font-size25 cor-branco black">dos clientes apoiado em nossos ideais.</p>
            </div>
        </div>
    </div>
</section>

<section class="quem-somos-parte3">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <ul class="block-grid-sm-3 block-grid-xs-1 block-grid-xxs-1">
                    <li>
                        <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/missao.png">
                        <h3 class="cor-cinza black font-size20 margem-baixo20">Missão</h3>
                        <p class="borda margem-auto margem-baixo20"></p>
                        <p class="cor-cinza font-size15">Melhorar a vida dos produtores por meio do conhecimento, das soluções de engenharia e do aprimoramento técnico. </p>
                    </li>
                    <li>
                        <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/visao.png">
                        <h3 class="cor-cinza black font-size20 margem-baixo20">Visão</h3>
                        <p class="borda margem-auto margem-baixo20"></p>
                        <p class="cor-cinza font-size15">Atingir o patamar de excelência em bom atendimento, produtos e serviços afim de nos tornarmos uma empresa de referência no mercado agrícola. </p>
                    </li>
                    <li>
                        <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/valores.png">
                        <h3 class="cor-cinza black font-size20 margem-baixo20">Valores</h3>
                        <p class="borda margem-auto margem-baixo20"></p>
                        <p class="cor-cinza font-size15">Integridade</p>
                        <p class="cor-cinza font-size15">Excelência</p>
                        <p class="cor-cinza font-size15">Ética</p>
                        <p class="cor-cinza font-size15">Responsabilidade</p>
                        <p class="cor-cinza font-size15">Zelo</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="quem-somos-parte4">
    <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/img-quem-somos-parte5.jpg">
</section>

<section class="quem-somos-parte5">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <div id="CarouselDepoimentos" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img class="img-responsive margem-auto margem-baixo20" src="{{ url() }}/frontend/img/img-quem-somos-depoimento.jpg">
                            <p class="cor-cinza black font-size20 margem-baixo20">Ramon</p>
                            <p class="borda margem-auto margem-baixo20"></p>
                            <p class="cor-cinza font-size15">“Excelente empresa.” </p>
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