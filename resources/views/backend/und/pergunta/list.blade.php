<div class="tile-body p-0">
    <table class="table table-striped">
        <thead>
            <tr role="row">
                <th style='width:10%'>Questão</th>
                <th style='width:60%'>Pergunta</th>
                <th style='width:30%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            {{--*/ $cont = 1 /*--}}
            @foreach ($perguntas->getCollection()->all() as $val)
            <tr>
                <td>{{$cont}}</td>
                <td>{{$val->pergunta}}</td>
                <td>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('und.perguntas.destroy', ['id_pergunta'=>$val->id, 'id_post'=>$post->id]) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            {{--*/ $cont++ /*--}}
            @endforeach
        </tbody>
    </table>

    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$perguntas->count()}} do total de {{$perguntas->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $perguntas->appends(Request::input())->render() !!}
        </div>
    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/und/prova.js"></script>
@stop