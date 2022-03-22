@extends('backend/layout/layout', ['menu'=>'orcamento', 'submenu'=>'orcamento'])

@section('titulo')
<h2>Orçamento <span>Lista de Solicitações de Orçamento</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Orçamentos</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_gv_orcamento')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => 'operacao.index', 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Busca: Entre com o nome da categoria tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}

                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('operacao.orcamento.create') !!}">Novo Orçarmento <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>  
            <div class="tile-body">
                <div class="mt-20">
                    @include('backend/orcamento/orcamento/list')
                </div>
            </div>
        </div>
    </div>
</div>

@stop

