<?php

require_once('../config.php');
require_once(DBAPI);
$customers = null;
$users = null;
/**
 *  Listagem de Clientes
 */
function index($colunas, $table, $complemento, $where = null) {
    global $usuarios;
    $usuarios = find_all($colunas, $table, $complemento,  $where);
}
function add($table = null, $colunas = null) {
    if (!empty($_POST['usuarios'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $values = $_POST['FK_PESSOA'];
        $values .= $_POST['LOGIN'] . ", MD5('". $_POST['PASS'] . "'), 1, NOW()";
        if ($_POST['PASS'] == $_POST['CONFIRM_PASS']){
            save($table, $colunas, $values);
            header('location: index.php');
        }else{
            echo "Inválido";
        }
    }
}
function edit() {
    $now = date_create('now', new DateTimeZone('America/Sao_Paulo'));
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (isset($_POST['users'])) {
            $user = $_POST['users'];
            update('usuarios', $id, $user);
            header('location: index.php');
        } else {
            global $users;
            $users = find('USUARIOS.ID AS ID, FK_PESSOA, LOGIN, PASS, DT_LAST_ACCESS', 'USUARIOS', '' ,' WHERE ID = ' . $id);
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
    global $users;
    $users = find($colunas, $table, $complemento,  $where);
}
function delete($id = null) {
  global $users;
  $users = remove('customers', $id);
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