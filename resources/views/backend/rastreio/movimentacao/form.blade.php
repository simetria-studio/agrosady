<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('data_evento', 'Data Evento') !!}<span class="red">*</span>
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data_evento', null, ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('status', 'Status') !!}<span class="red">*</span>
            {!! Form::select('status', [''=>'--Selecione--']+array('Em trânsito'=>'Em trânsito', 'Entregue'=>'Entregue'), null, array('class'=>'form-control')) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('descricao', 'Descrição') !!}<span class="red">*</span>
            {!! Form::textarea('descricao', null, ['class'=>'form-control summernote']) !!}
        </div>
    </div>
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/rastreio/movimentacao.js"></script>
<script type="text/javascript">

</script>
@stop