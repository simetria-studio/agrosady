@extends('backend/layout/layout', ['menu'=>'banner'])

@section('titulo')
<h2>Banner <span>Editar Banner {{$banner->nome}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('banner.index') !!}">Banner </a>
    </li>
    <li><a href="javascript:void(0)">Editar Banner</a></li>
</ul>
@stop

@section('vue-model', 'vue_banner')


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
                {!! Form::model($banner, ['route'=>['banner.update', $banner->id], 'files'=>'true']) !!}

                @include('backend/banner/banner/form')

                <div class="box-footer text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Atualizar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>


@stop

