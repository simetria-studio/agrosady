<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}<span class="red">*</span>
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-sm-6">

        {!! Form::label('cat_pai_id', 'Categoria Pai') !!}<span class="red">*</span>
        {!! Form::select('cat_pai_id', $cat_select, isset($categoria) ? $categoria->categoria_pai()->lists('id')->all():null, array('class'=>'form-control')) !!}

    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}
            {!! Form::textarea('descricao', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/produtos/categoria.js"></script>
@stop