@extends('backend/layout/layout', ['menu'=>'enquete', 'submenu'=>'enquete-admin', 'submenu_admin'=>'enquete-admin'])

@section('titulo')
<h2>Enquete <span>Lista de Enquetes</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Enquetes </a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_enquete')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => ['enquete.index'], 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Entre com o título da enquete e tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}

                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('enquete.create') !!}">Nova Enquete <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>    

            <div class="tile-body">
                <div class="mt-20">
                   @include('backend/enquete/list')
                </div>
            </div>
        </div>
    </div>
</div>
@stop

