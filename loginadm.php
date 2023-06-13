<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="../css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador</title>
    <style>
        /* login.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

form {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 16px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

#aviso {
    color: red;
    text-align: center;
    margin-top: 20px;
}

    </style>
</head>

<body>
    <form action="" method="post">
        <h1>Entrada Para Administradores</h1>
        <h2>Por favor, digite suas credenciais</h2>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome de usuário:">
        <input type="text" name="email" id="email" placeholder="Digite seu email:">
        <input type="password" name="password" id="password" placeholder="Digite sua senha:">
       <button type="submit" id="btn" name="btn">Entrar</button>
    </form>
</body>

</html>
<?php
if (isset($_POST['btn']) && !empty($_POST['nome']) && !empty($_POST['password'])) {
    //acesso ao banco de dados
    include_once('../php/conexao.php');


    $password = $_POST['password'];
    $nome = $_POST['nome'];
    // print_r("Nome: $nome Senha: $senha");

    $sql = "SELECT * FROM admin WHERE nome= '$nome' and senha = '$password'";

    $resultado = $conexao->query($sql);
    // print_r($resultado);
    if (mysqli_num_rows($resultado) < 1) {
        echo "<p id='aviso'>Credenciais incorretas! Tente novamente</p>";
    } else {
        header('Location: ../html/adm.html'); /* Te redireciona para uma nova página */;
    }
}
?>