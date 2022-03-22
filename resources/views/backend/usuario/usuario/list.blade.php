<div class="tile-body p-0">
    <h3>Administradores</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Id</th>
                <th style='width:25%'>Nome</th>
                <th style='width:40%'>E-mail</th>
                <th style='width:25%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($administradores as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>
                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('usuario.usuario.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i> <span>Editar</span></a>

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('usuario.usuario.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <hr class="mt-40 mb-40">
    
    <h3>Usuários</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:10%'>Id</th>
                <th style='width:25%'>Nome</th>
                <th style='width:40%'>E-mail</th>
                <th style='width:25%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->name}}</td>
                <td>{{$val->email}}</td>
                <td>
                    <!--<a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('usuario.usuario.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i> <span>Editar</span></a>-->

                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('usuario.usuario.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
<script src="{{ url() }}/js_models/usuario/usuario.js"></script>
@stop