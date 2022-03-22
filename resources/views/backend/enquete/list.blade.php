<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:25%'>ID</th>
                <th style='width:45%'>Enquete</th>
                <th style='width:30%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enquetes->getCollection()->all() as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->pergunta}}</td>
                <td>
                    <a href="{!! route('enquete.resultado', $val->id) !!}" class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" title='Resultado'><i class='fa fa-fw fa-list'></i><span>Resultado</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_categoria' v-on="click:confirmaExclusao('{!! route('enquete.destroy', $val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$enquetes->count()}} do total de {{$enquetes->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
           {!! $enquetes->appends(Request::input())->render() !!}
        </div>

    </div>
</div>
@section('scripts')
<script src="{{ url() }}/js_models/enquete/enquete.js"></script>
@stop