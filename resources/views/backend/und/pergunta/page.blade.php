@extends('backend/layout/layout', ['menu'=>'und', 'submenu'=>'und-post', 'submenu_admin'=>'und-admin'])

@section('titulo')
<h2>Universidade Digital <span>Lista de Perguntas do post {{$post->titulo}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Universidade Digital - Prova</a>
    </li>
</ul>
@stop


@section('vue-model', 'vue_und_prova')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => ['und.perguntas.index', 'id'=>$post->id], 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Entre com o título da pergunta e tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('und.perguntas.viewprova', ['id_post'=>$post->id]) !!}">Ver Gabarito <i class='fa fa-eye mr-5'></i></a></li>
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('und.perguntas.viewresultadoprova', ['id'=>$post->id]) !!}"><i class="fa fa-arrow-right"></i>Ver Resultado</a></li>
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('und.perguntas.create',['id'=>$post->id]) !!}">Nova Pergunta <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                <div class="mt-20">
                    @include('backend/und/pergunta/list')
                </div>
            </div>
        </div>
    </div>
</div>
@stop

