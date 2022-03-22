<div class="text-center">
    <h3>Permissões do Administrador</h3>
</div>

<hr class="mt-20 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Agenda de Eventos</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('ae', 'ae.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('ae', 'ae.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Banner</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('banner', 'banner.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('banner', 'banner.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Biblioteca Virtual</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('bv', 'bv.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('bv', 'bv.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Blog</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('blog', 'blog.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
     <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('blog', 'blog.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Enquetes</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('enquete', 'enquete.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('enquete', 'enquete.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Galeria de Imagens</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('gi', 'gi.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('gi', 'gi.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Galeria de Videos</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('gv', 'gv.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('gv', 'gv.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Banco de Motoristas</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('motorista', 'motorista.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('motorista', 'motorista.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Orçamento e Coleta</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('operacao', 'operacao.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('operacao', 'operacao.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Rastreio</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('rastreio', 'rastreio.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('rastreio', 'rastreio.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">RD Digital</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('rd', 'rd.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('rd', 'rd.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Universidade Digital</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('und', 'und.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('und', 'und.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Usuários</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('usuario', 'usuario.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('usuario', 'usuario.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Seo</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('seo', 'seo.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('seo', 'seo.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Institucional</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('institucional', 'institucional.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('institucional', 'institucional.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Produtos</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('produtos', 'produtos.total', false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('produtos', 'produtos.nenhuma', true, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>



