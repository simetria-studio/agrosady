@extends('backend/layout/layout', ['menu'=>'blog', 'submenu'=>'blog-post'])

@section('titulo')
<h2>Blog <span>Lista de Posts</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="javascript:void(0)">Blog - Posts</a>
    </li>
</ul>
@stop


@section('vue-model', 'vue_blog_post')

@section('conteudo')

<!-- Mensagens -->
{!! Notifications::all()->toHTML() !!}
<!-- /Mensagens -->



<div class="row mt-20">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-header dvd dvd-btm">

                {!! Form::open(array('route' => 'blog.post.index', 'method'=>'get')) !!}
                <div class='row'>
                    <div class='col-md-3'>
                        {!! Form::select('filtro_categoria', array(''=>'--Categoria--') + $categorias, Request::input('filtro_categoria'), array('class'=>'form-control', 'onchange'=>'javascript:submit()')) !!}
                    </div>
                    <div class='col-md-4'>
                        {!! Form::text('filtro_pesquisa', Request::input('filtro_pesquisa'), array('class'=>'form-control', 'placeholder'=>'Busca: Entre com o titulo de post tecle enter')) !!}
                    </div>
                </div>
                {!! Form::close() !!}

                <ul class="controls">
                    <li><a class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" href="{!! route('blog.post.create') !!}" class="btn btn-warning pull-right">Novo Post<i class="fa fa-plus mr-5"></i></a></li>
                </ul>
            </div>

            <div class="tile-body">
                <div class="mt-20">
                    @include('backend/blog/post/list')
                </div>
            </div>
        </div><!-- /.box-body -->
    </div>
</div>
@stop

