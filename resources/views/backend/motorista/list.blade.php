<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Cod</th>
                <th style='width:15%'>Nome</th>
                <th style='width:20%'>Email</th>
                <th style='width:10%'>Telefone</th>
                <th style='width:10%'>Informações do Veículo</th>
                <th style='width:15%'>Informações de Rota</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($motoristas->getCollection()->all() as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->nome}}</td>
                <td>{{$val->email}}</td>
                <td>{{$val->telefone}}</td>
                <td>{{$val->veiculo}}</td>
                <td>{{$val->rota}}</td>
                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('motorista.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i><span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('motorista.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$motoristas->count()}} do total de {{$motoristas->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
             {!! $motoristas->appends(Request::input())->render() !!}
        </div>

    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/motorista/motorista.js"></script>
@stop