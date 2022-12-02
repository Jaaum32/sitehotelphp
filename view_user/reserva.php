<?php
    @session_start();
    //header('location: ../controller/controller.acom.php?action=procurar');
    //require_once("../controller/controller.acom.php");
    date_default_timezone_set("America/Sao_Paulo");
    $d=strtotime("tomorrow");
    $amanha = date("Y-m-d", $d);
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


<script>
        function zeroFill(n) {
            return n < 9 ? `0${n}` : `${n}`;
        }

        function formatDate(date) {
            const d = zeroFill(date.getDate());
            const mo = zeroFill(date.getMonth() + 1);
            const y = zeroFill(date.getFullYear());

            return `${y}-${mo}-${d}`;;
        }

        function alterarDataMinina(){
            var dataEntrada = document.getElementById("data_inicio");
            var dataSaida = document.getElementById("data_saida");
            var data = new Date(dataEntrada.value);
            data.setDate(data.getDate() + 2);

            dataSaida.min = formatDate(data);

            if(dataEntrada.value >= dataSaida.value){
                dataSaida.value = formatDate(data);

                //dataSaida.value = dataEntrada.value;
            }
        }

        function bloquearData(){
            var dataEntrada = document.getElementById("data_inicio");
            var dataSaida = document.getElementById("data_saida");

            var data = new Date(dataEntrada.value);

            if(dataEntrada.value >= dataSaida.value){
                data.setDate(data.getDate() + 2);
                dataSaida.value = formatDate(data);

                //dataSaida.value = dataEntrada.value;
            }
        }
        
</script>

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
                <li><a href="../controller/controller.user.php?action=logout">Sair</a></li>
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
        <div class="reserva">
        <form action="../controller/controller.acom.php?action=procurar" method="POST">
            <fieldset title="">

                <legend>Data da Reserva</legend>
                <label for="">Data de entrada</label>
                <input type="date" name="data_entrada" id="data_inicio" onchange="alterarDataMinina()" min="<?= date("Y-m-d")?>" value="<?= (@$_REQUEST['data_entrada'])? @$_REQUEST['data_entrada']: date("Y-m-d") ?>">

                <label for="">Data de saída</label>
                <input type="date" name="data_saida" id="data_saida" onchange="bloquearData()" min="" value="<?= (@$_REQUEST['data_saida'])? @$_REQUEST['data_saida']: $amanha ?>">

                <label for="">Adultos</label>
                <input type="number" name="num_adultos" id="" min="1" max="4" value="<?= (@$_REQUEST['num_adultos'])? @$_REQUEST['num_adultos']: 1 ?>">

                <label for="">Crianças</label>
                <input type="number" name="num_criancas" id="" min="0" max="4" value="<?= (@$_REQUEST['num_criancas'])? @$_REQUEST['num_criancas'] : 0 ?>">

                <label for="">Acomodações</label>
                <select name="tipo" id="" >
                    <option value="Standard">Standart</option>
                    <option value="Luxo">Luxo</option>
                    <option value="Todos" selected>Todos</option>
                </select>


            </fieldset>
            <input type="submit" name="" id="button" value="Buscar">
        
        </form>
        <div>
            <h4>Acomodações encontradas</h4>
            <!-- comentario -->
            <?php if(empty($acoms)): ?>
                <div class = "nulo">
                    <p>Nenhuma acomodação encontrada dentro do que foi pedido!</p>
                </div>
            <?php else: ?>
                <?php foreach($acoms as $index => $acom): ?>
                    <div class="card">
                        <?php if(@$acom->tipo == "Standard"): ?>
                            <img src="../imagens/bed.jpg" alt="" class="">
                        <?php else: ?>
                            <img src="../imagens/bed-lux.jpg" alt="" class="">
                        <?php endif; ?> 
                        <ul>
                            <li>
                                <p><?= @$acom->tipo ?></p>
                                
                            </li>
                            <li>
                                <p><?= @$acom->subtipo ?></p>
                                
                            </li>
                            <li>
                                <?php if(@$acom->qtd_casal !== 0): ?>
                                    <p><?= @$acom->qtd_casal ?> cama(s) de casal</p>
                                <?php endif; ?>  
                            </li>
                            <li>
                                <?php if(@$acom->qtd_solt !== 0): ?>
                                    <p><?= @$acom->qtd_solt ?> cama(s) de solteiro</p>
                                <?php endif; ?>  
                            </li>
                        </ul>
                        <form action="../controller/controller.res.php?action=reservar&qtd_adultos=<?= @$_REQUEST['num_adultos']?>&qtd_criancas=<?= @$_REQUEST['num_criancas']?>&entrada=<?= @$_REQUEST['data_entrada']?>&saida=<?= @$_REQUEST['data_saida']?>" method="post">
                            <input type="hidden" name="acom_id" value="<?= $acom->id ?>">
                            <input type="hidden" name="id_tarifa" value="<?= @$acom->id_tarifa ?>">
                            <input type="submit" value="Reservar">
                        </form>
                        
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        </div>
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
