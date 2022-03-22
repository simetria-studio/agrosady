<div class="tile-body p-0">
    <h4>Dados do Solicitante</h4>
    <table class="table table-striped">
        <tbody>
            <tr class="">
                <th style='width:20%'>Nome</th>
                <th><?php echo $usuario->name ?></th>
            </tr>
            <tr class="">
                <th style='width:20%'>Email</th>
                <th><?php echo $usuario->email ?></th>
            </tr>
            <tr class="">
                <th style='width:20%'>Data Cadastro</th>
                <th><?php echo $usuario->created_at ?></th>
            </tr>
        </tbody>
    </table>
</div>