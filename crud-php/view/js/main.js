/**
 * Confirma se realmente quer excluir
 * @param id - id do objeto a ser excluido
 */
function confirmExclusaoPessoa(id) {
    if(confirm("Tem certeza que deseja excluir?")){
        location.href='../pessoas/delete.php?id=' + id;
    }
}

/**
 * Confirma se realmente quer excluir
 * @param id - id do objeto a ser excluido
 */
function confirmExclusaoContato(id , idPessoa) {
    if(confirm("Tem certeza que deseja excluir?")){
        location.href='../contato/delete.php?id=' + id + '&idPessoa=' + idPessoa;
    }
}