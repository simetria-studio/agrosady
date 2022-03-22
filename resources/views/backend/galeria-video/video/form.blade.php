<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('servidor', 'Servidor de Hospedagem do Vídeo') !!}<span class="red">*</span>
            {!! Form::select('servidor', array('youtube' => 'YouTube', 'vimeo' => 'Vimeo'), null, ['class'=>'form-control']); !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Título') !!}<span class="red">*</span>
            {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('caminho', 'Link do Vídeo') !!}<span class="red">*</span>
    {!! Form::text('caminho', null, ['class'=>'form-control']) !!}
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/galeria-video/video.js"></script>
<script src="{{ url() }}/plugins/multiplefiles/dropzone.js"></script>
<script type="text/javascript">

</script>
@stop