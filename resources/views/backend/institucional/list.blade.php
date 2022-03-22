<div class="tile-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>id</th>
                <th style='width:20%'>Página</th>
                <th style='width:30%'>Conteudo</th>
                <th style='width:20%'>Url</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paginas as $pagina)
            <tr>
                <td>{{$pagina->id}}</td>
                <td>{{$pagina->pagina}}</td>
                <td>{{$pagina->present()->shortDescription($pagina->conteudo)}}</td>
                <td>@if($pagina->slug != ''){{url () }}/{{$pagina->slug}}@endif</td>
                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('institucional.edit',$pagina->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('institucional.destroy', $pagina->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/institucional/institucional.js"></script>
@stop
