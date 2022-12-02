<?php
  @require_once('../controller/controller.tar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADM MODE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
</head>

<body>
    <?php if(@$message) : ?>
        <div>
            <?php 
                echo "<script type='text/javascript'>alert('$message');</script>"; 
            ?>
        </div>
    <?php endif; ?>
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
                        <a class="nav-link" aria-current="page" href="../controller/controller.user.php?view=../view_adm/list_users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view_adm/list_acom.php">Acomodações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Tarifas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../view_adm/list_reservas.php">Reservas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div>

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th colspan="4">
                        <h3>Tarifas</h3>
                    </th>
                    <th><a href="../view_adm/form_tarifas.php" class="btn btn-dark">Adicionar</a></th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Preço Padrão</th>
                    <th>Adicional de Criança</th>
                    <th>Adicional de Adulto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tarifas as $index => $tarifa): ?>
                  <tr>
                      <td><?= $tarifa->id ?></td>
                      <td><?= $tarifa->preco ?></td>
                      <td><?= $tarifa->precoC ?></td>
                      <td><?= $tarifa->precoA ?></td>
                      <td>
                          <a class="btn btn-sm btn-secondary" href="../controller/controller.tar.php?action=update&id=<?= $tarifa->id ?>"><i class="bi bi-pencil-square"></i></a>
                          <a class="btn btn-sm btn-secondary" href="../controller/controller.tar.php?action=delete&id=<?= $tarifa->id ?>"><i class="bi bi-trash"></i></a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>