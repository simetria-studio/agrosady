<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}<span class="red">*</span>
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('id_categoria', 'Categoria(s)') !!}<span class="red">*</span>
            {!! Form::select('categorias[]', $cat_select, isset($produto)?$produto->categorias->lists('id')->all():null, array('class'=>'form-control select2 select2-hidden-accessible','multiple'=>'true', 'style'=>"width: 100%;", 'tabindex'=>'-1', 'aria-hidden'=>'true')) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('imagem_banner', 'Imagem do Banner') !!}
            {!! Form::file('imagem_banner', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: 1920px largura X 540px altura.</p>
            @if(isset($produto->imagem_banner) && ($produto->imagem_banner != ''))
            <img style='width:150px; height:40px;' src="{!! Config::get('prowork.base_img') !!}{{$produto->imagem_banner}}"></img>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('preco', 'Preço') !!}
            {!! Form::text('preco', null, ['class'=>'form-control']) !!}
            <p class="help-block">Formato. exmplos: 99999999.99 --- 1575.50 --- 150.00</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('preco_promocional', 'Preço Promocional') !!}
            {!! Form::text('preco_promocional', null, ['class'=>'form-control']) !!}
            <p class="help-block">Formato. exmplos: 99999999.99 --- 1575.50 --- 150.00</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('data_promocao', 'Validade da Promoção') !!}
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data_promocao', isset($produto->data_promocao)?date('d/m/Y', strtotime($produto->data_promocao)):null, ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('', 'Adicionar Atributos') !!}

    <table class="table table-bordered table-hover" role="grid">
        <thead>
            <tr role="row">
                <th style='width:40%'>Nome</th>
                <th style='width:40%'>Valor</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr role="row" class="odd" v-repeat="atributo:atributos">
                <td>{!! Form::text('atributo[@{{ $index }}]', null, ['class'=>'form-control', 'v-model'=>'atributo.atributo' ,'placeholder'=>"@{{atributo.placeholder_atributo}}"]) !!}</td>
                <td>{!! Form::text('valor_atributo[@{{ $index }}]', null, ['class'=>'form-control', 'v-model'=>'atributo.valor' ,'placeholder'=>"@{{atributo.placeholder_valor}}"]) !!}</td>
                <td>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:removeAtributo($index)" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class='row'>
        <div class='col-md-12 text-right'>
            <a class="btn btn-md btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" v-on="click:adicionaAtributo()" href='javascript:void(0)'>Adiconar atributo <i class="fa fa-plus mr-5"></i></a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('descricao', 'Conteúdo') !!}<span class="red">*</span>
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
<script src="{{ url() }}/js_models/produtos/produto.js"></script>
<script src="{{ url() }}/plugins/select2/select2.min.js"></script>
<script type="text/javascript">
$('select.select2').select2();
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

<script>
//val();
//function val() {
//    d = document.getElementById("valor").value;
//    if (d === '') {
//        $('#valor_promocional').prop('disabled', true);
//        $('#data_promocao').prop('disabled', true);
//    } else {
//        $('#valor_promocional').prop('disabled', false);
//        $('#data_promocao').prop('disabled', false);
//    }
//}
</script>
@stop