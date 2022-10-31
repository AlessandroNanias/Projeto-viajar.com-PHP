<?php

    if(isset($_POST['submit']))
    {
        // print_r('cidadeorigem: ' . $_POST['cidadeorigem']);
        // print_r('<br>');
        // print_r('cidadedestino: ' . $_POST['cidadedestino']);
        // print_r('<br>');
        // print_r('distancia: ' . $_POST['distancia']);
        // print_r('<br>');


        include_once('config.php');

        $cidadeorigem = $_POST['cidadeorigem'];
        $cidadedestino = $_POST['cidadedestino'];
        $distancia = $_POST['distancia'];


        $result = mysqli_query($conexao, "INSERT INTO rotas(cidade_origem,cidade_destino,distancia) 
        VALUES ('$cidadeorigem','$cidadedestino','$distancia')");

        header('Location: sistemarotas.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Rotas</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <a href="sistemarotas.php">Voltar</a>
    <div class="box">
        <form action="formulariorota.php" method="POST">
            <fieldset>
                <legend><b>Formulário de rotas</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="cidadeorigem" id="cidadeorigem" class="inputUser" required>
                    <label for="cidadeorigem" class="labelInput">Cidade Origem</label>
                </div>
                <br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidadedestino" id="cidadedestino" class="inputUser" required>
                    <label for="cidadedestino" class="labelInput">Cidade Destino</label>
                </div>
                <br>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="distancia" id="distancia" class="inputUser" required>
                    <label for="distancia" class="labelInput">Distância</label>
                </div>
                <br>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>