@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo-home', ['menu'=>'home'])

<section class="banner-video">
    <video autoplay loop muted playsinline poster="{{ url() }}/frontend/video/img-video.jpg" class="img-responsive">
        <source src="{{ url() }}/frontend/video/video.mp4" type="video/mp4">
    </video>
</section>

<!--<section class="banner">
    <div id="CarouselBanner" class="carousel slide" data-ride="carousel" data-interval="4000">
         Indicators 
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="carousel-indicators">
                        {{--*/$indice = 0;/*--}}
                        @foreach($banners as $val)
                        @if ($indice == 0) 
                        <li data-target="#CarouselBanner" data-slide-to="{{$indice}}" class="active"></li>
                        @else
                        <li data-target="#CarouselBanner" data-slide-to="{{$indice}}"></li>
                        @endif
                        {{--*/$indice++;/*--}}
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>


        <div class="carousel-inner" role="listbox">
            {{--*/$indice = 0;/*--}}
            @foreach($banners as $val)
            @if ($indice == 0) 
            <div class="item active">
                {{--*/$indice++;/*--}}
                @if($val->link != '')
                <a href="{{$val->link}}">
                    @endif
                    @else
                    <div class="item">
                        @if($val->link != '')
                        <a href="{{$val->link}}">
                            @endif
                            @endif
                            <img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}" alt="{{$val->nome}}">
                            @if($val->link != '')
                        </a>
                        @endif
                    </div>
                    @endforeach

            </div>
            @if (count($banners) > 1)
            <a class="left carousel-control" href="#CarouselBanner" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#CarouselBanner" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
        <img class="bg-banner img-responsive margem-auto" src="{{ url() }}/frontend/img/bg-banner.png">
    </div>
</section>-->

<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" id="section-1">
                <h2 class="font-size40 cor-branco light text-center margem-baixo60">Conheça nosso trabalho</h2>
                <img class="img-responsive margem-auto margem-baixo60" src="{{ url() }}/frontend/img/wave-section-1.png">
                <p class="font-size16 cor-branco text-center margem-baixo60">Ao longo do tempo, a AGROSADY ampliou suas atividades e hoje trabalha
                    com uma linha completa de acessórios para cafeicultura, além de estufas agrícolas e reservatórios em geomembrana para Irrigação 
                    e piscicultura. Hoje a AGROSADY é referência no mercado de reservatórios em geomembrana, apresentado um leque de opções de 
                    produtos, contando com uma equipe capacitada para atendimento em todos os estados do país.</p>
                <div class="text-center">
                    <a class="bt-1 font-size18 cor-branco" href="{!! route('page.quem-somos') !!}">Saiba Mais</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-7 col-sm-6 text-right" id="section-2-left">
                <h2 class="cor-vermelho font-size40 black margem-baixo30 margem-cima10">Tanques <br>
                    para Irrigação</h2>
                <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/img01-section-2.jpg">
                <a class="bt-3 text-uppercase visible-sm margem-cima50" href="">Saiba Mais</a>
            </div>
            <div class="col-lg-5 col-md-4 col-sm-6" id="section-2-right">
                <h3 class="cor-verde font-size23 margem-baixo80">Seu projeto com qualidade e rapidez. </h3>
                <p class="cor-cinza font-size16 margem-baixo40">Nossos tanques proporcionam economia de energia e melhoram a irrigação com maior segurança
                    no fornecimento de água. Produzimos em mantas PEAD 500, 800, 1.000 e 1.500 micra, com garantia de 5 anos e durabilidade estimada em 
                    20 anos. Fazemos tanques em diversos formatos e modelos.</p>
                <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/img02-section-2.jpg">
                <a class="bt-2 text-uppercase visible-lg visible-md" href="{!! route('page.produtos-view', 'tanques-para-irrigacao') !!}"><span>Saiba Mais</span></a> 
            </div>
            <div class="col-sm-12 visible-xs text-center" id="section-2-bottom">
                <a class="bt-3 text-uppercase margem-cima50" href="{!! route('page.produtos-view', 'tanques-para-irrigacao') !!}">Saiba Mais</a>
            </div>
        </div>
    </div>
</section>

<section class="section-3" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/bg-section-3.jpg" data-speed="0.0">
    <div class="container">
        <div class="row" id="section-3-bottom">
            <div class="col-sm-6 text-right">
                <h2 class="cor-branco font-size40 black margem-baixo80 margem-cima10">Reservatórios em <br>
                    Geomembrana</h2>
                <div class="clearfix">
                    <img class="img-responsive pull-right" src="{{ url() }}/frontend/img/img01-section-3.png">
                </div>
            </div>
            <div class="col-sm-5">
                <h2 class="cor-branco font-size23 margem-baixo70">Serviço personalizado e acessível, garantindo vantagens para você. </h2>
                <p class="cor-branco font-size16">Elaborados conforme a necessidade do cliente, os reservatórios em geomembrana AGROSADY 
                    se adequam a diferentes volumes, tamanhos e formatos. Produzimos com polietileno de alta densidade, excelente durabilidade,
                    várias espessuras, resistência química, atóxicos e resistentes a raios UV. Uma equipe especializada orienta a escavação e 
                    instala as mantas de geomembrana no local. Atendemos desde produtores rurais até agroindústrias, em todo o país.</p>
            </div>
            <div class="col-sm-12 text-center margem-cima100">
                <a class="bt-1 font-size18 cor-branco" href="{!! route('page.produtos-view', 'reservatorios-em-geomembrana-agrosady') !!}">Saiba Mais</a>
            </div>
        </div>

    </div>
</section>

<div class="section-4" id="section-4">
    <img id="folhas-rapido" class="folhas img-responsive opacidade0" src="{{ url() }}/frontend/img/folhas-rapido.png">
    <img id="folhas-medio" class="folhas img-responsive opacidade0" src="{{ url() }}/frontend/img/folhas-medio.png">
    <img id="folhas-medio2" class="folhas img-responsive opacidade0" src="{{ url() }}/frontend/img/folhas-medio2.png">
    <img id="folhas-lento" class="folhas img-responsive opacidade0" src="{{ url() }}/frontend/img/folhas-lento.png">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 text-right">
                <h2 class="cor-verde font-size40 black margem-baixo50 margem-cima10"> Soluções<br>
                    Agrícola</h2>
                <div class="clearfix margem-baixo40">
                    <img class="img-responsive pull-right" src="{{ url() }}/frontend/img/img01-section-4.png">
                </div>
            </div>
            <div class="col-sm-6">
                <h2 class="cor-vermelho font-size23 margem-baixo70">Produtos variados que atendem todas as necessidades. </h2>
                <p class="cor-cinza font-size16 margem-baixo40">Investindo em inúmeros produtos, para a melhoria contínua dos serviços, trazemos
                    o que há de melhor no mercado. São produtos que oferecem excelente custo/benefício na entrega de soluções, formulados com alta
                    tecnologia para os mais diversos modos de aplicação, e que abrangem desde o solo até o ambiente, em geral.</p>
                <div>
                    <a class="bt-4 font-size18 text-uppercase" href="{!! route('page.produtos-categoria-list', 'solucoes-agricolas') !!}">Saiba Mais</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-5" id="section-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-right margem-baixo30" id="s5-parte1">
                <h2 class="cor-verde-claro font-size40 black margem-0 margem-baixo50"> Soluções<br>
                    Jardinagem</h2>
                <h3 class="cor-branco font-size23 margem-baixo40">São certificados e devidamente testados.</h3>
                <div class="clearfix">
                    <img class="img-responsive pull-right" src="{{ url() }}/frontend/img/img01-section-5.png">
                </div>
            </div>
            <div class="col-sm-8">
                <p class="cor-branco font-size16 margem-baixo20 margem-cima10" id="s5-parte2">Ao lado de uma das marcas mais tradicionais do mercado, reconhecida 
                    em mais de 120 países, trabalhamos com a referência dos produtos Tramontina.  A marca se esforça permanentemente para tornar a 
                    vida das pessoas cada vez melhor, por isso, aliando o nosso serviço de excelência, com ferramentas de qualidade e de fácil manuseio,
                    garantimos a sua satisfação. </p>
                <div class="row">
                    <div class="col-sm-6" id="s5-parte3">
                        <h2 class="cor-verde-claro font-size23 margem-baixo50">Facilidade para cuidar do seu espaço ou criar seu projeto.</h2>
                        <a class="bt-3 font-size18 text-uppercase" href="{!! route('page.produtos-categoria-list', 'solucoes-jardinagem') !!}">Saiba Mais</a>
                    </div>
                    <div class="col-sm-6 visible-lg visible-md visible-sm" id="s5-parte4">
                        <img class="img-responsive" src="{{ url() }}/frontend/img/img02-section-5.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section-6">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="cor-cinza font-size40 black margem-baixo30">Nossas Obras</h2>
                <img class="img-responsive margem-auto margem-baixo30" src="{{ url() }}/frontend/img/wave-vermelha.png">
                <p class="cor-cinza font-size23 margem-baixo35">São mais de 1.000 projetos instalados e 100% aprovados. </p>
            </div>
        </div>
    </div>
    <a href="{!! route('page.galerias-imagem') !!}"> <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/img-section-6.jpg"></a>
</section>

<section class="section-7">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-right borda-direita">
                <h2 class="cor-verde font-size40 black margem-0 margem-baixo20">Nossos<br> Parceiros</h2>
                <p class="cor-cinza font-size23 margem-baixo20">Aliados que garantem a qualidade dos nossos serviços.</p>
            </div>
            <div class="col-sm-8">
                <div id="CarouselParceiros" class="carousel slide margem-cima20" data-ride="carousel" data-interval="4000">
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <ul class="block-grid-sm-3 block-grid-xs-3 block-grid-xxs-3 margem-0">
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro01.jpg"></li>
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro02.jpg"></li>
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro03.jpg"></li>
                            </ul>
                        </div>
                        <div class="item">
                            <ul class="block-grid-sm-3 block-grid-xs-3 block-grid-xxs-3 margem-0">
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro04.jpg"></li>
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro05.jpg"></li>
                                <li><img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/parceiro06.jpg"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-8">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="cor-cinza font-size40 black margem-baixo30">Notícias</h2>
                <img class="img-responsive margem-auto margem-baixo30" src="{{ url() }}/frontend/img/wave-vermelha.png">
                <p class="cor-cinza font-size23 margem-baixo100">Acompanhe as principais notícias sobre o agronegócio.</p>
            </div>
        </div>
        <div class="row margem-baixo60">
            @foreach($posts as $post)
            <div class="col-sm-4">
                <a class="noticia-item-home cor-cinza" href="{!! route('page.blog-view', $post->slug) !!}">
                    <div class="img-noticia">
                        @if($post->imagem_destaque != '')
                        <img class="img-responsive margem-auto margem-baixo30" src="{!! Config::get('prowork.base_img') !!}{{$post->present()->getThumbUrl($post->imagem_destaque, 600, 325)}}" alt="">
                        @else
                        <img class="img-responsive margem-auto margem-baixo30" src="{{ url() }}/frontend/img/img-noticia-padrao.png">
                        @endif
                        <div class="img-noticia-hover"></div>
                    </div>
                    <h3 class="noticia-titulo cor-cinza font-size23 margem-baixo20">{{$post->present()->shortDescription($post->titulo, 80)}}</h3>
                    <p class="cor-cinza"><i class="fa fa-calendar" aria-hidden="true"></i> {{$post->present()->formatDate($post->data_publicacao)}}</p>
                    <p class="borda"></p>
                    <p class="cor-cinza font-size16">{{$post->present()->shortDescription($post->descricao, 140)}}</p>
                </a>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-sm-12 text-center">
                <a class="cor-verde font-size20 text-uppercase" href="{!! route('page.blog-list') !!}">Veja Todas</a>
            </div>
        </div>
    </div>
</section>



@include('frontend/shared/fale-conosco')

@include('frontend/shared/rodape')

@stop


@section('script')
<script>
    $(document).ready(function () {
//        section 1
//         hide our element on page load
        $('#section-1').css('opacity', 0);
        $('#section-1').waypoint(function () {
            $('#section-1').addClass('animated fadeInUp');
        }, {offset: '70%'});

//        section 2
        $('#section-2-left').css('opacity', 0);
        $('#section-2-left').waypoint(function () {
            $('#section-2-left').addClass('animated fadeInLeft');
        }, {offset: '70%'});

        $('#section-2-right').css('opacity', 0);
        $('#section-2-right').waypoint(function () {
            $('#section-2-right').addClass('animated fadeInRight');
        }, {offset: '70%'});

        $('#section-2-bottom').css('opacity', 0);
        $('#section-2-bottom').waypoint(function () {
            $('#section-2-bottom').addClass('animated fadeInUp');
        }, {offset: '70%'});

//        section 3
        $('#section-3-bottom').css('opacity', 0);
        $('#section-3-bottom').waypoint(function () {
            $('#section-3-bottom').addClass('animated fadeInUp');
        }, {offset: '70%'});

//        section 4
        $('#section-4').waypoint(function () {
            var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            $('#folhas-rapido').addClass('animated folhasPassando').one(animationEnd, function () {
                $('#folhas-rapido').addClass('hide');
            });
            $('#folhas-medio').addClass('animated folhasPassando').one(animationEnd, function () {
                $('#folhas-medio').addClass('hide');
            });
            $('#folhas-medio2').addClass('animated folhasPassando').one(animationEnd, function () {
                $('#folhas-medio2').addClass('hide');
            });
            $('#folhas-lento').addClass('animated folhasPassando').one(animationEnd, function () {
                $('#folhas-lento').addClass('hide');
            });
        }, {offset: '60%'});

//        section 5
        $('#s5-parte1').css('opacity', 0);
        $('#s5-parte2').css('opacity', 0);
        $('#s5-parte3').css('opacity', 0);
        $('#s5-parte4').css('opacity', 0);
        $('#section-5').waypoint(function () {
            $('#s5-parte1').addClass('animated zoomIn opacidade1');
            $('#s5-parte2').addClass('animated zoomIn opacidade1');
            $('#s5-parte3').addClass('animated zoomIn opacidade1');
            $('#s5-parte4').addClass('animated fadeInRight');
        }, {offset: '70%'});

    });

</script>
@stop