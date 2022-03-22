<div class="text-center">
    <h3>Permissões do Administrador</h3>
</div>

<hr class="mt-20 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Agenda de Eventos </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('ae', 'ae.total', isset($permissoes)? ($permissoes->contains('name', 'ae.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('ae', 'ae.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'ae.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Banner</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('banner', 'banner.total', isset($permissoes)? ($permissoes->contains('name', 'banner.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('banner', 'banner.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'banner.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Biblioteca Virtual </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('bv', 'bv.total', isset($permissoes)? ($permissoes->contains('name', 'bv.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('bv', 'bv.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'bv.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Blog </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('blog', 'blog.total', isset($permissoes)? ($permissoes->contains('name', 'blog.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
     <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('blog', 'blog.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'blog.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Enquetes </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('enquete', 'enquete.total', isset($permissoes)? ($permissoes->contains('name', 'enquete.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('enquete', 'enquete.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'enquete.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Galeria de Imagens </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('gi', 'gi.total', isset($permissoes)? ($permissoes->contains('name', 'gi.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('gi', 'gi.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'gi.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Galeria de Videos </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('gv', 'gv.total', isset($permissoes)? ($permissoes->contains('name', 'gv.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('gv', 'gv.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'gv.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Banco de Motoristas</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('motorista', 'motorista.total', isset($permissoes)? ($permissoes->contains('name', 'motorista.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('motorista', 'motorista.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'motorista.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Orçamento e Coleta</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('operacao', 'operacao.total', isset($permissoes)? ($permissoes->contains('name', 'operacao.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('operacao', 'operacao.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'operacao.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Rastreio</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('rastreio', 'rastreio.total', isset($permissoes)? ($permissoes->contains('name', 'rastreio.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('rastreio', 'rastreio.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'rastreio.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">RD Digital</h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('rd', 'rd.total', isset($permissoes)? ($permissoes->contains('name', 'rd.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('rd', 'rd.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'rd.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Universidade Digital </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('und', 'und.total', isset($permissoes)? ($permissoes->contains('name', 'und.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('und', 'und.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'und.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Usuários </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('usuario', 'usuario.total', isset($permissoes)? ($permissoes->contains('name', 'usuario.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('usuario', 'usuario.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'usuario.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Seo </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('seo', 'seo.total', isset($permissoes)? ($permissoes->contains('name', 'seo.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('seo', 'seo.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'seo.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Institucional </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('institucional', 'institucional.total', isset($permissoes)? ($permissoes->contains('name', 'institucional.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('institucional', 'institucional.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'institucional.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>

<hr class="mt-10 mb-10">

<div class="row">
    <div class="col-md-8">
        <h4 class="text-bold mt-5">Produtos </h4>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!  Form::radio('produtos', 'produtos.total', isset($permissoes)? ($permissoes->contains('name', 'produtos.total') ? true : false) : false, ['required'=>'true'])!!}<i></i> Total</label>
    </div>
    <div class='col-md-2 text-center'>
        <label class="checkbox checkbox-custom-alt">{!!Form::radio('produtos', 'produtos.nenhuma', isset($permissoes)? ($permissoes->contains('name', 'produtos.nenhuma') ? true : false) : false, ['required'=>'true'])!!}<i></i> Nenhuma</label>
    </div>
</div>
