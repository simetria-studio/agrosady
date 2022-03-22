@extends('backend/layout/layout', ['menu'=>'biblioteca-virtual', 'submenu'=>'bv-admin', 'submenu_admin'=>'bv-admin'])

@section('titulo')
<h2>Biblioteca Virtual <span>Seção {{$pasta->nome}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('bv.index') !!}">Biblioteca Virtual</a>
    </li>
    <li>
        <a href="javascript:void(0)">Seção {{$pasta->nome}}</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_bv')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->



<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => ['bv.arquivo.index', $id_pasta], 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Entre com o nome do arquivo e tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('bv.arquivo.create', ['id'=>$id_pasta]) !!}">Novo Arquivo <i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                @if(count($arquivos)>0)
                <div>
                    @include('backend/bv/arquivo/list')
                </div>
                @else
                <div>
                    Nenhum arquivo encontrado na seção.
                </div>
                @endif
            </div><!-- /.box-body -->
        </div>
    </div>
</div>
@stop

