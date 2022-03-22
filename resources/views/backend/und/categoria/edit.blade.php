@extends('backend/layout/layout', ['menu'=>'und', 'submenu'=>'und-categoria', 'submenu_admin'=>'und-admin'])

@section('titulo')
<h2>Universidade Digital <span>Editar Categoria {{$categoria->nome}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('und.categoria.index') !!}">Universidade Digital - Categorias</a>
    </li>
    <li><a href="javascript:void(0)">Editar Categoria</a></li>
</ul>
@stop

@section('vue-model', 'vue_und_categoria')

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
                {!! Form::model($categoria, ['route'=>['und.categoria.update', $categoria->id]]) !!}

                @include('backend/und/categoria/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Atualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- /.box-body -->


</div>


@stop

