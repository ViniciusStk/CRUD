<?php
require_once('../../model/contato/functions.php');
indexContato();
addContato();
?>
<?php $idPessoa = (!empty($_GET['id']) ? $_GET['id'] : ''); ?>
<?php include(HEADER_TEMPLATE); ?>

    <h2>Novo Contato</h2>

    <form action="add.php" method="post">
        <!-- area de campos do form -->
        <hr />
        <div class="row">
            <div class="form-group col-md-3">
                <label for="name">TIPO</label>
                <select class="form-control" name="contato['tipo']">
                    <option value="TEL" selected>TEL</option>
                    <option value="EMAIL">EMAIL</option>
                </select>
            </div>

            <div class="form-group col-md-7">
                <label for="campo2">Descrição</label>
                <input type="text" class="form-control" name="contato['descricao']">
            </div>
        </div>
            <div class="form-group">
                <input type="text" class="form-control invisible" name="contato['idPessoa']" value="<?php echo $idPessoa; ?>">
            </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="../pessoas/view.php?id=<?php echo $idPessoa; ?>" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>