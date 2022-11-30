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
        
        <?php if(empty($_SESSION)): ?>
            <ul>
                <li><a href="login.php">Logar</a></li>
                <li><a href="signup.php">Cadastrar</a></li>
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
        <form>
            <fieldset title="">
                <legend>Responsável</legend>
                <label>Nome</label>
                <input type="text" placeholder="Fulano de tal">

                <label for="">E-mail</label>
                <input type="email" name="" id="" placeholder="fulano@provedor.com">

                <label for="">Telefone</label>
                <input type="tel" name="" id="" placeholder="(xx) xxxxx-xxxx">
            </fieldset>

            <fieldset title="">

                <legend>Data da Reserva</legend>
                <label for="">Data de entrada</label>
                <input type="date" name="" id="">

                <label for="">Data de saída</label>
                <input type="date" name="" id="">

                <label for="">Adultos</label>
                <input type="number" name="" id="" min="1" max="4" value="1">

                <label for="">Crianças</label>
                <input type="number" name="" id="" min="0" max="4" value="0">

                <label for="">Acomodações</label>
                <select name="acomodações" id="">
                    <option value="std">Standart</option>
                    <option value="lux">Luxo</option>
                </select>


            </fieldset>
            <input type="submit" name="" id="button" value="Reservar">
        
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