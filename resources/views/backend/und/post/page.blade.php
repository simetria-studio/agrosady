@extends('backend/layout/layout', ['menu'=>'und', 'submenu'=>'und-post', 'submenu_admin'=>'und-admin'])

@section('titulo')
<h2>Universidade Digital <span>Lista de Provas</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('und.post.index') !!}">Universidade Digital - Provas</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_und_post')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->



<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => 'und.post.index', 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-3'>
                        {!! Form::select('filtro_categoria', array(''=>'--Categoria--') + $categorias, Request::input('filtro_categoria'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                    </div>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Entre com o título ou autor e tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('und.post.create') !!}">Nova Prova <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                <div class="mt-20">
                    @include('backend/und/post/list')
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
@stop

