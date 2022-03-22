<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::text('nome', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('caminho', 'Imagem') !!}<span class="red">*</span>
            {!! Form::file('caminho', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: LXA.</p>
            @if(isset($imagem))
            <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$imagem->caminho}}"></img>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('data_inicio', 'Data de Publicação') !!}<span class="red">*</span>
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data_inicio', date('d/m/Y'), ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('data_fim', 'Data de Expiração') !!}
            <div class="input-group datepicker" data-format="L">
                {!! Form::text('data_fim', null, ['class'=>'form-control']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('link', 'Link') !!}
            {!! Form::text('link', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/banner/banner.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop