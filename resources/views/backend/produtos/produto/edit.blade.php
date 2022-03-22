@extends('backend/layout/layout', ['menu'=>'produtos', 'submenu'=>'produto'])

@section('titulo')
<h2>Produtos <span>Atualizar Produto</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('produto.index') !!}">Produtos</a>
    </li>
    <li><a href="javascript:void(0)">Atualizar Produto</a></li>
</ul>
@stop

@section('vue-model', 'vue_produto')

@section('conteudo')

@if ($errors->any())
<ul class="alert alert-warning">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                @if(isset($atributos) && $atributos != '')
                <div class="form-group">
                    {!! Form::label('', 'Editar Atributos') !!}
                    <table class="table table-bordered table-hover" role="grid">
                        <thead>
                            <tr role="row">
                                <th style='width:40%'>Nome</th>
                                <th style='width:40%'>Valor</th>
                                <th style='width:20%'>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($atributos as $atr)
                            {!! Form::open( ['route'=>['produto.atributo.update', $atr->id]]) !!}
                            <tr>
                                <td>{!! Form::text('nome', $atr->nome, ['class'=>'form-control', 'required']) !!}</td>
                                <td>{!! Form::text('valor', $atr->valor, ['class'=>'form-control', 'required']) !!}</td>
                                <td>
                                    <button class="btn btn-success btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" type="submit"><i class="fa fa-floppy-o"></i><span>Salvar</span></button>
                                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:confirmaExclusao('{!! route('produto.atributo.destroy',$atr->id) !!}')" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                                </td>
                            </tr>
                            {!! Form::close() !!}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                @endif

                {!! Form::model($produto, ['route'=>['produto.update', $produto->id], 'files'=>'true']) !!}

                @include('backend/produtos/produto/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div><!-- /.box-body -->
</div>


@stop

