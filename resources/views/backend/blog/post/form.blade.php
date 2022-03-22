<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('data_publicacao', 'Data de Publicação') !!}<span class="red">*</span>
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data_publicacao', isset($post)?date('d/m/Y', strtotime($post->data_publicacao)):date('d/m/Y'), ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::label('id_categoria', 'Categoria') !!}<span class="red">*</span>
            {!! Form::select('categorias[]', $categorias, isset($post)?$post->categorias->lists('id')->all():null, array('class'=>'form-control select2 select2-hidden-accessible','multiple'=>'true', 'style'=>"width: 100%;", 'tabindex'=>'-1', 'aria-hidden'=>'true')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Título') !!}<span class="red">*</span>
            {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subtitulo', 'Subtítulo') !!}<span class="text-sm"> -(Máximo 300 caracteres)</span>
            {!! Form::textarea('subtitulo', null, ['class'=>'form-control', 'Maxlength'=>'300', 'rows'=>'3']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('imagem_destaque', 'Imagem Destaque') !!}
            {!! Form::file('imagem_destaque', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: 600px largura X 325px altura.</p>
            @if(isset($post->imagem_destaque) && ($post->imagem_destaque != ''))
            <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$post->imagem_destaque}}"></img>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('descricao', 'Conteúdo') !!}<span class="red">*</span>
    {!! Form::textarea('descricao', null, ['class'=>'form-control summernote']) !!}
</div>

<div class="form-group">
    {!! Form::label('autor', 'Autor') !!}
    {!! Form::text('autor', null, ['class'=>'form-control']) !!}
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/blog/post.js"></script>
<script src="{{ url() }}/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
$('select').select2();
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
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop