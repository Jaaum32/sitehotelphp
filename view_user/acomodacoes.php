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
    <style>
        main img{
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
    </style>
    
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

        <div>
            <ul>
                <li><a href="index.php">O Hotel</a></li>
                <li><a href="faleconosco.php">Fale Conosco</a></li>
                <li><a href="reserva.php">Reserva</a></li>
                <li><a href="acomodacoes.php" id="this">Acomodações</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <h2>Acomodações</h2>
        <h4>Apartamentos Standart</h4>
            <img src="./imagens/bed.jpg" alt="" class="room">
        
        <ul>
            <li>Cama king size</li>
            <li>Banheiro</li>
            <li>Internet sem fio </li>
            <li>Mini bar com com itens personalizados mediante solicitação</li>
            <li>Artigos de higiene pessoal</li>
            <li>TV LED com 40"</li>
        </ul>

        <h4>Apartamentos Luxo</h4>
        <img src="./imagens/bed-lux.jpg" alt="" class="room">
        <ul>
            <li>Cama queen size</li>
            <li>Banheiro com espaço com banheira de hidromassagem</li>
            <li>Internet sem fio</li>
            <li>Mini bar com itens personalizadosmediante solicitação</li>
            <li>Artigos de higiene pessoal de luxo</li>
            <li>TV QLED de 60"</li>
            <li>Aplicativos de Streaming</li>
        </ul>

        <h4>Tarifas</h4>

        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Apartamento</th>
                    <th>Tarifa básica(1 adulto)</th>
                    <th>+1 adulto</th>
                    <th>+1 uma criança</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td rowspan="6">Luxo</td>
                    <td rowspan="2">Duplo</td>
                    <td>150,00</td>
                    <td>50,00</td>
                    <td>15,00</td>
                </tr>
                <tr>
                    <td colspan="5">Uma cama de casal ou 2 camas de solteiro</td>
                </tr>
                <tr>
                    <td rowspan="2">Triplo</td>
                    <td>150,00</td>
                    <td>45,00</td>
                    <td>13,00</td>
                </tr>
                <tr>
                    <td colspan="5">Uma cama de casal + 1 cama de solteiro ou 3 camas de solteiro</td>
                </tr>
                <tr>
                    <td rowspan="2">Família</td>
                    <td>150,00</td>
                    <td>40,00</td>
                    <td>10,00</td>
                </tr>
                <tr>
                    <td colspan="5">2 camas de casal ou 1 cama de casal + 2 camas de solteiro</td>
                </tr>


                <tr>
                    <td rowspan="6">Standart</td>
                    <td rowspan="2">Duplo</td>
                    <td>220,00</td>
                    <td>80,00</td>
                    <td>25,00</td>
                </tr>
                <tr>
                    <td colspan="5">Uma cama de casal ou 2 camas de solteiro</td>
                </tr>
                <tr>
                    <td rowspan="2">Triplo</td>
                    <td>150,00</td>
                    <td>75,00</td>
                    <td>23,00</td>
                </tr>
                <tr>
                    <td colspan="5">Uma cama de casal + 1 cama de solteiro ou 3 camas de solteiro</td>
                </tr>
                <tr>
                    <td rowspan="2">Família</td>
                    <td>150,00</td>
                    <td>70,00</td>
                    <td>20,00</td>
                </tr>
                <tr>
                    <td colspan="5">2 camas de casal ou 1 cama de casal + 2 camas de solteiro</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><b>Observação</b></th>
                    <td colspan="4">Valores de segunda à sexta-feira. Nos finais de semana o valor é acrescido em 10%
                    </td>
                </tr>
            </tfoot>
        </table>
    </main>

    <aside>
        <img class="parcerias" src="./imagens/lorem-ipson.png" alt="">
    </aside>

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