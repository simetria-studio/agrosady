<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}<span class="red">*</span>
            {!! Form::text('titulo', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('img_capa', 'Imagem Capa') !!}
            {!! Form::file('img_capa', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: 510px largura X 260px altura.</p>
            @if(isset($galeria))
            <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$galeria->img_capa}}"></img>
            @endif
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
<script src="{{ url() }}/js_models/galeria-video/galeria.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop