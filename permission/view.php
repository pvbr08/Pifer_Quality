<?php 
	require_once('function.php'); 
	view('PERMISSAO.DESCRICAO', ' PERMISSAO ' ,'', " WHERE PERMISSAO.ID = " . $_GET['id'] . ";");

?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Usuário - <?php echo $permission['LOGIN']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Permissão:</dt>
	<dd><?php echo $permission['DESCRICAO']; ?></dd>
</dl>
<?php 
    require_once('function.php'); 
    findAuxiliar('USUARIOS.ID, USUARIOS.LOGIN, USUARIOS.ATIVO', 'USUARIOS ', 'LEFT JOIN PERMISSAO ON (PERMISSAO.ID = USUARIOS.FK_PERMISSAO) ', 'WHERE USUARIOS.FK_PERMISSAO = ' . $_GET['id']);

?>
    <table class="table table-condensed">
        <thead>
            <tr>
		<th>ID</th>
		<th width="auto">Login</th>
		<th>Último Acesso</th>
		<th>Permissão</th>
		<th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($permissionAuxiliar) : ?>
                <?php foreach ($permissionAuxiliar as $aux) : ?>
                <tr class="<?php if($aux['ATIVO']){echo "success";}else{ echo "danger";} ?>">
                        <td><?php echo $aux['ID']; ?></td>
                        <td><?php echo $aux['LOGIN']; ?></td>
                        <td><?php if ($aux['ATIVO']){echo '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';}else{echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';} ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
            <tr>
		<td colspan="6">Nenhum registro encontrado.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>



<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $permission['id']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>