@extends('backend/layout/layout', ['menu'=>'galeria-videos', 'submenu'=>'gv-admin', 'submenu_admin'=>'gv-admin'])

@section('titulo')
<h2>Galeria de Vídeos <span>Editar Galeria {{$galeria->titulo}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('galeria-video.index') !!}">Galeria de Vídeos</a>
    </li>
    <li>
        <a href="javascript:void(0)">Editar Galeria {{$galeria->titulo}}</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gv_galeria')

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
                {!! Form::model($galeria, ['route'=>['galeria-video.galeria.update', $galeria->id], 'files'=>'true']) !!}

                @include('backend/galeria-video/galeria/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- /.box-body -->


</div>


@stop

