@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'produtos'])

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
                    <li><a href="{!! route('page.produtos-list') !!}">Produtos</a></li>

                    @foreach($categorias_pai as $cat_pai)
                    <li><a href="{!! route('page.produtos-categoria-list', $cat_pai->slug) !!}">{{$cat_pai->nome}}</a></li>
                    @endforeach

                    <li><a href="{!! route('page.produtos-categoria-list', $produto->categorias[0]->slug) !!}">{{$produto->categorias[0]->nome}}</a></li>

                    <li class="active">{{$produto->nome}}</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="produtos">

    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                @if(empty($produto->imagens))
                <div id="carousel-custom" class="carousel slide" data-ride="carousel" data-interval="false">
                    <div class='carousel-outer'>
                        <div class="carousel-inner" role="listbox">
                            {{--*/$indice = 0;/*--}}
                            @foreach($produto->imagens as $val)
                            @if ($indice == 0) 
                            <div class="item active">
                                <img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}">
                                {{--*/$indice++;/*--}}
                            </div>
                            @else
                            <div class="item">
                                <img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}">
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- Indicators -->
                    <ol class='carousel-indicators mCustomScrollbar'>
                        {{--*/$count = 0;/*--}}
                        @foreach($produto->imagens as $val)
                        @if($count == 0) 
                        <li data-target='#carousel-custom' data-slide-to='{{$count}}' class='active'><img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}"></li>
                        {{--*/$count++;/*--}}
                        @else
                        <li data-target='#carousel-custom' data-slide-to='{{$count}}'><img class="img-responsive margem-auto" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}"></li>
                        {{--*/$count++;/*--}}
                        @endif
                        @endforeach
                    </ol>

                </div>
                @else
                <img class="img-responsive margem-auto margem-baixo30" src="{{ url() }}/frontend/img/produto-sem-imagem.jpg">
                @endif

            </div>
            <div class="col-sm-5">
                <p class="font-size25 cor-verde negrito">Solicite um orçamento</p>

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <!-- Mensagens -->
                {!! Notifications::byGroup('forms')->toHTML() !!}
                <!-- /Mensagens -->

                {!! Form::open(array('route' => 'page.form-produto', 'method'=>'post')) !!}

                {!! Form::text('id_produto', $produto->id, ['class'=>'hide']) !!}
                {!! Form::text('nome_produto', $produto->nome, ['class'=>'hide']) !!}
                {!! Form::text('slug', $produto->slug, ['class'=>'hide']) !!}


                <div class="form-group">
                    {!! Form::label('nome', 'Nome:') !!}
                    {!! Form::text('nome', null, array('placeholder'=>'Nome', 'class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail:') !!}
                    {!! Form::email('email', null, array('placeholder'=>'E-mail','class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('tel', 'Telefone:') !!}
                    {!! Form::text('tel', null, array('placeholder'=>'Telefone','class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem:') !!}
                    {!! Form::textarea('mensagem', null, array('placeholder'=>'Mensagem', 'rows'=>'4' ,'class'=>'form-control', 'required')) !!}
                </div>
                <div class="g-recaptcha margem-baixo20" data-sitekey="{!! Config::get('recapitcha.GOOGLE_RECAPTCHA_KEY') !!}"></div>
                <div class="form-group margem-baixo60">
                    {!! Form::submit('Enviar', ['class'=>'bt-7']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="noticia-item noticia-grande margem-baixo40">

                    <h2 class="produto-titulo cor-cinza font-size40 margem-baixo20">{!!$produto->nome!!}</h2>
                    <div class="editor-texto margem-baixo30">
                        {!!$produto->descricao!!}
                    </div>
                    <ul class="lista-atributos margem-baixo20">
                        @foreach($produto->atributos as $atributo)
                        <li class="cor-cinza font-size16"><b>{!!$atributo->nome!!}:</b> {!!$atributo->valor!!}</li>
                        @endforeach
                    </ul>

                    @if($produto->preco_promocional != '' && $produto->data_promocao >= date("Y-m-d"))
                    <p class="margem-baixo10 font-size15 cor-cinza"> <span class="texto-riscado">De R$ {!!$produto->preco!!}</span> Por: <br> <span class="cor-verde font-size25 negrito">R$ {!! $produto->preco_promocional !!}</span></p>
                    @else
                    @if($produto->preco != '')
                    <p class="margem-baixo30 font-size25 cor-verde negrito">R$ <span class="font-size30">{!!$produto->preco!!}</span></p>
                    @endif
                    @endif
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
<script src='https://www.google.com/recaptcha/api.js'></script>
@stop