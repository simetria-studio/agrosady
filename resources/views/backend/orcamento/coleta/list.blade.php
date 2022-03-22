<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:15%'>Solicitado em</th>
                <th style='width:15%'>Data da Coleta</th>
                <th style='width:20%'>Local</th>
                <th style='width:20%'>Status</th>
                <th style='width:10%'>Mudar Status</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coletas->getCollection()->all() as $val)
            <tr>
                <td>{{$val->present()->formatDateTime($val->created_at)}}</td>
                <td>{{$val->present()->formatDate($val->data_coleta)}}</td>
                <td>{{$val->local}}</td>
                <td>
                    <span class="{{ ($val->status == 'Feito') ? 'text-success' :'text-warning' }} status"><i class="{{($val->status == 'Feito') ? 'fa fa-check' :'fa fa-clock-o'}}"></i> {{$val->status}}</span>
                </td>
                <td>
                    @if($val->status == 'Feito')
                    <a class="btn btn-orange btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.coleta.editStatusColeta',[$val->id, 'Pendente']) !!}" title='Pendente'><i class='fa fa-clock-o'></i><span>Pendente</span></a>
                    @endif
                    @if($val->status == 'Pendente')
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.coleta.editStatusColeta',[$val->id, 'Feito']) !!}" title='Enviado'><i class='fa fa-check'></i><span>Feito</span></a>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' title='Dados do Solicitante' v-model='id_coleta' v-on="click:showUser('{!! route('operacao.coleta.getUser',$val->user_id) !!}')"><i class='fa fa-fw fa-user'></i><span>Solicitante</span></a>                    
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('operacao.coleta.edit',$val->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_coleta' v-on="click:confirmaExclusao('{!! route('operacao.coleta.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$coletas->count()}} do total de {{$coletas->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $coletas->appends(Request::input())->render() !!}
        </div>

    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/orcamento/coleta.js"></script>
@stop