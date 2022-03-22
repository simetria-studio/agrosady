@extends('backend/layout/layout', ['menu'=>'rd-digital'])

@section('titulo')
<h2>Rd Digital <span>Listagem de Arquivos</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Rd Digital</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_rd-digital')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->

<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">

            <div class="tile-header dvd dvd-btm">
                {!! Form::open(array('route' => ['rd-digital.arquivo.index'], 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Busca: Entre com o nome do arquivo tecle enter')) !!}
                    </div>
                </div>

                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('rd-digital.arquivo.create') !!}">Novo Arquivo <i class="fa fa-plus mr-5"></i></a></li>
                </ul>

            </div>    
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class='row'>
                            <div class='col-md-2 form-group'>
                                {!! Form::select('filtro_armazenamento', array(''=>'--Armazenamento--', 'RdDigital'=>'Rd Digital'), Request::input('filtro_armazenamento'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                            </div>
                            <div class='col-md-2 form-group'>
                                {!! Form::select('filtro_ano', array(''=>'--Ano--', '2016'=>'2016', '2017'=>'2017'), Request::input('filtro_ano'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                            </div>
                            <div class='col-md-2 form-group'>
                                {!! Form::select('filtro_regiao', array(''=>'--Região--', 'VIX'=>'VIX', 'VDC'=>'VDC', 'FSA'=>'FSA'), Request::input('filtro_regiao'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                            </div>
                            <div class='col-md-2 form-group'>
                                {!! Form::select('filtro_campanha', array(''=>'--Campanha--','CP01'=>'CP01', 'CP02'=>'CP02', 'CP03'=>'CP03', 'CP04'=>'CP04', 'CP05'=>'CP05', 'CP06'=>'CP06', 'CP07'=>'CP07', 'CP08'=>'CP08', 'CP09'=>'CP09', 'CP10'=>'CP10', 'CP11'=>'CP11', 'CP12'=>'CP12', 'CP13'=>'CP13', 'CP14'=>'CP14', 'CP15'=>'CP15', 'CP16'=>'CP16', 'CP17'=>'CP17', 'CP18'=>'CP18', 'CP19'=>'CP19', 'CP20'=>'CP20'), Request::input('filtro_campanha'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                            </div>
                            <div class='col-md-2 form-group'>
                                {!! Form::select('filtro_setor', array(''=>'--Setor--', 'Setor425'=>'Setor425', 'Setor488'=>'Setor488', 'Setor493'=>'Setor493', 'Setor803'=>'Setor803', 'Setor806'=>'Setor806', 'Setor807'=>'Setor807', 'Setor808'=>'Setor808', 'Setor809'=>'Setor809', 'Setor810'=>'Setor810', 'Setor811'=>'Setor811', 'Setor812'=>'Setor812', 'Setor813'=>'Setor813', 'Setor817'=>'Setor817', 'Setor824'=>'Setor824', 'Setor864'=>'Setor864', 'Setor867'=>'Setor867', 'Setor868'=>'Setor868'), Request::input('filtro_setor'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="mt-20">
                    @if(count($arquivos)>0)
                    @include('backend/rd-digital/arquivo/list')
                    @else
                    <p class="text-sm">Nenhum arquivo encontrado na pasta.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

@stop

