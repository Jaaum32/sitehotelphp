<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">ADM MODE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="lista_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_acom.php">Acomodações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list_tarifas.php">Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_reservas.php">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Nova tarifa</h3>


        <!-- <?php if (@$message) : ?>

            <div class="toast fade show align-items-center text-bg-warning border-0 mx-auto my-3" role="alert" aria-live="polite" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= @$message ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        <?php endif; ?> -->

        <form action="../controller/controller.tar.php" method="POST">
            <input type="hidden" name="action" value="cadastrar">
            <input type="hidden" name="id" value="<?= @$tarifa->id ?>">

            <div>
                <label>Preço</label>
                <input required type="number" name="preco" value="<?= @$tarifa->preco ?>" class="form-control">
            </div>

            <div>
                <label>Preço adicional de criança</label>
                <input required type="number" name="precoC" value="<?= @$tarifa->precoC ?>" class="form-control">
            </div>

            <div>
                <label>Preço adicional de adulto</label>
                <input required type="number" name="precoA" value="<?= @$tarifa->precoA ?>" class="form-control">
            </div>


            <div>
                <button class="btn btn-success mt-3" type="submit">Salvar</button>
                <a href="../view_adm/list_tarifas.php" class="btn btn-light mt-3 ms-1">Cancelar</a>
            </div>

        </form>
    </div>
</body>

</html>