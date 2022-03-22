@extends('frontend/shared/layout')

@section('conteudo')

@include('frontend/shared/topo', ['menu'=>'newsletter'])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="margem-baixo40 text-center">Newsletter</h2>


            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <!-- Mensagens -->
            {!! Notifications::byGroup('newsletter')->toHTML() !!}
            <!-- /Mensagens -->



            {!! Form::open(array('route' => 'page.enviar-newsletter', 'method'=>'post')) !!}
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-group">
                        {!! Form::label('email', 'E-mail:') !!}
                        {!! Form::email('email', null, array('placeholder'=>'E-mail','class'=>'form-control', 'required')) !!}
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                {!! Form::submit('Cadastrar', ['class'=>'btn btn-default']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>


@include('frontend/shared/rodape')

@stop


@section('script')

@stop