<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}<span class="red">*</span>
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('arquivo', 'Arquivo') !!}<span class="red">*</span>
            {!! Form::file('arquivo', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Arquivo', 'data-iconName'=>'fa fa-inbox'])  !!}
        </div>
    </div>
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
<script src="{{ url() }}/js_models/bv/bv.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop