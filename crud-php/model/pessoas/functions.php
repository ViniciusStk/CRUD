<?php

require_once('../../config.php');
require_once(DBAPI);

$pessoas = null;
$pessoa = null;

/**
 * listagem de Pessoas
 */
function index() {
    global $pessoas;
    $pessoas = find_all('pessoas');
}

/**
 * Cadastro de Pessoas
 * @return void
 */
function add() {

    if (!empty($_POST['pessoa'])) {

        $pessoa = $_POST['pessoa'];

        save('pessoas', $pessoa);
        header('location: ../../view/pessoas/index.php');
    }
}

function edit() {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['pessoa'])) {

            $customer = $_POST['pessoa'];

            update('pessoas', $id, $customer);
            header('location: ../../view/pessoas/index.php');
        } else {

            global $pessoa;
            $pessoa = find('pessoas', $id)['found'];
        }
    } else {
        header('location: ../../view/pessoas/index.php');
    }
}

function view ($id) {
    global $pessoa;
    $pessoa = find('pessoas', $id)['found'];
}

function delete($id = null) {

    global $pessoa;
    //remove os contatos antes de remover a pessoa, caso remova como sucesso, então remove a pessoa
    if(remove("contato", $id, "idPessoa")){
        $pessoa = remove('pessoas', $id);
    }

    header('location: ../../view/pessoas/index.php');
}