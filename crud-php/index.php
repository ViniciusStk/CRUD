<?php require_once 'config.php'; ?>
<?php require_once DBAPI; ?>

<!-- Importa o header -->
<?php include(HEADER_TEMPLATE); ?>
<?php include('view/utilitarios/modal.php'); ?>
<?php $db = open_database(); ?>

<h1>Dashboard</h1>
<hr />

<?php if ($db) :?>

<div class="row">
    <!-- btn add pessoas -->
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="view/pessoas/add.php" class="btn btn-primary">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-plus fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Adicionar Pessoa</p>
                </div>
            </div>
        </a>
    </div>
    <!-- btn consulta pessoas -->
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="view/pessoas/index.php" class="btn btn-default">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-12 text-center">
                    <p>Pessoas</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php else :?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
    </div>

<?php endif; ?>
    <!-- Importa o header -->
<?php include(FOOTER_TEMPLATE); ?>