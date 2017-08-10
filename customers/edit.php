<?php 
  require_once('function.php');
  $colunas = 'ID, LOGIN, PASS';
  $tabela = 'USUARIOS';
  
  edit($colunas, $tabela);
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['ID']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-5">
            <label for="usuarios">Usuário</label>
            <input type="text" class="form-control" name="customer['LOGIN']" value="<?php echo $customer['LOGIN']; ?>" >
        </div>
        <div class="form-group col-md-3">
            <label for="campo3">Nova Senha</label>
            <input class="form-control" type="password" placeholder="Senha" id="password" name="customer['PASS']" required>
        </div>
        <div class="form-group col-md-3">
            <label for="campo3">Confirmar Senha</label>
            <input class="form-control" type="password" placeholder="Confirme Senha" id="confirm_password" required>
        </div>
    </div>
    <div id="actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
    </div>
</form>
<!--    <script type="text/javascript">
        var password = document.getElementById("password"), confirm_password = document.getElementById("confirm_password");
        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Senhas diferentes!");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>-->

<?php include(FOOTER_TEMPLATE); ?>