<div class="form-group">
    {!! Form::label('pergunta', 'Pergunta') !!}<span class="red">*</span>
    {!! Form::textarea('pergunta', null, ['class'=>'form-control', 'v-model'=>'pergunta']) !!}
</div>

<div class="form-group">
    {!! Form::label('', 'Alternativas') !!}<span class="red">*</span>

    <table class="table table-bordered table-hover" role="grid">
        <thead>
            <tr role="row">
                <th style='width:auto'>Opção <span class="red">*</span></th>
                <th style='width:auto'>Opção Correta <span class="red">*</span></th>
                <th style='width:9.5%'>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr role="row" class="odd" v-repeat="opcao:opcoes">
                <td>{!! Form::text('opcoes[@{{ $index }}]', null, ['class'=>'form-control', 'v-model'=>'opcao.opcao' ,'placeholder'=>"@{{opcao.placeholder}}"]) !!}</td>
                <td>{!! Form::radio('opcao_correta', "@{{opcao.opcao}}", false, ['v-on'=>'click:marcaOpcaoCorreta']) !!}</td>
                <td>
                    <a class="btn btn-danger btn-rounded btn-ef btn-ef-5 btn-ef-5b btn-sm" href='javascript:void(0)' v-on="click:removeOpcao($index)" title='Deletar'><i class='fa fa-trash'></i><span>Deletar</span></a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class='row'>
        <div class='col-md-12 text-right'>
            <a class="btn btn-md btn-success btn-ef btn-ef-3 btn-ef-3c mb-10" v-on="click:adicionaOpcao()" href='javascript:void(0)'>Adiconar opção <i class="fa fa-plus mr-5"></i></a>
        </div>
    </div>

</div>

<div class='row mt-20'>
    <div class='col-md-12'>
        <p class="red text-sm">* Campos Obrigatórios</p>
    </div>
</div>


@section('scripts')
<script src="{{ url() }}/js_models/und/prova.js"></script>
@stop