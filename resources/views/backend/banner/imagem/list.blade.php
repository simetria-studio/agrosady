<div class="tile-body p-0">

     <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:15%'>Nome</th>
                <th style='width:55%'>Imagem</th>
                <th style='width:11%'>Data Início</th>
                <th style='width:11%'>Data Fim</th>
                <th style='width:8%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($imagens->getCollection()->all() as $val)
            <tr>
                <td>{{$val->nome}}</td>
                <td><img class="img-responsive" src="{!! Config::get('prowork.base_img') !!}{{$val->caminho}}"/></td>
                <td>{{$val->data_inicio}}</td>
                <td>{{$val->data_fim}}</td>
                <td>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_banner' v-on="click:confirmaExclusao('{!! route('banner.imagem.destroy',[$val->id, $id_banner]) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$imagens->count()}} do total de {{$imagens->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $imagens->appends(Request::input())->render() !!}
        </div>

    </div>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/banner/banner.js"></script>
@stop
