@extends('backend/layout/layout', ['menu'=>'und', 'submenu'=>'und-post', 'submenu_admin'=>'und-admin'])

@section('titulo')
<h2>Universidade Digital <span>Visualização da Prova do post {{$post->titulo}}</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li><a href="{!! route('und.post.index') !!}">Universidade Digital - Posts</a></li>
    <li><a href="{!! route('und.perguntas.index', $post->id) !!}">Prova</a></li>
    <li>
        <a href="javascript:void(0)">Gabarito</a>
    </li>
</ul>
@stop

@section('vue-model', 'vue_und_prova')

@section('conteudo')

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                {{--*/ $cont = 1 /*--}}
                @foreach($post->perguntas as $prova)
                <div>
                <h4 class="mt-20"><strong>{{$cont.'. '.$prova->pergunta}}</strong></h4>
                    @foreach($prova->opcoes as $op)
                        <p>{{$op->opcao}} @if($prova->opcao_correta == $op->opcao)<i class='fa fa-check'></i>@endif</p>
                    @endforeach
                </div>    
                {{--*/ $cont++ /*--}}
                @endforeach
            
            </div>
        </div><!-- /.box-body -->
    </div>
</div>


@stop



