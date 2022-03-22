@extends('frontend/shared/layout')      

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'tabela-de-kits'])

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-kits.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Kits Tanques</h1>
                <!-- <p class="font-size30 cor-branco black">Escolha o kit que cabe a suas necessidades e envie-nos um e-mail utilizando o formulário abaixo.</p> -->
            </div>
        </div>
    </div>
</section>

<section class="tabela-de-kits">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                <img class="img-responsive margem-auto margem-baixo10" src="{{ url() }}/frontend/img/tabela-de-kits.jpg">

            </div>
        </div>
    </div>
</section>

<section class="formulario-kits">
    <div class="container">
        <div class="row">

            <div class="col-md-12 margem-baixo30">

                <h3 class="text-center">Se interessou por algum dos nossos kits? Envie-nos um e-mail!</h3>
                
                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Mensagens -->
                {!! Notifications::byGroup('form-kits')->toHTML() !!}
                <!-- /Mensagens -->

            </div>
            
            <div class="col-md-6">
                {!! Form::open(array('route' => 'page.form-kits', 'method'=>'post')) !!}
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
                        {!! Form::label('numero_do_kit', 'Número do Kit:') !!}
                        {!! Form::select('numero_do_kit', [''=>'--Selecione--'] 
                        + [
                        'Kit 1 - 24.000 L'=>'Kit 1 - 24.000 L',
                        'Kit 2 - 40.000 L'=>'Kit 2 - 40.000 L',
                        'Kit 3 - 60.000 L'=>'Kit 3 - 60.000 L',
                        'Kit 4 - 80.000 L'=>'Kit 4 - 80.000 L',
                        'Kit 5 - 100.000 L'=>'Kit 5 - 100.000 L',
                        'Kit 6 - 125.000 L'=>'Kit 6 - 125.000 L',
                        'Kit 7 - 150.000 L'=>'Kit 7 - 150.000 L',
                        'Kit 8 - 170.000 L'=>'Kit 8 - 170.000 L',
                        'Kit 9 - 200.000 L'=>'Kit 9 - 200.000 L',
                        'Kit 10 - 250.000 L'=>'Kit 10 - 250.000 L',
                        'Kit 11 - 300.000 L'=>'Kit 11 - 300.000 L',
                        'Kit 12 - 350.000 L'=>'Kit 12 - 350.000 L',
                        'Kit 13 - 400.000 L'=>'Kit 13 - 400.000 L',
                        'Kit 14 - 450.000 L'=>'Kit 14 - 450.000 L',
                        'Kit 15 - 500.000 L'=>'Kit 15 - 500.000 L',
                        'Kit 16 - 550.000 L'=>'Kit 16 - 550.000 L',
                        'Kit 17 - 600.000 L'=>'Kit 17 - 600.000 L'],
                         null, array('class'=>'form-control', 'required')) !!}
                    </div>

                    <div class="form-group">
                        <div id="RecaptchaField1"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        {!! Form::label('mensagem', 'Mensagem:') !!}
                        {!! Form::textarea('mensagem', null, array('placeholder'=>'Mensagem', 'rows'=>'11' ,'class'=>'form-control', 'required')) !!}
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group text-center margem-baixo60">
                        {!! Form::submit('Enviar', ['class'=>'bt-7']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</section>

@include('frontend/shared/fale-conosco')

@include('frontend/shared/rodape')

@stop

@section('script')
<script type="text/javascript">
    var CaptchaCallback = function () {
        grecaptcha.render('RecaptchaField1', {'sitekey': '6Le4vRYUAAAAAOLmduQxDAuZfrYWgrKIV6x87nX5'});
    };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit" async defer></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>

<script>
    $(function () {
        $('.mapa').click(function (e) {
            $(this).find('iframe').css('pointer-events', 'all');
        }).mouseleave(function (e) {
            $(this).find('iframe').css('pointer-events', 'none');
        });
    })
</script>
@stop