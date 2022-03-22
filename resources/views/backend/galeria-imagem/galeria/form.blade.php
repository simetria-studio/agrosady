<div class="form-group">
    {!! Form::label('titulo', 'Titulo') !!}<span class="red">*</span>
    {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/galeria-imagem/galeria.js"></script>
@stop