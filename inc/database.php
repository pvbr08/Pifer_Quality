<?php
    mysqli_report(MYSQLI_REPORT_STRICT);
    
    function open_database() {
	try {
            $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            return $conn;
	} catch (Exception $e) {
            echo $e->getMessage();
            return null;
	}
    }
    function close_database($conn) {
	try {
            mysqli_close($conn);
	} catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    function find_all($colunas, $table, $complemento, $where = NULL) {
        return find($colunas, $table, $complemento, $where);
    }

    function find($colunas,  $table = null, $complemento = null, $where = NULL) {

        $database = open_database();
        $found = null;
        try {
            if ($where) {
                $sql = "SELECT $colunas FROM " . $table . $complemento . $where;
                $result = $database->query($sql);
                echo $sql;
                if ($result->num_rows > 0) {
                    $found = $result->fetch_assoc();
                }
            } else {
                $sql = "SELECT $colunas FROM " . $table . $complemento;
                $result = $database->query($sql);
                echo $sql;
                if ($result->num_rows > 0) {
                    $found = $result->fetch_all(MYSQLI_ASSOC);
                }
            }
        } catch (Exception $e) {
            $_SESSION['message'] = $e->GetMessage();
            $_SESSION['type'] = 'danger';
        }
    close_database($database);
    return $found;
    }
    function save($table = null, $colunas = null, $values = null) {
        $database = open_database();
        $sql = "INSERT INTO $table ($colunas) VALUES ($values)";
        try {
            $database->query($sql);
            $_SESSION['message'] = 'Registro cadastrado com sucesso.';
            $_SESSION['type'] = 'success';
        } catch (Exception $e) { 
            $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
            $_SESSION['type'] = 'danger';
        } 
    close_database($database);
}
