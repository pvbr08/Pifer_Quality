<?php
    require_once('function.php');
    $complement = ' LEFT JOIN PESSOAS ON (USUARIOS.FK_PESSOAS = PESSOAS.ID) LEFT JOIN PERMISSAO ON (USUARIOS.FK_PERMISSAO = PERMISSAO.ID);';
    index('USUARIOS.ID AS ID, USUARIOS.LOGIN AS LOGIN, USUARIOS.DT_LAST_ACCESS AS DT_LAST_ACCESS, USUARIOS.ATIVO AS ATIVO, PERMISSAO.DESCRICAO AS DESCRICAO ', " USUARIOS ", $complement);
?>

<?php include(HEADER_TEMPLATE); ?>

    <header>
            <div class="row">
                <div class="col-sm-6"><h2>Usuários</h2></div>
                <div class="col-sm-6 text-right h2">
                    <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Novo Usuário</a>
                    <a class="btn btn-default" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
                </div>
            </div>
    </header>

    <?php 
        if (!empty($_SESSION['message'])) : ?>
            <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $_SESSION['message']; ?>
            </div>
            <?php clear_messages(); ?>
    <?php endif; ?>

    <hr>

    <table class="table table-condensed">
        <thead>
            <tr>
		<th>ID</th>
		<th width="auto">Login</th>
		<th>Último Acesso</th>
		<th>Permissão</th>
		<th>Ativo</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($customers) : ?>
                <?php foreach ($customers as $customer) : ?>
                <tr class="<?php if($customer['ATIVO']){echo "success";}else{ echo "danger";} ?>">
                        <td><?php echo $customer['ID']; ?></td>
                        <td><?php echo $customer['LOGIN']; ?></td>
                        <td><?php echo $customer['DT_LAST_ACCESS']; ?></td>
                        <td><?php echo $customer['DESCRICAO']; ?></td>
                        <td><?php if ($customer['ATIVO']){echo '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';}else{echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';} ?></td>
                        <td class="actions text-right">
                            <a href="view.php?id=<?php echo $customer['ID']; ?>" class="btn btn-md btn-default"><i class="fa fa-eye"></i> </a>
                            <a href="edit.php?id=<?php echo $customer['ID']; ?>" class="btn btn-md btn-default"><i class="fa fa-pencil"></i> </a>
                            <a href="#" class="btn btn-md btn-default" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $customer['id']; ?>">
                                <i class="fa fa-trash"></i> 
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
            <tr>
		<td colspan="6">Nenhum registro encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script type="text/javascript">
    </script>
    <?php include('modal.php'); ?>
    <?php include(FOOTER_TEMPLATE); ?>