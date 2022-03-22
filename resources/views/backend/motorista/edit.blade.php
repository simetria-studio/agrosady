@extends('backend/layout/layout', ['menu'=>'motoristas'])

@section('titulo')
<h2>Banco de Motoristas <span>Editar Motorista</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
     <li>
        <a href="{!! route('motorista.index') !!}">Banco de Motoristas</a>
    </li>
    <li>
        <a href="javascript:void(0)">Editar Motoristas</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_motorista')

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
                {!! Form::model($motorista, ['route'=>['motorista.update', $motorista->id]]) !!}

                @include('backend/motorista/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- /.box-body -->
</div>

@stop

