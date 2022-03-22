<div class="tile-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Data da Publicação</th>
                <th style='width:15%'>Título</th>
                <th style='width:25%'>Descrição</th>
                <th style='width:10%'>Autor</th>
                <th style='width:10%'>Categoria</th>
                <th style='width:30%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts->getCollection()->all() as $val)
            <tr>
                <td>{{$val->present()->formatDate($val->data_publicacao)}}</td>
                <td>{{$val->titulo}}</td>
                <td>{{$val->present()->shortDescription($val->descricao)}}</td>
                <td>{{$val->autor}}</td>
                <td>{{$val->present()->formatCategorias($val->categorias)}}</td>
                <td>
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('und.perguntas.index',$val->id) !!}" title='Prova'><i class='fa fa-file-powerpoint-o'></i> <span>Prova</span></a>

                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('und.post.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i> <span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('und.post.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$posts->count()}} do total de {{$posts->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $posts->appends(Request::input())->render() !!}
        </div>
    </div>

</div>

@section('scripts')
<script src="{{ url() }}/js_models/und/post.js"></script>
@stop