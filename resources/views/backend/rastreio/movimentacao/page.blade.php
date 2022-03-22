@extends('backend/layout/layout', ['menu'=>'rastreio', 'submenu'=>'transporte-carga'])

@section('titulo')
<h2>Rastreio <span>Transporte de Cargas - Linha do Tempo</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Rastreio - Transporte de Cargas</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gv_movimentacao')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm" style="min-height: 51px;">
                
                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('rastreio.movimentacao.create', $objeto->id) !!}}">Novo Evento <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div> 
            <div class="tile-body">
                <div class="mt-20">
                    @include('backend/rastreio/movimentacao/list')
                </div>
            </div>
        </div>
    </div>
</div>
@stop

