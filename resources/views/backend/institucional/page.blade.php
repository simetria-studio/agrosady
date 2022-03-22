@extends('backend/layout/layout', ['menu'=>'institucional'])

@section('titulo')
<h2>Institucional</h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Institucional</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_institucional')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-header dvd dvd-btm">
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Busca: Entre com o nome da pagina e tecle enter')) !!}
                    </div>
                </div>
                
                 <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('institucional.create') !!}">Nova Página <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                <h3>Páginas Institucional</h3>
                <hr class="mb-40">
                <div class="mt-20">
                    @include('backend/institucional/list')
                </div>
            </div>
        </div>
    </div>
</div>

@stop

