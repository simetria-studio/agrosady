@extends('backend/layout/layout', ['menu'=>'usuarios', 'submenu'=>'usuario-admin', 'submenu_admin'=>'usuario-admin'])

@section('titulo')
<h2>Usuário <span>Editar Usuário</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('usuario.index') !!}">Usuários </a>
    </li>
    <li>
        <a href="javascript:void(0)">Editar Usuário </a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_usuario')

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
                {!! Form::model($usuario, ['route'=>['usuario.usuario.update', $usuario->id], 'files'=>'true']) !!}

                @include('backend/usuario/usuario/form-editar')

                @include('backend/usuario/permissao/form-editar')
                
                <div class='row mt-20'>
                    <div class='col-md-12'>
                        <p class="red text-sm">* Campos Obrigatórios</p>
                    </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop
