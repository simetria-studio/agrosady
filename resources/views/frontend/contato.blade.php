@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo-interno', ['menu'=>'contato'])

<section class="banner-interno" data-parallax="scroll" data-image-src="{{ url() }}/frontend/img/topo-contato.jpg" data-speed="0.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 text-center">
                <h1 class="font-size50 cor-branco black">Estamos a sua disposição</h1>
                <p class="font-size30 cor-branco black">para tê-lo sempre por perto.</p>
            </div>
        </div>
    </div>
</section>

<section class="contato">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <p class="font-size25 cor-verde negrito text-center">Contato</p>

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <!-- Mensagens -->
                {!! Notifications::byGroup('form-contato')->toHTML() !!}
                <!-- /Mensagens -->
            </div>
            {!! Form::open(array('route' => 'page.form-contato', 'method'=>'post', 'files'=>'true')) !!}
            <div class="col-sm-6">                
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
                    {!! Form::label('escavado', 'O seu tanque já está escavado?') !!}
                    {!! Form::select('escavado', [''=>'--Selecione--'] + ['Sim'=>'Sim','Não'=>'Não'], null, array('class'=>'form-control', 'required')) !!}
                </div>
                    
            </div>
            
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem:') !!}
                    {!! Form::textarea('mensagem', null, array('placeholder'=>'Mensagem', 'rows'=>'11' ,'class'=>'form-control', 'required')) !!}
                </div>
            </div>

            <div hidden class="col-sm-12" id="escavado-sim">

                <h3 class="text-center margem-baixo30">De acordo com a imagem abaixo, informe as dimensões do seu tanque.</h3>

                <div class="row">

                    <div class="col-md-8">
                        <img class="img-responsive margem-auto margem-baixo10" src="{{ url() }}/frontend/img/croqui.jpg">
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_1', 'Medida 1 (m)') !!}
                                    {!! Form::text('medida_1', null, array('placeholder'=>'Medida de número 1', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_2', 'Medida 2 (m)') !!}
                                    {!! Form::text('medida_2', null, array('placeholder'=>'Medida de número 2', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_3', 'Medida 3 (m)') !!}
                                    {!! Form::text('medida_3', null, array('placeholder'=>'Informe o tamanho da medida de número 3', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_4', 'Medida 4 (m)') !!}
                                    {!! Form::text('medida_4', null, array('placeholder'=>'Informe o tamanho da medida de número 4', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_5', 'Medida 5 (m)') !!}
                                    {!! Form::text('medida_5', null, array('placeholder'=>'Informe o tamanho da medida de número 5', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_6', 'Medida 6 (m)') !!}
                                    {!! Form::text('medida_6', null, array('placeholder'=>'Informe o tamanho da medida de número 6', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_7', 'Medida 7 (m)') !!}
                                    {!! Form::text('medida_7', null, array('placeholder'=>'Informe o tamanho da medida de número 7', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_8', 'Medida 8 (m)') !!}
                                    {!! Form::text('medida_8', null, array('placeholder'=>'Informe o tamanho da medida de número 8', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_9', 'Medida 9 (m)') !!}
                                    {!! Form::text('medida_9', null, array('placeholder'=>'Informe o tamanho da medida de número 9', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_10', 'Medida 10 (m)') !!}
                                    {!! Form::text('medida_10', null, array('placeholder'=>'Informe o tamanho da medida de número 10', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_11', 'Medida 11 (m)') !!}
                                    {!! Form::text('medida_11', null, array('placeholder'=>'Informe o tamanho da medida de número 11', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                                
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_12', 'Medida 12 (m)') !!}
                                    {!! Form::text('medida_12', null, array('placeholder'=>'Informe o tamanho da medida de número 12', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('medida_13', 'Medida 13 (m)') !!}
                                    {!! Form::text('medida_13', null, array('placeholder'=>'Informe o tamanho da medida de número 13', 'class'=>'form-control', 'required')) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div hidden class="col-sm-12" id="escavado-nao">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('qtd_agua', 'Qual a quantidade de água que deseja armazenar?') !!}
                            {!! Form::text('qtd_agua', null, array('placeholder'=>'Qual a quantidade de água que deseja armazenar?', 'class'=>'form-control', 'required')) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('area_disponivel', 'Qual a área disponível? (m²)') !!}
                            {!! Form::text('area_disponivel', null, array('placeholder'=>'Qual a área disponível? (m²)', 'class'=>'form-control', 'required')) !!}
                        </div>
                    </div>

                </div>
            </div>
            
            <div hidden class="col-sm-12" id="fotos">
                <div class="row">
            
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('foto1', 'Foto 1') !!}
                            {!! Form::file('foto1', ['class'=>'filestyle', 'data-buttonText'=>'Buscar foto', 'data-iconName'=>'fa fa-inbox'])  !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('foto2', 'Foto 2') !!}
                            {!! Form::file('foto2', ['class'=>'filestyle', 'data-buttonText'=>'Buscar foto', 'data-iconName'=>'fa fa-inbox'])  !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('foto3', 'Foto 3') !!}
                            {!! Form::file('foto3', ['class'=>'filestyle', 'data-buttonText'=>'Buscar foto', 'data-iconName'=>'fa fa-inbox'])  !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('foto4', 'Foto 4') !!}
                            {!! Form::file('foto4', ['class'=>'filestyle', 'data-buttonText'=>'Buscar foto', 'data-iconName'=>'fa fa-inbox'])  !!}
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            {!! Form::label('foto5', 'Foto 5') !!}
                            {!! Form::file('foto5', ['class'=>'filestyle', 'data-buttonText'=>'Buscar foto', 'data-iconName'=>'fa fa-inbox'])  !!}
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group">
                    <div id="RecaptchaField1"></div>
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
</section>

<div class="localizacao">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-4">
                <img class="img-responsive margem-auto margem-baixo10" src="{{ url() }}/frontend/img/icone-whatsapp.png">
                <p class="font-size16 cor-branco margem-baixo40">WhatsApp</p>
                <p class="font-size16 cor-branco">(77) 3422-2428</p>
            </div>
            <div class="col-sm-4">
                <img class="img-responsive margem-auto" src="{{ url() }}/frontend/img/icone-telefone.png">
                <p class="font-size16 cor-branco margem-baixo30">Telefone</p>
                <ul class="block-grid-lg-1 block-grid-md-1 block-grid-sm-1 block-grid-xs-1 block-grid-xxs-1">
                    <li class="font-size16 cor-branco">(77) 3424-0092</li>
                </ul>
            </div>
            <div class="col-sm-4">
                <img class="img-responsive margem-auto margem-baixo10" src="{{ url() }}/frontend/img/icone-email.png">
                <p class="font-size16 cor-branco margem-baixo40">Email</p>
                <p class="font-size16 cor-branco">contato@agrosady.com.br</p>
            </div>
        </div>
        <div class="row text-center margem-cima20">
            <div class="col-sm-12">
                <img class="img-responsive margem-auto margem-baixo10" src="{{ url() }}/frontend/img/icone-endereco.png">
                <p class="font-size16 cor-branco">Visite-Nos</p>
                <ul class="block-grid-sm-3 block-grid-xs-1 block-grid-xxs-1 margem-0">
                  <li><p class="font-size16 cor-branco">Matriz - Praça Victor Brito, nº 11, Centro - Vitória da Conquista - Bahia - CEP 45.000-235</p></li>
                  <li><p class="font-size16 cor-branco">Filial - Avenida São Bento, nº 217, Centro - Barra da Estiva - Bahia - CEP 46.650-000</p></li>
                  <li><p class="font-size16 cor-branco">Filial - Vila Projeto Formoso A 0, Zona Rural - Bom Jesus da Lapa - Bahia - CEP 47.600-000</p></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5453.832276565627!2d-40.84399973613986!3d-14.856554890771072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7463bac2ff18a6d%3A0x992fed6a7c4ffd15!2sAgrosady!5e0!3m2!1spt-BR!2sbr!4v1492108356216" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="form-trabalhe-conosco">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <h2 class="font-size30 cor-amarelo black text-uppercase text-center margem-baixo50">Trabalhe Conosco</h2>

                @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <!-- Mensagens -->
                {!! Notifications::byGroup('form-trabalhe-conosco')->toHTML() !!}
                <!-- /Mensagens -->
            </div>
            {!! Form::open(array('route' => 'page.form-trabalhe-conosco', 'method'=>'post', 'files'=>'true')) !!}
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('nome', 'Nome:') !!}
                    {!! Form::text('nome', null, array('placeholder'=>'Nome', 'class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'E-mail:') !!}
                    {!! Form::email('email', null, array('placeholder'=>'E-mail','class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('area', 'Area que deseja Trabalhar:') !!}
                    {!! Form::select('area', [''=>'Área que deseja trabalhar', 'Administrativo'=>'Administrativo', 'Representante'=>'Representante', 'Vendedor'=>'Vendedor'], null, array('class'=>'form-control', 'required')) !!}
                </div>
                <div class="form-group">
                    <div id="RecaptchaField2"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('anexo', 'Currículo') !!}
                    {!! Form::file('anexo', ['class'=>'filestyle', 'data-buttonText'=>'Buscar currículo', 'data-iconName'=>'fa fa-inbox'])  !!}
                </div>
                <div class="form-group">
                    {!! Form::label('mensagem', 'Mensagem:') !!}
                    {!! Form::textarea('mensagem', null, array('placeholder'=>'Mensagem', 'rows'=>'5', 'class'=>'form-control', 'required')) !!}
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group text-center">
                    {!! Form::submit('Enviar', ['class'=>'bt-7']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('frontend/shared/rodape')

@stop

@section('script')
<script type="text/javascript">
    var CaptchaCallback = function () {
        grecaptcha.render('RecaptchaField1', {'sitekey': '6Le4vRYUAAAAAOLmduQxDAuZfrYWgrKIV6x87nX5'});
        grecaptcha.render('RecaptchaField2', {'sitekey': '6Le4vRYUAAAAAOLmduQxDAuZfrYWgrKIV6x87nX5'});
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
<script>
    $(document).ready(function() {
        $('#escavado').change(function() {
            var opcao = $(this).children("option:selected").val();
            if(opcao == "Sim"){
                $( "#fotos" ).show()
                $( "#escavado-sim" ).show()
                $( "#escavado-nao" ).hide()
                $( "#medida_1" ).prop('required',true)
                $( "#medida_2" ).prop('required',true)
                $( "#medida_3" ).prop('required',true)
                $( "#medida_4" ).prop('required',true)
                $( "#medida_5" ).prop('required',true)
                $( "#medida_6" ).prop('required',true)
                $( "#medida_7" ).prop('required',true)
                $( "#medida_8" ).prop('required',true)
                $( "#medida_9" ).prop('required',true)
                $( "#medida_10" ).prop('required',true)
                $( "#medida_11" ).prop('required',true)
                $( "#medida_12" ).prop('required',true)
                $( "#medida_13" ).prop('required',true)
                $( "#qtd_agua" ).prop('required',false)
                $( "#area_disponivel" ).prop('required',false)
            }

            if(opcao == "Não"){
                $( "#fotos" ).show()
                $( "#escavado-nao" ).show()
                $( "#escavado-sim" ).hide()
                $( "#medida_1" ).prop('required',false)
                $( "#medida_2" ).prop('required',false)
                $( "#medida_3" ).prop('required',false)
                $( "#medida_4" ).prop('required',false)
                $( "#medida_5" ).prop('required',false)
                $( "#medida_6" ).prop('required',false)
                $( "#medida_7" ).prop('required',false)
                $( "#medida_8" ).prop('required',false)
                $( "#medida_9" ).prop('required',false)
                $( "#medida_10" ).prop('required',false)
                $( "#medida_11" ).prop('required',false)
                $( "#medida_12" ).prop('required',false)
                $( "#medida_13" ).prop('required',false)
                $( "#qtd_agua" ).prop('required',true)
                $( "#area_disponivel" ).prop('required', true)
            }

            if(opcao == ""){
                $( "#fotos" ).hide()
                $( "#escavado-nao" ).hide()
                $( "#escavado-sim" ).hide()
                $( "#medida_1" ).prop('required',false)
                $( "#medida_2" ).prop('required',false)
                $( "#medida_3" ).prop('required',false)
                $( "#medida_4" ).prop('required',false)
                $( "#medida_5" ).prop('required',false)
                $( "#medida_6" ).prop('required',false)
                $( "#medida_7" ).prop('required',false)
                $( "#medida_8" ).prop('required',false)
                $( "#medida_9" ).prop('required',false)
                $( "#medida_10" ).prop('required',false)
                $( "#medida_11" ).prop('required',false)
                $( "#medida_12" ).prop('required',false)
                $( "#medida_13" ).prop('required',false)
                $( "#qtd_agua" ).prop('required',false)
                $( "#area_disponivel" ).prop('required',false)
            }

        });
    });
</script>
@stop