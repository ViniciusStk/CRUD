<?php
require_once('../../model/contato/functions.php');
editContato();
?>

<?php $idPessoa = (!empty($_GET['id']) ? $_GET['id'] : ''); ?>
<?php include(HEADER_TEMPLATE); ?>

    <h2>Atualizar Contato</h2>

    <form action="edit.php?idContato=<?php echo $contato['id'] . "&id=" . $idPessoa; ?>" method="post">
        <hr />
        <div class="row">
            <div class="form-group col-md-3">
                <label for="name">TIPO</label>
                <select class="form-control" name="contato['tipo']">
                    <option value="<?php echo $contato['tipo']; ?>" selected><?php echo $contato['tipo']; ?></option>
                    <option value="TEL" >TEL</option>
                    <option value="EMAIL">EMAIL</option>
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">DESCRIÇÃO</label>
                <input type="text" class="form-control" name="contato['descricao']" value="<?php echo $contato['descricao']; ?>">
            </div>
        </div>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="../pessoas/view.php?id=<?php echo $idPessoa; ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>