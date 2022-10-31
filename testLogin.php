<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['login']) && !empty($_POST['password']))
    {
        // Acessa
        include_once('config.php');
        $login = $_POST['login'];
        $password = $_POST['password'];

        // print_r('login: ' . $login);
        // print_r('<br>');
        // print_r('password: ' . $password);

        $sql = "SELECT * FROM usuários WHERE login = '$login' and password = '$password'";

        $result = $conexao->query($sql);

        // print_r($sql);
        // print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            header('Location: index.php');
        }
        else
        {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            header('Location: inicio.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: index.php');
    }
?>