@extends('backend/layout/layout', ['menu'=>'orcamento', 'submenu'=>'orcamento'])

@section('titulo')
<h2>Orçamento <span>Nova Solicitação de Orçamento</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('operacao.index') !!}">Orçamentos</a>
    </li>
    <li>
        <a href="javascript:void(0)">Novo Orçamento</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gv_orcamento')

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
                {!! Form::open(array('route' => 'operacao.orcamento.store', 'method'=>'post')) !!}

                @include('backend/orcamento/orcamento/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop



