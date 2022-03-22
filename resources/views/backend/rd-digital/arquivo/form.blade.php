
<!--<div class="row">
    <div class="form-group col-md-12">
        {!! Form::label('nome', 'Nome') !!}<span class="red">*</span>
        {!! Form::text('nome', null, ['class'=>'form-control', 'required'=>'true']) !!}
    </div>
</div>-->
<div class="row">
    <div class="form-group col-md-12">
        <h4 class="red margem-baixo30">OBS: Preencher todos os campos antes de arrastar os arquivos.</h4>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('armazenamento', 'Armazenamento') !!}<span class="red">*</span>
        {!! Form::select('armazenamento', array(''=>'--Armazenamento--', 'RdDigital'=>'Rd Digital'), null, array('class'=>'form-control', 'required'=>'true')) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('ano', 'Ano') !!}<span class="red">*</span>
        {!! Form::select('ano', array(''=>'--Ano--', '2016'=>'2016', '2017'=>'2017'), null, array('class'=>'form-control', 'required'=>'true')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('região', 'regiao') !!}<span class="red">*</span>
        {!! Form::select('regiao', array(''=>'--Região--', 'VIX'=>'VIX', 'VDC'=>'VDC', 'FSA'=>'FSA'), null, array('class'=>'form-control', 'required'=>'true')) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('campanha', 'Campanha') !!}<span class="red">*</span>
        {!! Form::select('campanha', array(''=>'--Campanha--','CP01'=>'CP01', 'CP02'=>'CP02', 'CP03'=>'CP03', 'CP04'=>'CP04', 'CP05'=>'CP05', 'CP06'=>'CP06', 'CP07'=>'CP07', 'CP08'=>'CP08', 'CP09'=>'CP09', 'CP10'=>'CP10', 'CP11'=>'CP11', 'CP12'=>'CP12', 'CP13'=>'CP13', 'CP14'=>'CP14', 'CP15'=>'CP15', 'CP16'=>'CP16', 'CP17'=>'CP17', 'CP18'=>'CP18', 'CP19'=>'CP19', 'CP20'=>'CP20'), null, array('class'=>'form-control', 'required'=>'true')) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('setor', 'Setor') !!}<span class="red">*</span>
        {!! Form::select('setor', array(''=>'--Setor--', 'Setor425'=>'Setor425', 'Setor488'=>'Setor488', 'Setor493'=>'Setor493', 'Setor803'=>'Setor803', 'Setor806'=>'Setor806', 'Setor807'=>'Setor807', 'Setor808'=>'Setor808', 'Setor809'=>'Setor809', 'Setor810'=>'Setor810', 'Setor811'=>'Setor811', 'Setor812'=>'Setor812', 'Setor813'=>'Setor813', 'Setor817'=>'Setor817', 'Setor824'=>'Setor824', 'Setor864'=>'Setor864', 'Setor867'=>'Setor867', 'Setor868'=>'Setor868'), null, array('class'=>'form-control', 'required'=>'true')) !!}
    </div>
    <!--    <div class="col-md-6">
            <div class="form-group">
                {!! Form::label('arquivo', 'Arquivo') !!}<span class="red">*</span>
                {!! Form::file('arquivo', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
                <p class="help-block">Tamanho sugerido: LXA.</p>
                @if(isset($imagem))
                <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$imagem->caminho}}"></img>
                @endif
            </div>
        </div>-->
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="dz-message needsclick">
            <img src="{{ url() }}/dist/img/icon-drop-file.png">
            <h3>Solte arquivos aqui ou clique para fazer upload.</h3>
        </div>  
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/rd-digital/rd-digital.js"></script>
<!--<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>-->
<script src="{{ url() }}/plugins/multiplefiles/dropzone.js"></script>
<!--<script>
Dropzone.options.rdDigitalDropzone = {
    headers: {
        'X-CSRF-Token': $('input[name="_token"]').val()
    },
    init: function () {
        this.on("complete", function () {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                location.reload();
            }
        });
    }
};
</script>-->
@stop