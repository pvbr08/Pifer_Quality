<?php 
    require_once('function.php'); 
    edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $users['ID']; ?>" method="post">
    <hr />
        <div class="row">
            <div class="form-group col-md-7">
                <label for="name">Login</label>
                <input type="text" class="form-control" name="users['LOGIN']" value="<?php echo $users['LOGIN']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">CNPJ / CPF</label>
                <input type="text" class="form-control" name="users['PASS']" value="<?php echo $users['PASS']; ?>">
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