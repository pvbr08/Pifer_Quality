<?php 
  require_once('function.php');
  $colunas = 'ID, LOGIN, PASS';
  $tabela = 'USUARIOS';
  
  edit($colunas, $tabela);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-5">
            <label for="name">Usuário</label>
            <input type="text" class="form-control" name="customer['login']" value="<?php echo $customer['login']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="campo2">Senha</label>
            <input type="password" class="form-control" name="customer['pass']" value="<?php echo $customer['pass']; ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="campo3">Confirmar Senha</label>
            <input type="password" class="form-control" name="pass_confirm">
        </div>
    </div>
    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>