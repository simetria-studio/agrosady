<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Armazenamento</th>
                <th style='width:10%'>Ano</th>
                <th style='width:10%'>Região</th>
                <th style='width:10%'>Campanha</th>
                <th style='width:15%'>Setor</th>
                <th style='width:15%'>Nome</th>
                <th style='width:10%'>Data Criação</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arquivos as $arq)
            <tr>
                <td>{{$arq->armazenamento}}</td>
                <td>{{$arq->ano}}</td>
                <td>{{$arq->regiao}}</td>
                <td>{{$arq->campanha}}</td>
                <td>{{$arq->setor}}</td>
                <td>{{$arq->nome}}</td>
                <td>{{$arq->present()->formatDateTime($arq->created_at)}}</td>
                <td>
                    <a class="btn btn-primary btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! Config::get('prowork.base_img') !!}{{$arq->arquivo}}" title='Visualizar' target="_blank"><i class='fa fa-location-arrow'></i><span>Visualizar</span></a>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('rd-digital.arquivo.destroy', $arq->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
<script src="{{ url() }}/js_models/rd-digital/rd-digital.js"></script>
@stop