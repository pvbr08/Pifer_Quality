<?php 

    require_once('function.php'); 
    add('USUARIOS', ' FK_PESSOA, FK_PERMISSAO, LOGIN, PASS, ATIVO, DT_LAST_ACCESS ');
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Novo Usuário</h2>

    <form action="add.php" method="post">
    
        <hr />
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Login</label>
                <input type="text" class="form-control" name="LOGIN">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Password</label>
                <input type="password" class="form-control" name="PASS">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Confirmar Senha</label>
                <input type="password" class="form-control" name="CONFIRM_PASS">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Pessoa relacionada</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="txt_pessoa" placeholder="Search for..." value="<?php if(isset($_GET['pessoa'])){echo $_GET['pessoa'];}else{echo NULL;}?>" d>
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#modal_pessoas">Go!</button>
                    </span>
                </div><!-- /input-group -->
        </div>
        <div class="modal fade bs-example-modal-lg" id="modal_pessoas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <?php 
                        require_once('function.php');
                        index('ID, NOME, CNPJ_CPF, ATIVO', 'PESSOAS', '', '');
                    ?>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width="auto">Nome</th>
                                    <th>CNPJ/CPF</th>
                                    <th>Status</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($usuarios) : ?>
                                    <?php foreach ($usuarios as $users) : ?>
                                    <tr class="<?php if($users['ATIVO']){echo "success";}else{ echo "danger";} ?>">
                                            <td><?php echo $users['ID']; ?></td>
                                            <td><?php echo $users['NOME']; ?></td>
                                            <td><?php echo $users['CNPJ_CPF']; ?></td>
                                            <td><?php if ($users['ATIVO']){echo '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';}else{echo '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';} ?></td>
                                            <td class="actions text-right">
                                                <a href="add.php?pessoa=<?php echo $users['NOME']; ?>" data-target="#txt_pessoa" data-customer="<?php echo $users['ID']; ?>">
                                                    Send! 
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
                </div>
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