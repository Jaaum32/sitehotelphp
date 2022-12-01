<?php
    session_start();
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
    <link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
    <header>
        <h1 class="gradient">Hoteloso</h1>
        
        <?php if(empty($_SESSION)): ?>
            <ul>
                <li><a href="login.php">Logar</a></li>
                <li><a href="signup.php">Cadastrar</a></li>
            </ul>
        <?php endif; ?>
        <?php if(empty($_SESSION) !== true): ?>
            <ul>
                <li><p>Olá, <?= $_SESSION['nome'] ?></p></li>
                <li><a href="../controller/controller.user.php?action=logout">Sair</a></li>
            </ul>
        <?php endif; ?>
    </header>

    <nav>
        <ul>
            <li><a href="../view_user/index.php">O Hotel</a></li>
            <li><a href="../view_user/faleconosco.php" id="this">Fale Conosco</a></li>
            <li><a href="../view_user/reserva.php">Reserva</a></li>
            <li><a href="../view_user/acomodacoes.php">Acomodações</a></li>
        </ul>
    </nav>

    <aside>
        <img src="../imagens/lorem-ipson.png" alt="" class="parcerias">
    </aside>

    <main>
        <form action="POST" >
            <label for="">Assunto</label>
            <input type="text">
            <br>
            <br>

            <label for="">Email</label>
            <input type="email">
            <br>
            <br>

            <label for="">Celular</label>
            <input type="tel" name="" id="">
            <br>
            <br>

            <label for="">Mensagem</label>
            <textarea name="" id="" cols="30" rows="7"></textarea>
            <br>
            <br>
             
            <input type="submit" name="" id="button">
        </form>
    </main>


    <footer>
        <hr>
        <p>Hoteloso - 2021</p>
        <address>Av.João de Barro, 123 - Medianeira - PR</address>

        
        <p><img src="https://icons.iconarchive.com/icons/martz90/circle/512/whatsapp-icon.png" alt="" width="20" height="20">(46)99907-6111</p>
        
        <p><img src="https://icons.iconarchive.com/icons/graphicloads/100-flat/256/email-2-icon.png" alt="" width="20" height="20">contato@Hoteloso.com.br</p>
    </footer>
</body>
</html>