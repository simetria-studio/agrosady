<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:20%'>Título</th>
                <th style='width:10%'>Data</th>
                <th style='width:10%'>Hora</th>
                <th style='width:10%'>Local</th>
                <th style='width:30%'>Descrição</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos->getCollection()->all() as $val)
            <tr>
                <td>{{$val->titulo}}</td>
                <td>{{$val->present()->formatDate($val->data)}}</td>
                <td>{{$val->hora}}</td>
                <td>{{$val->local}}</td>
                <td>{{$val->present()->shortDescription($val->descricao)}}</td>

                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('galeria-evento.edit',$val->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('galeria-evento.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$eventos->count()}} do total de {{$eventos->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $eventos->appends(Request::input())->render() !!}
        </div>

    </div>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/galeria-evento/galeria-evento.js"></script>
@stop
