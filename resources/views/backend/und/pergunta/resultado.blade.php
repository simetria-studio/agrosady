@extends('backend/layout/layout', ['menu'=>'und', 'submenu'=>'und-post', 'submenu_admin'=>'und-admin'])

@section('titulo')
<h2>Universidade Digital <span>Resultado da Prova do post {{$post->titulo}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li><a href="{!! route('und.post.index') !!}">Universidade Digital - Posts</a></li>
    <li><a href="{!! route('und.perguntas.index', $post->id) !!}">Prova</a></li>
    <li>
        <a href="javascript:void(0)">Universidade Digital - Resultado da Prova</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_und_prova')

@section('conteudo')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <h4><strong>{!!count($post->perguntas) > 0 ? (count($post->perguntas->first()->respostas)).' usuário(s) responderam a prova.'  : 'Prova sem perguntas.'!!}</strong><h4>
                
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style='width:90%'>Usuário</th>
                            <th style='width:10%'>% de Acerto</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($post->present()->getResultadoProva as $key=>$val)
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$val}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>        
    </div><!-- /.box-body -->
</div>

@stop



