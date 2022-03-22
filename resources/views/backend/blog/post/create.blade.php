@extends('backend/layout/layout', ['menu'=>'blog', 'submenu'=>'blog-post'])

@section('titulo')
<h2>Blog <span>Novo Post</span></h2>
@stop
@section('cabecalho')
<ul class="page-breadcrumb">
    <li>
        <a href="{!! route('admin') !!}"><i class="fa fa-home"></i> Prowork2</a>
    </li>
    <li>
        <a href="{!! route('blog.post.index') !!}">Blog - Post</a>
    </li>
    <li><a href="javascript:void(0)">Novo Post</a></li>
</ul>
@stop

@section('vue-model', 'vue_blog_post')

@section('conteudo')

@if ($errors->any())
<ul class="alert alert-warning alert-dismissible">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<h4><i class="icon fa fa-warning"></i>Ops! Existe algo errado com o preenchimento dos campos:</h4>
	@foreach($errors->all() as $error)
	<p>{{ $error }}</p>
	@endforeach
</ul>
@endif


<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
				{!! Form::open(array('route' => 'blog.post.store', 'method'=>'post', 'files'=>'true')) !!}

				@include('backend/blog/post/form')

				<div class="text-right">
                    <button class="btn btn-lg btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" type="submit"><i class="fa fa-arrow-right"></i>Salvar</button>
                </div>
				{!! Form::close() !!}
			</div>
		</div>
	</div><!-- /.box-body -->
</div>


@stop



