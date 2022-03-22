<div class="form-group">
    {!! Form::label('nome', 'Nome') !!}<span class="red">*</span>
    {!! Form::text('nome', null, ['class'=>'form-control']) !!}
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
<script src="{{ url() }}/js_models/und/categoria.js"></script>
@stop