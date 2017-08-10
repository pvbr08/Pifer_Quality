<?php

require_once('../config.php');
require_once(DBAPI);
$customers = null;
$customer = null;
/**
 *  Listagem de Clientes
 */
function index($colunas, $table, $complemento, $where = null) {
    global $customers;
    $customers = find_all($colunas, $table, $complemento,  $where);
}
function add() {
    if (!empty($_POST['customer'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $customer = $_POST['customer'];
        $customer['modified'] = $customer['created'] = $today->format("Y-m-d H:i:s");
        save('customers', $customer);
        header('location: index.php');
    }
}
function edit($colunas,  $table = null) {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['usuarios'])) {
                $customer = $_POST['usuarios'];
                $customer['modified'] = $now->format("Y-m-d H:i:s");
                if ($_POST['pass_nova'] == $_POST['confirm_pass_nova']){
                    update('usuarios', $id, $customer);
                    header('location: index.php');
                }
                else{
                    echo "Usuário não confirmado";
                }
        } else {
            global $customer;
            $customer = find($colunas, $table, '', ' WHERE ID = '.$id);
        } 
    } else {
        
        header('location: index.php');
        
    }
}
function update($table = null, $id = 0, $data = null) {
    $database = open_database();
    $items = null;
    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }
    $items = rtrim($items, ',');
    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id=" . $id . ";";
    try {
        $database->query($sql);
        $_SESSION['message'] = 'Registro atualizado com sucesso.';
        $_SESSION['type'] = 'success';
    } catch (Exception $e) { 
        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
    } 
    close_database($database);
}
function view($colunas, $table, $complemento = null,  $where) {
    global $customer;
    $customer = find($colunas, $table, $complemento,  $where);
}
function delete($id = null) {
  global $customer;
  $customer = remove('customers', $id);
  header('location: index.php');
}
function remove( $table = null, $id = null ) {
    $database = open_database();
	
    try {
        if ($id) {
            $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
            $result = $database->query($sql);
            if ($result = $database->query($sql)) {   	
                $_SESSION['message'] = "Registro Removido com Sucesso.";
                $_SESSION['type'] = 'success';
            }
        }
    } catch (Exception $e) { 
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
}