@extends('backend/layout/layout', ['menu'=>'galeria-imagens', 'submenu'=>'gi-admin', 'submenu_admin'=>'gi-admin'])

@section('titulo')
<h2>Galeria de Imagens <span>Nova Galeria</span></h2>
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
        <a href="javascript:void(0)">Nova Galeria</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gi_galeria')

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
                {!! Form::open(array('route' => 'galeria-imagem.galeria.store', 'method'=>'galeria', 'files'=>'true')) !!}

                @include('backend/galeria-imagem/galeria/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop



