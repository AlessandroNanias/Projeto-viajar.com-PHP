<?php
    session_start();
    include_once('config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['password']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        header('Location: login.php');
    }
    $sql = "SELECT *,TRUNCATE((rotas.distancia/veiculos.autonomia),2) AS total_litros, TRUNCATE(((rotas.distancia/veiculos.autonomia)*veiculos.preco_comb),2) AS total_gasto FROM rotas INNER JOIN veiculos ORDER BY veiculos.modelo DESC";

    $result = $conexao->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>VIAJAR.COM</title>
    <style>
        body{
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            color: white;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DE TRAJETOS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
            <a href="inicio.php" class="btn btn-danger me-5">Voltar</a>
        </div>
    </nav>
    </br>
   <h1>Trajetos</h1>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">Modelo</th>
                    <th scope="col">Cidade Origem</th>
                    <th scope="col">Cidade Destino</th>
                    <th scope="col">Distancia (KM)</th>
                    <th scope="col">Total de Litros(l)</th> <!--Consumo por Litro / Distancia em Km -->
                    <th scope="col">Gasto total(R$)</th> <!--Preço do combustivel * Total de Litros -->

                </tr>
            </thead>
            <tbody>
                <?php
                    while($veiculo_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$veiculo_data['modelo']."</td>";
                        echo "<td>".$veiculo_data['cidade_origem']."</td>";
                        echo "<td>".$veiculo_data['cidade_destino']."</td>";
                        echo "<td>".$veiculo_data['distancia']."</td>";
                        echo "<td>".$veiculo_data['total_litros']."</td>";
                        echo "<td>".$veiculo_data['total_gasto']."</td>";
                        
                        echo "</tr>";
                            }
                    ?>
            </tbody>
        </table>
    </div>
</body>

</html>