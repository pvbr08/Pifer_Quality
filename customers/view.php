<?php 
	require_once('function.php'); 
        $complemento = ' LEFT JOIN PESSOAS ON (PESSOAS.ID = USUARIOS.FK_PESSOA) LEFT JOIN PERMISSAO ON (PERMISSAO.ID = PESSOAS.FK_PERMISSAO) ';
	view('USUARIOS.ID, USUARIOS.LOGIN, PESSOAS.NOME, PERMISSAO.DESCRICAO ', ' USUARIOS ' ,$complemento, "WHERE USUARIOS.ID = " . $_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Usuário - <?php echo $users['LOGIN']; ?></h2>
<hr>

<?php if (!empty($_SESSION['message'])) : ?>
	<div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
<?php endif; ?>

<dl class="dl-horizontal">
	<dt>Usuário:</dt>
	<dd><?php echo $users['LOGIN']; ?></dd>

	<dt>Funcionário:</dt>
	<dd><?php echo $users['NOME']; ?></dd>

	<dt>Permissao:</dt>
	<dd><?php echo $users['DESCRICAO']; ?></dd>
</dl>


<div id="actions" class="row">
	<div class="col-md-12">
	  <a href="edit.php?id=<?php echo $users['ID']; ?>" class="btn btn-primary">Editar</a>
	  <a href="index.php" class="btn btn-default">Voltar</a>
	</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>