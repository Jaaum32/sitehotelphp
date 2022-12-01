<?php
    @session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoteloso</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.1/font/bootstrap-icons.css">
    

    <link rel="stylesheet" href="../estilos/estilos.css">
</head>

<body>
    <header>
        <h1 class="gradient">Hoteloso</h1>
        
        <?php if(empty($_SESSION)): ?>
            <ul>
                <li><a href="../view_user/login.php">Logar</a></li>
                <li><a href="../view_user/signup.php">Cadastrar</a></li>
            </ul>
        <?php endif; ?>
        <?php if(empty($_SESSION) !== true): ?>
            <ul>
                <li><p>Olá, <?= $_SESSION['nome'] ?></p></li>
                <li><a href="../controller.user.php?action=logout">Sair</a></li>
            </ul>
        <?php endif; ?>
    </header>

    <nav>
        <ul>
            <li><a href="../view_user/index.php">O Hotel</a></li>
            <li><a href="../view_user/faleconosco.php">Fale Conosco</a></li>
            <li><a href="../view_user/reserva.php" id="this">Reserva</a></li>
            <li><a href="../view_user/acomodacoes.php">Acomodações</a></li>
        </ul>
    </nav>

    <aside>
        <img src="../imagens/lorem-ipson.png" alt="" class="parcerias">
    </aside>

    <main>

    <?php if (@$message) : ?>
    <div class="alert alert-warning" role="alert">
        <?= @$message ?> 
    </div>  
    
    <?php endif; ?>


        <form action="../controller/controller.user.php" method="post">
            <fieldset title="">
                <legend>Cadastro</legend>
                <input required type="hidden" name="action" value="cadastrar">

                <label for="">Nome</label>
                <input required type="text" name="nome" value="" id="" placeholder="Juca Subjuca">

                <label for="">Perfil</label>
                <input required type="text" name="login" id="" placeholder="Juca02">

                <label for="">E-mail</label>
                <input required type="email" name="email" id="" placeholder="juca@provedor.com">

                <label for="">Senha</label>
                <input required type="password" name="senha" id="" placeholder="12345678">

                <label for="">Confirmar senha</label>
                <input required type="password" name="confirmar_senha" id="" placeholder="12345678">

                <label for="">Telefone</label>
                <input required type="tel" name="telefone" id="" placeholder="(xx) xxxxx-xxxx">
            </fieldset>

            <input type="submit" name="" id="button" value="Fazer cadastro">
        
        </form>
    </main>


    <footer>
        <hr>
        <p>Hoteloso - 2021</p>
        <address>Av.João de Barro, 123 - Medianeira - PR</address>


        <p><img src="https://icons.iconarchive.com/icons/martz90/circle/512/whatsapp-icon.png" alt="" width="20"
                height="20">(46)99907-6111</p>

        <p><img src="https://icons.iconarchive.com/icons/graphicloads/100-flat/256/email-2-icon.png" alt="" width="20"
                height="20">contato@Hoteloso.com.br</p>
    </footer>
</body>

</html>