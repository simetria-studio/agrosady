<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:5%'>Id</th>
                <th style='width:20%'>Nome</th>
                <th style='width:25%'>Descrição</th>
                <th style='width:15%'>Categoria</th>
                <th style='width:15%'>Valor</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->nome}}</td>
                <td>{{$val->present()->shortDescription($val->descricao)}}</td>
                <td>{{$val->present()->formatCategorias($val->categorias)}}</td>
                <td>{{$val->preco}}</td>
                <td>
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('produto.imagem.create',$val->id) !!}" title='Imagens'><i class='fa fa-image'></i> <span>Imagens</span></a>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('produto.edit',$val->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('produto.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$produtos->count()}} do total de {{$produtos->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $produtos->appends(Request::input())->render() !!}
        </div>

    </div>
</div>
@section('scripts')
<script src="{{ url() }}/js_models/produtos/produto.js"></script>
@stop