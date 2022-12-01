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
                        <a class="nav-link active" href="#">Acomodações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_tarifas.php">Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_reservas.php">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Nova acomodação</h3>


        <!-- <?php if (@$message) : ?>Site Hotel

            <div class="toast fade show align-items-center text-bg-warning border-0 mx-auto my-3" role="alert" aria-live="polite" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <?= @$message ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>

        <?php endif; ?> -->

        <form action="controller.php" method="GET">
            <input type="hidden" name="action" value="salvar">
            <input type="hidden" name="id" value="">


            <div>
                <label>Qtd Camas Casal</label>
                <input type="number" name="" class="form-control" value="">
            </div>

            <div>
                <label>Qtd Camas Solteiro</label>
                <input type="number" name="" class="form-control" value="">
            </div>

            <div>
                <label>Tipo</label>
                <select class="form-select" aria-label="Default select example">
                    <optgroup label="Standard">
                        <option value="1">S-Duplo</option>
                        <option value="2">S-Triplo</option>
                        <option value="3">S-Família</option>
                    </optgroup>
                    <optgroup label="Luxo">
                        <option value="4">L-Duplo</option>
                        <option value="5">L-Triplo</option>
                        <option value="6">L-Família</option>
                    </optgroup>
                  </select>

            </div>

            <div>
                <button class="btn btn-success mt-3" type="submit">Salvar</button>
                <a href="list_acom.php" class="btn btn-light mt-3 ms-1">Cancelar</a>
            </div>

        </form>
    </div>
</body>

</html>