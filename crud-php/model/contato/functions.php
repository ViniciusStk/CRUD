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
        save('contato', $contato);
        header("location: ../../view/pessoas/index.php?id=$idPessoa");
    }
}

function editContato() {

    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        if (isset($_POST['contato'])) {

            $contato = $_POST['contato'];

            update('contato', $id, $contato);
            header('location: ../../view/pessoas/index.php');
        } else {

            global $contato;
            $contato = find('contato', $id);
        }
    } else {
        header('location: ../../view/pessoas/index.php');
    }
}

function deleteContato($id = null) {

    global $contato;
    $contato = remove('contato', $id);

    header('location: ../../view/pessoas/index.php');
}