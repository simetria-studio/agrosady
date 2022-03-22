<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tipo_carga', 'Tipo de Carga') !!}<span class="red">*</span>
            {!! Form::text('tipo_carga', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('tomador_servico', 'Tomador de Serviço') !!}<span class="red">*</span>
            {!! Form::text('tomador_servico', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('origem', 'Origem') !!}<span class="red">*</span>
            {!! Form::text('origem', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('destino', 'Destino') !!}<span class="red">*</span>
            {!! Form::text('destino', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('peso', 'Peso (Kg)') !!}<span class="red">*</span>
            {!! Form::number('peso', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('valor_nota', 'Valor Nota') !!}<span class="red">*</span>
            {!! Form::text('valor_nota', null, ['class'=>'form-control price']) !!}
        </div>
    </div>
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/orcamento/orcamento.js"></script>
@stop