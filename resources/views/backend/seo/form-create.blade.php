<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('seo_pagina', 'Pagina') !!}<span class="red">*</span>
            {!! Form::text('seo_pagina', null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('seo_title', 'Seo Title') !!}<span class="text-sm"> - (máximo 70 caracteres)</span>
            {!! Form::text('seo_title', null, ['class'=>'form-control', 'Maxlength'=>'70']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('seo_description', 'Seo Description') !!}<span class="text-sm"> - (máximo 160 caracteres)</span>
            {!! Form::textarea('seo_description', null, ['class'=>'form-control', 'Maxlength'=>'160', 'rows'=>'5']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('seo_keywords', 'Seo Keywords') !!}<span class="text-sm"> - (máximo 200 caracteres)</span>
            {!! Form::textarea('seo_keywords', null, ['class'=>'form-control', 'Maxlength'=>'200', 'rows'=>'5']) !!}
        </div>
    </div>
</div>
<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>


@section('scripts')

@stop