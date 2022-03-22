@extends('backend/layout/layout', ['menu'=>'rastreio', 'submenu'=>'transporte-carga'])

@section('titulo')
<h2>Rastreio <span>Transporte de Cargas - Novo Evento</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('rastreio.index') !!}">Rastreio - Transporte de Cargas</a>
    </li>
    <li>
        <a href="javascript:void(0)">Novo Evento</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gv_video')

@section('conteudo')

@if ($errors->any())
<div class="row">
    <div class="col-md-12">
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                {!! Form::open(array('route' => array('rastreio.movimentacao.store', $objeto->id), 'method'=>'post')) !!}

                @include('backend/rastreio/movimentacao/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop



