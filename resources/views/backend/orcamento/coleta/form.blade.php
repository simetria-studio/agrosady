<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::label('data_coleta', 'Data da Coleta') !!}<span class="red">*</span>
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data_coleta', isset($coleta)?date('d/m/Y', strtotime($coleta->data_coleta)): null, ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group">
            {!! Form::label('local', 'Local') !!}<span class="red">*</span>
            {!! Form::text('local', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('observacao', 'Observação') !!}
    {!! Form::textarea('observacao', null, ['class'=>'form-control']) !!}
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>
@section('scripts')
<script src="{{ url() }}/js_models/orcamento/coleta.js"></script>
<script src="{{ url() }}/plugins/multiplefiles/dropzone.js"></script>
<script type="text/javascript">

</script>
@stop