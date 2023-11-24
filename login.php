<?php
session_start();

include_once('ligar.php');

$username = $_POST['username'];
$senha = $_POST['senha'];

// Hash da senha usando md5()
$hashedSenha = md5($senha);

$query = mysqli_query($conectar, "SELECT * FROM usuario WHERE username ='$username' AND senha ='$hashedSenha' LIMIT 1");
$result = mysqli_fetch_assoc($query);

if (empty($result)) {
    $_SESSION["erro"] = "Usuário ou senha inválido";
    header("Location: index.php");
} else {
    $_SESSION["id"] = $result['id'];
    $_SESSION["username"] = $result['username'];
    $_SESSION["senha"] = $result['senha'];
    header("Location: principal.php");
}
?>
