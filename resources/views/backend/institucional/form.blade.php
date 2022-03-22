<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('pagina', 'Página') !!}<span class="red">*</span>
            {!! Form::text('pagina', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}<span class="red">*</span>
            {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('conteudo', 'Conteúdo') !!}<span class="red">*</span>
            {!! Form::textarea('conteudo', null, ['class'=>'form-control summernote']) !!}
        </div>
    </div>
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>


@section('scripts')
<script type="text/javascript">
$('.summernote').summernote({
    height: 600, // set editor height
    lang: 'pt-BR',
    focus: false, // set focus to editable area after initializing summernote
    toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['picture', 'video', 'link', 'table', 'hr']],
        ['misc', ['undo', 'redo', 'codeview', 'fullscreen']],
    ]
});
</script>
@stop