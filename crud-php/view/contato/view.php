<?php
require_once('../../model/pessoas/functions.php');
require_once('../../model/contato/functions.php');
?>
<table class="table table-hover">
        <h3>Contatos</h3>
        <div class="row">
            <div class="col-md-12 h2">
                <a class="btn btn-primary" href="../contato/add.php?id=<?php echo $pessoa['id']; ?>"><i class="fa fa-plus"></i> Novo Contato</a>
                <a class="btn btn-default" href="../pessoas/view.php?id=<?php echo $pessoa['id']; ?>"><i class="fa fa-refresh"></i> Atualizar</a>
            </div>
        </div>
        <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Tipo</th>
            <th>Descrição</th>
            <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($contatos) : ?>
            <?php foreach ($contatos as $contato) : ?>
                <tr>
                    <td><?php echo $contato['id']; ?></td>
                    <td><?php echo $contato['tipo']; ?></td>
                    <td><?php echo $contato['descricao']; ?></td>
                    <td class="actions text-right">
                        <a href="../contato/edit.php?id=<?php echo $pessoa['id']."&idContato=" . $contato['id']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
                        <a href="#" class="btn btn-sm btn-danger" onclick="confirmExclusaoContato(<?php echo $contato['id']?>, <?php echo $pessoa['id']?>)">
                            <i class="fa fa-trash"></i> Excluir
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>