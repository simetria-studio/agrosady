<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:12%'>Solicitado em</th>
                <th style='width:auto'>Tipo de Carga</th>
                <th style='width:auto'>Tomador do Serviço</th>
                <th style='width:auto'>Origem</th>
                <th style='width:auto'>Destino</th>
                <th style='width:10%'>Peso (Kg)</th>
                <th style='width:10%'>Valor Nota</th>
                <th style='width:8%'>Status</th>
                <th style='width:8%'>Mudar Status</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orcamentos->getCollection()->all() as $val)
            <tr>
                <td>{{$val->present()->formatDateTime($val->created_at)}}</td>
                <td>{{$val->tipo_carga}}</td>
                <td>{{$val->tomador_servico}}</td>
                <td>{{$val->origem}}</td>
                <td>{{$val->destino}}</td>
                <td>{!! number_format($val->peso, 0, ',','.') !!}</td>
                <td>{!! 'R$ '. number_format($val->valor_nota, 2, ',','.')!!}</td>
                <td>
                    <span class="{{ ($val->status == 'Enviado') ? 'text-success' :'text-warning' }} status"><i class="{{($val->status == 'Enviado') ? 'fa fa-check' :'fa fa-clock-o'}}"></i> {{$val->status}}</span>
                </td>
                <td>
                    @if($val->status == 'Enviado')
                        <a class="btn btn-orange btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.orcamento.editStatusOrcamento',[$val->id, 'Pendente']) !!}" title='Pendente'><i class='fa fa-clock-o'></i><span>Pendente</span></a>
                    @endif
                    @if($val->status == 'Pendente')
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.orcamento.editStatusOrcamento',[$val->id, 'Enviado']) !!}" title='Enviado'><i class='fa fa-check'></i><span>Enviado</span></a>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' title='Dados do Solicitante' v-model='id_orcamento' v-on="click:showUser('{!! route('operacao.orcamento.getUser',$val->user_id) !!}')"><i class='fa fa-fw fa-user'></i><span>Solicitante</span></a>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.orcamento.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i><span>Editar</span></a>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_orcamento' v-on="click:confirmaExclusao('{!! route('operacao.orcamento.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$orcamentos->count()}} do total de {{$orcamentos->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $orcamentos->appends(Request::input())->render() !!}
        </div>

    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/orcamento/orcamento.js"></script>
@stop