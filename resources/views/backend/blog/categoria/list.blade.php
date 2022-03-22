<!-- Novo -->
<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:25%'>Nome</th>
                <th style='width:45%'>Descrição</th>
                <th style='width:30%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias->getCollection()->all() as $val)
            <tr>
                <td>{{$val->nome}}</td>
                <td>{{$val->descricao}}</td>
                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('blog.categoria.edit',$val->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_categoria' v-on="click:confirmaExclusao('{!! route('blog.categoria.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$categorias->count()}} do total de {{$categorias->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $categorias->appends(Request::input())->render() !!}
        </div>

    </div>
</div>

@section('scripts')
<script src="{{ url() }}/js_models/blog/categoria.js"></script>
@stop