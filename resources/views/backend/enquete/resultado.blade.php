@extends('backend/layout/layout', ['menu'=>'enquete', 'submenu'=>'enquete-admin', 'submenu_admin'=>'enquete-admin'])

@section('titulo')
<h2>Enquete <span>Resultado</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('enquete.index') !!}">Enquetes </a>
    </li>
    <li><a href="javascript:void(0)">Resultado</a></li>
</ul>
@stop

@section('vue-model', 'vue_enquete')

@section('conteudo')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class='row'>
                    <div class='col-md-12'>
                        <h4><strong>{{$enquete->pergunta}}</strong></h4>
                    </div>
                </div>

                <div class="tile-body p-0">
                    @if(count($enquete->respostas)>0)
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style='width:70%'>Opções</th>
                                <th style='width:45%'>Votos</th>
                                <th style='width:30%'>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--*/ $cont = 1 /*--}}
                            @foreach ($enquete->opcoes as $val)
                            <tr>
                                <td>{{$val->opcao}}</td>
                                <td>{{count($val->respostas)}}</td>
                                <td>{!! (count($val->respostas)*100)/count($enquete->respostas) !!}%</td>
                            </tr>
                            {{--*/ $cont++ /*--}}
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class='row mt-20'>
                        <div class='col-md-12'>
                            <p class="text-sm">Até o momento não há votação para esta enquete..</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>


@stop



