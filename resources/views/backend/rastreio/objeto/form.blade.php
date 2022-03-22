<div class='row'>
    <div class='col-md-12'>
        <div class="form-group">
            {!! Form::label('user_id', 'Tomador do Serviço') !!}<span class="red">*</span>
            {!! Form::select('user_id', [''=>'-- selecione --']+$usuarios, null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-6'>
        <div class="form-group">
            {!! Form::label('num_cte', 'Número CT-e') !!}
            {!! Form::text('num_cte', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
           {!! Form::label('dacte', 'DACTE') !!}
            {!! Form::file('dacte', ['class'=>'filestyle', 'data-buttonText'=>'Buscar DACTE', 'data-iconName'=>'fa fa-inbox'])  !!}
            @if(isset($imagem))
            <img style='width:80px; height:80px;' src="{!! Config::get('prowork.base_img') !!}{{$imagem->caminho}}"></img>
            @endif
        </div>
    </div>
</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>



@section('scripts')
<script src="{{ url() }}/js_models/rastreio/objeto.js"></script>
<script src="{{ url() }}/minovate/assets/js/vendor/filestyle/bootstrap-filestyle.min.js"></script>
@stop