@extends('backend/layout/layout', ['menu'=>'seo'])

@section('titulo')
<h2>Usuário <span>Nova Página</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Intranet Corporativa</a>
    </li>
    <li>
        <a href="{!! route('seo.index') !!}">Seo </a>
    </li>
    <li>
        <a href="javascript:void(0)">Nova Pagina </a>
    </li>
</ul>
@stop


@section('vue-model', 'vue_seo')

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

<div class="row  mt-20">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                {!! Form::open(array('route' => 'seo.store')) !!}

                @include('backend/seo/form-create')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@stop



