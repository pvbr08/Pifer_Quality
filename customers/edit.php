<?php 
  require_once('function.php'); 
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Cliente</h2>
    <style type="text/css">
        .ui-group-buttons .or{position:relative;float:left;width:.3em;height:1.3em;z-index:3;font-size:12px}
        .ui-group-buttons .or:before{position:absolute;top:50%;left:50%;content:'or';background-color:#5a5a5a;margin-top:-.1em;margin-left:-.9em;width:1.8em;height:1.8em;line-height:1.55;color:#fff;font-style:normal;font-weight:400;text-align:center;border-radius:500px;-webkit-box-shadow:0 0 0 1px rgba(0,0,0,0.1);box-shadow:0 0 0 1px rgba(0,0,0,0.1);-webkit-box-sizing:border-box;-moz-box-sizing:border-box;-ms-box-sizing:border-box;box-sizing:border-box}
        .ui-group-buttons .or:after{position:absolute;top:0;left:0;content:' ';width:.3em;height:2.84em;background-color:rgba(0,0,0,0);border-top:.6em solid #5a5a5a;border-bottom:.6em solid #5a5a5a}
        .ui-group-buttons .or.or-lg{height:1.3em;font-size:16px}
        .ui-group-buttons .or.or-lg:after{height:2.85em}
        .ui-group-buttons .or.or-sm{height:1em}
        .ui-group-buttons .or.or-sm:after{height:2.5em}
        .ui-group-buttons .or.or-xs{height:.25em}
        .ui-group-buttons .or.or-xs:after{height:1.84em;z-index:-1000}
        .ui-group-buttons{display:inline-block;vertical-align:middle}
        .ui-group-buttons:after{content:".";display:block;height:0;clear:both;visibility:hidden}
        .ui-group-buttons .btn{float:left;border-radius:0}
        .ui-group-buttons .btn:first-child{margin-left:0;border-top-left-radius:.25em;border-bottom-left-radius:.25em;padding-right:15px}
        .ui-group-buttons .btn:last-child{border-top-right-radius:.25em;border-bottom-right-radius:.25em;padding-left:15px}
    </style>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
    <hr />
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name">Login</label>
            <input type="text" class="form-control" name="customer['name']" value="<?php echo $customer['name']; ?>">
        </div>
    
        <div class="form-group col-md-4">
            <label for="senha">Senha</label>
            <input type="text" class="form-control" name="customer['name']" value="<?php echo $customer['name']; ?>">
        </div>
        <div class="form-group col-md-7">
            <label for="Confirmar_senha">Confirmar Senha</label>
            <input type="text" class="form-control" name="customer['name']" value="<?php echo $customer['name']; ?>">
        </div>
<!--        <div class="form-group col-md-7">
            <label for="status">Status: </label>
            <div class="ui-group-buttons">
                <a class="btn btn-success" role="button"><span class="glyphicon glyphicon-ok"></span> Ativar</a>
                <div class="or"></div>
                <a class="btn btn-default" role="button"><span class="glyphicon glyphicon-remove"></span> Desativar</a>
            </div>
        </div>-->
    </div>
    	
    
            
</form>

    <?php include(FOOTER_TEMPLATE); ?>