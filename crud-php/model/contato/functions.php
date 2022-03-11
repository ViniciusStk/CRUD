<?php

require_once('../../config.php');
require_once(DBAPI);

$contatos = null;
$contato = null;

/**
 * listagem de Pessoas
 */
function indexContato($idPessoa = null) {
    global $contatos;
    $contatos = find('contato', $idPessoa, 'idPessoa');
}

/**
 * Cadastro de Pessoas
 * @return void
 */
function addContato() {

    if (!empty($_POST['contato'])) {

        $contato = $_POST['contato'];

        save('contatos', $contato);
        header('location: ../../view/pessoas/index.php');
    }
}

function editContato() {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['contato'])) {

            $contato = $_POST['contato'];

            update('contatos', $id, $contato);
            header('location: ../../view/pessoas/index.php');
        } else {

            global $contato;
            $contato = find('contatos', $id);
        }
    } else {
        header('location: ../../view/pessoas/index.php');
    }
}

function deleteContato($id = null) {

    global $contato;
    $contato = remove('contatos', $id);

    header('location: ../../view/pessoas/index.php');
}