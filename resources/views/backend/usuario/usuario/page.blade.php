@extends('backend/layout/layout', ['menu'=>'usuarios', 'submenu'=>'usuario-admin', 'submenu_admin'=>'usuario-admin'])

@section('titulo')
<h2>Usuários <span>Listagem de Usuários</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Usuários </a>
    </li>
</ul>
@stop


@section('vue-model', 'vue_usuario')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => 'usuario.index', 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Busca: Entre com o nome do Usuário e tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('usuario.usuario.create') !!}">Novo Administrador <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                <div class="mt-40">
                    @include('backend/usuario/usuario/list')
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop

