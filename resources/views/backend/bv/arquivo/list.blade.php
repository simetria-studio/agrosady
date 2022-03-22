<div class="tile-body p-0">

    <ul class="block-grid-md-9">
        @foreach($arquivos as $arq)

        <li>
            <div class="box-tools text-center">
                <a class="myIcon icon-danger" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('bv.arquivo.destroy',[$arq->bv_pasta->id, $arq->id]) !!}')" title='Deletar'><i class='fa fa-times'></i></a>
            </div>
            <a class="arquivos-item" target="_blank" href="{!! Config::get('prowork.base_img') !!}{{$arq->arquivo}}">
                <img class="img-responsive margem-auto mt-5 mb-5" src="{{ url() }}/dist/img/backend/livro.png">
                <p class="nome-pasta text-center text-strong">{{$arq->nome}}{{strtolower(strchr($arq->arquivo, '.'))}}</p>
            </a>
        </li>
        @endforeach
    </ul>
    
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$arquivos->count()}} do total de {{$arquivos->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $arquivos->appends(Request::input())->render() !!}
        </div>
    </div>

</div>
@section('scripts')
<script src="{{ url() }}/js_models/bv/bv.js"></script>
@stop