<?php
  require_once('../../model/pessoas/functions.php');
  edit();
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Atualizar Pessoa</h2>

    <form action="edit.php?id=<?php echo $pessoa['id']; ?>" method="post">
        <hr />
        <div class="row">
            <div class="form-group col-md-7">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="pessoa['name']" value="<?php echo $pessoa['name']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="campo2">CNPJ</label>
                <input type="text" class="form-control" name="pessoa['cpf']" value="<?php echo $pessoa['cpf']; ?>">
            </div>
        </div>
        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="index.php" class="btn btn-default">Cancelar</a>
            </div>
        </div>
    </form>

<?php include(FOOTER_TEMPLATE); ?>