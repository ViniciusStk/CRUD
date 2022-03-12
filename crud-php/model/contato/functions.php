<?php

require_once('../../config.php');
require_once(DBAPI);

$contatos = null;
$contato = null;

/**
 * Função utilizada para o carregamento das telas, colocando os resultados do find em variavel global
 * para depois ser utilizada em view
 *
 * @param $idPessoa - utilizado para montar o where na tabela contato
 * @return void
 */
function indexContato($idPessoa = null) {
    global $contatos;
    $contatos = find('contato', $idPessoa, 'idPessoa');

    // ajusta o $contatos de acordo com o necessário, para ser utilizado na view com foreach
    if($contatos['rows'] == 1){
        $contatos = [$contatos['found']];
    } else {
        $contatos = $contatos['found'];
    }
}

/**
 * Cadastro de Contato
 * @return void
 */
function addContato() {
    if (!empty($_POST['contato'])) {
        $contato = $_POST['contato'];
        save('contato', $contato);
        header("location: ../../view/pessoas/view.php?id=" . $_GET['id']);
    }
}

/**
 * Função utilizada para editar um contato
 * @return void
 */
function editContato() {

    if (isset($_GET['idContato'])) {
        $id = $_GET['idContato'];

        if (isset($_POST['contato'])) {

            $contato = $_POST['contato'];

            update('contato', $id, $contato);
            header('location: ../../view/pessoas/view.php?id=' . $_GET['id']);
        } else {

            global $contato;
            $contato = find('contato', $id)['found'];
        }
    } else {
        header('location: ../../view/pessoas/view.php?id=' . $_GET['id']);
    }
}

function deleteContato($id = null) {

    global $contato;
    $contato = remove('contato', $id);

    header('location: ../../view/pessoas/index.php');
}