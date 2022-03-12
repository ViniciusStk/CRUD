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
        // -------------- AJUSTAR -------------------
        // NÃO ESTA RETORNANDO A VIEW PESSOA CORRETAMENTE
        header("location: " . $_SERVER['HTTP_REFERER']);
        // -------------- AJUSTAR -------------------
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