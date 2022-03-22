<div class="tile-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:15%'>Página</th>
                <th style='width:15%'>Title</th>
                <th style='width:30%'>Description</th>
                <th style='width:20%'>Keywords</th>
                <th style='width:20%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paginas as $pagina)
            <tr>
                <td>{{$pagina->seo_pagina}}</td>
                <td>{{$pagina->seo_title}}</td>
                <td>{{$pagina->seo_description}}</td>
                <td>{{$pagina->seo_keywords}}</td>
                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('seo.edit',$pagina->id) !!}" title='Editar'><i class='fa fa-fw fa-edit'></i><span>Editar</span></a>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('seo.destroy', $pagina->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/seo/seo.js"></script>
@stop
