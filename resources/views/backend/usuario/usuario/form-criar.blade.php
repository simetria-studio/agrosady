<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome') !!}<span class="red">*</span>
            {!! Form::text('name', null, ['class'=>'form-control', 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}<span class="red">*</span>
            {!! Form::email('email', null, ['class'=>'form-control', 'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('imagem_perfil', 'Imagem do Perfil') !!}
            {!! Form::file('imagem_perfil', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: 150px largura X 150px altura.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password', 'Senha') !!}<span class="red">*</span>
            {!! Form::password('password', ['class'=>'form-control', 'required']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Confirma Senha') !!}<span class="red">*</span>
            {!! Form::password('password_confirmation', ['class'=>'form-control', 'required']) !!}
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/usuario/usuario.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop
