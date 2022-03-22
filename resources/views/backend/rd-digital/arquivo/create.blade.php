@extends('backend/layout/layout', ['menu'=>'rd-digital'])

@section('titulo')
<h2>Rd Digital <span>Cadastro de Arquivos</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('rd-digital.arquivo.index') !!}">Rd Digital</a>
    </li>
    <li>
        <a href="javascript:void(0)">Novo arquivo</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_rd-digital')

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
                
                {!! Form::open(array('route' => ['rd-digital.arquivo.store'], 'method'=>'post', 'files'=>true, 'class'=>'dropzone', 'id'=>'rdDigitalDropzone')) !!}

                @include('backend/rd-digital/arquivo/form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop



