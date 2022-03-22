@extends('backend/layout/layout', ['menu'=>'galeria-imagens', 'submenu'=>'gi-admin', 'submenu_admin'=>'gi-admin'])

@section('titulo')
<h2>Galeria de Imagens <span>Listagem e Cadastro de Imagens da Galeria {{$galeria->titulo}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('galeria-imagem.index') !!}">Galeria de Imagens</a>
    </li>
    <li>
        <a href="javascript:void(0)">Galeria {{$galeria->titulo}}</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gi_imagem')

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
                {!! Form::open(array('route' => array('galeria-imagem.imagem.store', 'id'=>$galeria->id), 'method'=>'post', 'files'=>'true', 'class'=>'dropzone', 'id'=>'galeriaDropzone')) !!}

                @include('backend/galeria-imagem/imagem/form')

                {!! Form::close() !!}
                
                <div class="mt-40">
                    @include('backend/galeria-imagem/imagem/list')
                </div>
            </div>
        </div>
    </div>
</div>



@stop



