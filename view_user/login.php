<?php
    session_start();
    echo $_SESSION['id'];
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
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1 class="gradient">Hoteloso</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">O Hotel</a></li>
            <li><a href="faleconosco.php">Fale Conosco</a></li>
            <li><a href="reserva.php" id="this">Reserva</a></li>
            <li><a href="acomodacoes.php">Acomodações</a></li>
        </ul>
    </nav>

    <aside>
        <img src="./imagens/lorem-ipson.png" alt="" class="parcerias">
    </aside>

    <main>
        <form action="../controller/controller.user.php?action=login" method="POST">
            <fieldset title="">
                <legend>Login</legend>

                <label for="">E-mail</label>
                <input type="email" name="email" id="" placeholder="juca@provedor.com">

                <label for="">Senha</label>
                <input type="password" name="pass" id="" placeholder="12345678">
            </fieldset>

            <input type="submit" name="" id="button" value="Fazer login">
        
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