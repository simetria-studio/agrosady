@extends('backend/layout/layout', ['menu'=>'blog', 'submenu'=>'blog-categoria'])

@section('titulo')
<h2>Blog <span>Atualização da Categoria</span></h2>
@stop

@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('blog.categoria.index') !!}">Blog - Categoria</a>
    </li>
    <li><a href="javascript:void(0)">Atualização da Categoria</a></li>
</ul>
@stop

@section('vue-model', 'vue_blog_categoria')

@section('conteudo')

@if ($errors->any())
<div class="row">
    <div class="col-md-12">
        <ul class="alert alert-warning">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                {!! Form::model($categoria, ['route'=>['blog.categoria.update', $categoria->id]]) !!}

                @include('backend/blog/categoria/form')

                <div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div><!-- /.box-body -->


</div>


@stop

