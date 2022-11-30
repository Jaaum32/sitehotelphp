<?php
  require_once('../controller/controller.user.php');
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
            <a class="nav-link active" aria-current="page" href="#">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_acom.php">Acomodações</a>
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

  <div>
    <!-- <?php if (@$message): ?>
          <div class="alert alert-info w-50 mx-auto">
              <?=@$message ?>
          </div>
      <?php endif; ?> -->

    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th colspan="5">
            <h3>Usuários</h3>
          </th>
          <!-- <th><a href="" class="btn btn-dark">Adicionar</a></th> -->
        </tr>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Login</th>
          <th>Email</th>
          <th>Telefone</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $index => $user): ?>
              <tr>
                  <td><?= $user->id ?></td>
                  <td><?= $user->nome ?></td>
                  <td><?= $user->perfil ?></td>
                  <td><?= $user->email ?></td>
                  <td><?= $user->telefone ?></td>
                  <td><a class="btn btn-sm btn-secondary" href="../controller/controller.user.php?action=delete&id=<?= $user->id ?>"><i class="bi bi-trash"></i></a></td>
              </tr>
            <?php endforeach; ?> 
      </tbody>
    </table>
  </div>

</body>

</html>