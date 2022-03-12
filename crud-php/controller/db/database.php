<?php

mysqli_report(MYSQLI_REPORT_STRICT);

/**
 * função para abrir a sessão do banco
 *
 * @return mysqli|null
 */
function open_database() {
    try {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return $conn;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}

/**
 * função para fechar a sessão do banco
 *
 * @param $conn - conexão a ser fechada
 * @return void
 */
function close_database($conn) {
    try {
        $conn->close();
//        mysqli_stmt_close($conn);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * Function capaz de fazer um find no banco,
 * se for inserido $id, será where por id,
 * caso contrário retornará a tabela completa.
 *
 * @param $table - tabela a ser feito o find
 * @param $id - id do item na tabela
 * @return array|false|mixed|null
 */
function find($table = null, $id = null, $where = "id" ) {

    $database = open_database();
    $found = null;
    try {
        if ($id) {
            $sql = " SELECT * FROM " . $table . " WHERE " . $where . " = " . $id;
            $result = $database->query($sql);

            if($result->num_rows == 1 ) {
                $found = $result->fetch_assoc();
            } else {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }
        } else {

            $sql = " SELECT * FROM " . $table;
            $result = $database->query($sql);

            if ($result->num_rows > 0) {
                $found = $result->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->GetMessage();
        $_SESSION['type'] = 'danger';
    }
    close_database($database);
    return ['found'=>$found, 'rows'=>$result->num_rows];
}

/**
 * Pesquisa todos os registros da tabela
 * (alias para o find)
 *
 * @param $table - tabela a ser pesquisada
 * @return array|false|mixed|null
 */
function find_all( $table ) {
    return find($table)['found'];
}

/**
 * Insere um registro no BD
 *
 * @param $table - tabela a ser inserida
 * @param $data - Os dados a serem inseridos
 * @return void
 */
function save($table = null, $data = null) {

    $database = open_database();

    $columns = null;
    $values = null;

    foreach ($data as $key => $value) {
        $columns .= trim($key, "'") . ",";
        $values .= "'$value',";
    }

    // remove a ultima virgula
    $columns = rtrim($columns, ',');
    $values = rtrim($values, ',');

    $sql = "INSERT INTO " . $table . "($columns)" . " VALUES " . "($values);";

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

/**
 * @param $table
 * @param $id
 * @param $data
 * @return void
 */
function update($table = null, $id = 0, $data = null) {

    $database = open_database();

    $items = null;

    foreach ($data as $key => $value) {
        $items .= trim($key, "'") . "='$value',";
    }

    // remove a ultima virgula
    $items = rtrim($items, ',');

    $sql  = "UPDATE " . $table;
    $sql .= " SET $items";
    $sql .= " WHERE id= " . $id . ";";

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

/**
 *  Remove uma linha de uma tabela pelo ID do registro
 */
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
