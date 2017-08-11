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
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">Go!</button>
                    </span>
                </div><!-- /input-group -->

            </div><!-- /.col-lg-6 -->
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <?php 
                        require_once('function.php');
                        find('ID, NOME, CNPJ_CPF, ATIVO', 'PESSOAS', '', '');
                    ?>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width="auto">Permissao</th>
                                <th>Status</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($permission) : ?>
                                <?php foreach ($permission as $permissao) : ?>
                                <tr class="<?php if($permissao['ATIVO']){echo "success";}else{ echo "danger";} ?>">
                                        <td><?php echo $permissao['ID']; ?></td>
                                        <td><?php echo $permissao['DESCRICAO']; ?></td>
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

                </div>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>