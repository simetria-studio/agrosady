<div class="tile-body p-0">
    <ul class="block-grid-md-6 block-grid-sm-4">
        @foreach($pastas as $p)
        <li>
            <div class="text-center">
                <a href="{{ route('bv.pasta.edit', $p->id) }}" class="myIcon icon-warning" title="Editar"><i class="fa fa-edit"></i></a>

                <a class="myIcon icon-danger" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('bv.pasta.destroy',$p->id) !!}')" title='Deletar'><i class='fa fa-times'></i></a>
            </div>
            <a class="arquivos-item" href="{{route('bv.arquivo.index', $p->id)}}">
                <img class="img-responsive margem-auto mt-5 mb-5" src="{{ url() }}/dist/img/backend/pasta-bv.png">
                <p class="nome-pasta text-center text-strong" title="{{$p->nome}}">{{$p->nome}}</p>
            </a>
        </li>
        @endforeach
    </ul>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$pastas->count()}} do total de {{$pastas->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $pastas->appends(Request::input())->render() !!}
        </div>
    </div>
</div>
@section('scripts')
<script src="{{ url() }}/js_models/bv/bv.js"></script>
@stop