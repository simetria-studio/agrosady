<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Data da Publicação</th>
                <th style='width:20%'>Título</th>
                <th style='width:30%'>Descrição</th>
                <th style='width:10%'>Autor</th>
                <th style='width:10%'>Categoria</th>
                <th style='width:20%'>Ação</th>
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
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('blog.post.edit',$val->id) !!}" href="{!! route('blog.post.edit',$val->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_post' v-on="click:confirmaExclusao('{!! route('blog.post.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
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
<script src="{{ url() }}/js_models/blog/post.js"></script>
@stop