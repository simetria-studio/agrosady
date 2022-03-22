<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Data do Lançamento</th>
                <th style='width:10%'>Cód. Rastreio</th>
                <th style='width:20%'>CT-e</th>
                <th style='width:30%'>Tomador do Serviço</th>
                <th style='width:30%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objetos->getCollection()->all() as $val)
            <tr>
                <td>{!! date('d/m/Y', strtotime($val->created_at))!!}</td>
                <td>{{$val->id}}</td>
                <td>{{$val->num_cte}}</td>
                <td>{{$val->user->name}}</td>
                <td>
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('rastreio.movimentacao.listMov',$val->id) !!}" title='Localização'><i class='fa fa-location-arrow'></i><span>Localização</span></a>
                    @if($val->dacte != '')
                    <a class="btn btn-primary btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! Config::get('prowork.base_img') !!}{{$val->dacte}}" target="_blank" title='Download do DACTE'><i class='fa fa-download'></i><span>DACTE</span></a>
                    @endif
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_objeto' v-on="click:confirmaExclusao('{!! route('rastreio.objeto.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$objetos->count()}} do total de {{$objetos->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $objetos->appends(Request::input())->render() !!}
        </div>
    </div>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/rastreio/objeto.js"></script>
@stop