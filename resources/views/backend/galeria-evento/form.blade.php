<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('titulo', 'Titulo') !!}<span class="red">*</span>
            {!! Form::text('titulo', null, ['class'=>'form-control', 'required']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('data', 'Data do Evento') !!}<span class="red">*</span>
            <div class="input-group datepicker" data-format="L" id="datepicker">
                {!! Form::text('data', isset($evento)?date('d/m/Y', strtotime($evento->data)):null, ['class'=>'form-control', 'required']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('local', 'Local') !!}<span class="red">*</span>
            {!! Form::text('local', null, ['class'=>'form-control', 'required']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('hora', 'Hora do Evento') !!}<span class="red">*</span>
            <div class='input-group datepicker' data-format="LT" id="datepicker2">
                {!! Form::text('hora', isset($evento)?date('H:i', strtotime($evento->hora)):null, ['class'=>'form-control', 'required']) !!}
                <span class="input-group-addon">
                    <span class="fa fa-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('imagem', 'Imagem') !!}
            {!! Form::file('imagem', ['class'=>'filestyle', 'data-buttonText'=>'Buscar Imagem', 'data-iconName'=>'fa fa-inbox'])  !!}
            <p class="help-block">Tamanho sugerido: 730px largura X 300px altura.</p>
            @if(isset($evento->imagem) && ($evento->imagem != ''))
            <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$evento->imagem}}"></img>
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
<script src="{{ url() }}/js_models/galeria-evento/galeria-evento.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop