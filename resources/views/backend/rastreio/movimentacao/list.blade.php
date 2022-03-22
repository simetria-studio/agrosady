@if($objeto->movimentacoes()->count() > 0)
<!--<img style="margin: 30px 0px;" src="{!! ($objeto->movimentacoes()->get()->last()->status == 'Objeto postado') ? url('/dist/img/entrega.gif') : (($objeto->movimentacoes()->get()->last()->status == 'Objeto encaminhado')? url('/dist/img/entrega2.gif'): url('/dist/img/entrega3.gif')) !!}"/>-->
<div class="tile-body p-0">

    <table class="table table-striped">
        <thead>
            <tr>
                <th style='width:20%'>Data</th>
                <th style='width:auto'>Descrição</th>
                <th style='width:auto'>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($objeto->movimentacoes()->get() as $key => $val)
            <tr>
                <td>{{$val->present()->formatDate($val->data_evento)}}</td>
                <td>{{$val->descricao}}</td>
                <td>{{$val->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@else


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <h4>Nenhum evento de localização cadastrado para esse transporte de carga</h4>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>


@endif

@section('scripts')
<script src="{{ url() }}/js_models/rastreio/movimentacao.js"></script>
@stop

