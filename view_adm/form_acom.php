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
                        <a class="nav-link" aria-current="page"
                            href="../controller/controller.user.php?view=../view_adm/list_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../view_adm/list_acom.php">Acomodações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view_adm/list_tarifas.php">Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view_adm/list_reservas.php">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Nova acomodação</h3>

        <form action="../controller/controller.acom.php" method="POST">
            <input type="hidden" name="action" value="cadastrar">
            <input type="hidden" name="id" value="<?=@$acomodacao->id ?>">


            <div>
                <label>Qtd Camas Casal</label>
                <input required type="number" name="qtd_casal" class="form-control"
                    value="<?=@$acomodacao->qtd_casal ?>">
            </div>

            <div>
                <label>Qtd Camas Solteiro</label>
                <input required type="number" name="qtd_solt" class="form-control"
                    value="<?=@$acomodacao->qtd_solt ?>">
            </div>

            <div>
                <label>Tipo</label>
                <select class="form-select" name="id_tarifa" aria-label="Default select example">
                    <optgroup label="Standard">
                        <option <?=(@$acomodacao->id_tarifa==1) ? 'selected' : '' ?> value="1">S-Duplo</option>
                        <option <?=(@$acomodacao->id_tarifa==2) ? 'selected' : '' ?> value="2">S-Triplo</option>
                        <option <?=(@$acomodacao->id_tarifa==3) ? 'selected' : '' ?> value="3">S-Família</option>
                    </optgroup>
                    <optgroup label="Luxo">
                        <option <?=(@$acomodacao->id_tarifa==4) ? 'selected' : '' ?> value="4">L-Duplo</option>
                        <option <?=(@$acomodacao->id_tarifa==5) ? 'selected' : '' ?> value="5">L-Triplo</option>
                        <option <?=(@$acomodacao->id_tarifa==6) ? 'selected' : '' ?> value="6">L-Família</option>
                    </optgroup>
                </select>

            </div>

            <div>
                <button class="btn btn-success mt-3" type="submit">Salvar</button>
                <a href="../view_adm/list_acom.php" class="btn btn-light mt-3 ms-1">Cancelar</a>
            </div>

        </form>
    </div>
</body>

</html>