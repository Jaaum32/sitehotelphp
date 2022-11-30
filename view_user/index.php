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
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <header>
        <h1 class="gradient">Hoteloso</h1>

        <?php if($_SESSION['id'] == null): ?>
            <ul>
                <li><a href="login.php">Logar</a></li>
                <li><a href="signup.php">Cadastrar</a></li>
            </ul>
        <?php endif; ?>
        <?php if($_SESSION['id'] !== null): ?>
            <p>Olá, <?= $_SESSION['nome'] ?></p> 
        <?php endif; ?>
    </header>

    <nav>
        <ul>
            <li><a href="index.php" id="this">O Hotel</a></li>
            <li><a href="faleconosco.php">Fale Conosco</a></li>
            <li><a href="reserva.php">Reserva</a></li>
            <li><a href="acomodacoes.php">Acomodações</a></li>
        </ul>
    </nav>

    <aside>
        <img src="./imagens/lorem-ipson.png" alt="" class="parcerias">
    </aside>

    <main>
        <img src="https://images.pexels.com/photos/7906997/pexels-photo-7906997.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            alt="">

        <article>
            <h2>Conheça o Hoteloso</h2>
            <p>Hotel com localização privilegiada próximo aoaeroporto pertinho das principais pontos turísticos da
                cidade e
                que proporciona a você uma ótima estada, seja a trabalho ou a passeio. Além disso, vários detalhes poder
                ser
                destacados, como Agência de viagens no hotel e a tradição na qualidade de atendimento e conforto,
                fazendo do
                Hoteleco um dos hotéis mais aconchegantes em Medianeira no Paraná.</p>
        </article>

        <article>
            <h2>Bem vindo a Medianeira</h2>
            <p>O turista que procura por <b>uma cidade acolhedora</b>, com ótimas opções rurais para relaxar, não irá se
                arrepender
                de colocar Medianeira no roteiro de viagens. Culinária, sotaque e costumes guardam ainda a história,
                remetendo aos descendentes de alemães e italianos que migraram do sul para a região.</p>
            <p>Localizada no Oeste do Paraná, a cidade faz fronteira com os municípios de <i>Serranópolis do Iguaçu,
                Matelândia, São Miguel do Iguaçu e Missal</i>. A economia de Medianeira é pautada pela indústria, <u>prestação
                de
                serviços</u> e ><u>produção agropecuária</u>. De acordo com o IBGE, sua população estimada é de 45.812 habitantes.
            </p>
            <p>O nome da cidade tem origem rreligiosa, sendo uma homenagem dos piorneiros a Nossa Senhora Medianeira de
                Todas as graças.O munícipio carrega o título de Portal d do Mercosul devido a sua localização
                priviligiada,
                com rodovias que dão acesso a capitalCuritiba, aos estados de Santa Catarina, Rio Grande do Sul e Mato
                Grosso, além dos países vizinhos Paraguai e Argentina.</p>
            <p>Seja na cidade ou no campo. Medianeira proporciona ao turista momentos de <b>cultura, descontração e lazer</b>.
                Aproveite os espaços públicos e não perca os passeios do Turismo Rural, onde será possível vivenciar a
                vida
                no campo e saborear os deliciosos cafés.</p>
        </article>


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