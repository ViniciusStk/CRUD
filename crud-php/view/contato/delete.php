<?php
require_once('../../model/contato/functions.php');

if (isset($_GET['id'])){
    deleteContato($_GET['id'], $_GET['idPessoa']);
} else {
    die("ERRO: ID não definido.");
}
?>