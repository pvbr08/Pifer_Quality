<?php
    require_once('function.php');
    index('ID, DESCRICAO, ATIVO, DT_CADASTRO', " PERMISSAO ", '');
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
		<th width="auto">Permissão</th>
		<th>Cadastro</th>
		<th>Ativo</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($permission) : ?>
                <?php foreach ($permission as $permissao) : ?>
                <tr class="<?php if($permissao['ATIVO']){echo "success";}else{ echo "danger";} ?>">
                        <td><?php echo $permissao['ID']; ?></td>
                        <td><?php echo $permissao['DESCRICAO']; ?></td>
                        <td><?php echo $permissao['DT_CADASTRO']; ?></td>
                        <td><?php if ($permissao['ATIVO']){echo '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';}else{echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';} ?></td>
                        <td class="actions text-right">
                            <a href="view.php?id=<?php echo $permissao['ID']; ?>" class="btn btn-md btn-default"><i class="fa fa-eye"></i> </a>
                            <a href="edit.php?id=<?php echo $permissao['ID']; ?>" class="btn btn-md btn-default"><i class="fa fa-pencil"></i> </a>
                            <a href="#" class="btn btn-md btn-default" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $permissao['id']; ?>">
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