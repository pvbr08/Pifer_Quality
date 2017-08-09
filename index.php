<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<?php include(HEADER_TEMPLATE); ?>
<br>
<?php if (open_database()) : ?>
    <?php include(CONTENT_TEMPLATE); ?>

<?php else : ?>
	<div class="alert alert-danger" role="alert">
            <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
	</div>

<?php endif; ?>

<?php include(FOOTER_TEMPLATE); ?>