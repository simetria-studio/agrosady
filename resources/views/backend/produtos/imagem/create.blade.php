@extends('backend/layout/layout', ['menu'=>'produtos', 'submenu'=>'produto'])

@section('titulo')
<h2>Imagens do Produto {{$produto->nome}}</h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('produto.index') !!}">Produtos</a>
    </li>
    <li>
        <a href="javascript:void(0)">Produto {{$produto->nome}}</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_produtos_imagem')

@section('conteudo')

@if ($errors->any())
<div class="row">
    <div class="col-md-12">
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif


<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                {!! Form::open(array('route' => array('produto.imagem.store', 'id'=>$produto->id), 'method'=>'post', 'files'=>'true', 'class'=>'dropzone', 'id'=>'galeriaDropzone')) !!}

                @include('backend/produtos/imagem/form')

                {!! Form::close() !!}

                <div class="mt-40">
                    @include('backend/produtos/imagem/list')
                </div>
            </div>
        </div>
    </div>
</div>



@stop



