<div class="tile-body p-0">
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 10%">Id</th>
                <th style="width: 25%">Nome</th>
                <th style="width: 35%">Descrição</th>
                <th style="width: 30%">Ação</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($banners->getCollection()->all() as $val)
            <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->nome}}</td>
                <td>{{$val->descricao}}</td>
                <td>
                    <a class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('banner.imagem.index',$val->id) !!}" title='Imagens'><i class='fa fa-image'></i> <span>Imagens</span></a>

                    <a class="btn btn-warning btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href="{!! route('banner.edit',$val->id) !!}" title='Editar'><i class='fa fa-edit'></i> <span>Editar</span></a>
                    @if(Auth::user()->id == 1)
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-model='id_banner' v-on="click:confirmaExclusao('{!! route('banner.destroy',$val->id) !!}')" title='Deletar'><i class='fa fa-trash'></i> <span>Deletar</span></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class='row mt-20'>
        <div class='col-md-5'>
            <p class="text-sm">Mostrando {{$banners->count()}} do total de {{$banners->total()}} registros encontrados.</p>
        </div>
        <div class='col-md-7 text-right'>
            {!! $banners->appends(Request::input())->render() !!}
        </div>
    </div>

</div>




@section('scripts')
<script src="{{ url() }}/js_models/banner/banner.js"></script>
@stop
