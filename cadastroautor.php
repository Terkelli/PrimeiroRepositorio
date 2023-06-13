<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="../css/cadastrar.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="nomesite">
            <h1>CADASTRAR AUTOR</h1>
        </div>
        <div class="logo">
            <img src="../img/joystick.png" alt="">
        </div>
    </header>
    <main>
        <form action="" method="post" enctype="multipart/form-data"><!-- Enctype é para ler arquivos do pc -->
  
            <!-- Nome da noticia -->
            <label for="nomeautor">Nome do autor:</label>
            <input type="text" name="nomeautor" id="nomeautor">
            <!-- Titulo principal da noticia -->
            <label for="sobrenomeautor">Sobrenome do autor:</label>
            <input type="text" name="sobrenomeautor" id="sobrenomeautor">
            <!-- Conteudo da noticia -->
            <label for="telefoneautor">Telefone:</label>
            <input type="text" name="telefoneautor" id="telefoneautor">
            <!-- Email do autor -->
            <label for="emailautor">Email:</label>
            <input type="text" name="emailautor" id="emailautor">
            <!-- Autor -->

            

            <button type="submit" name="btn">Cadastrar</button>
        </form>
    </main>
</body>

</html>
<?php
if(isset($_POST['btn'])){
    /* Captura de dados */
    $nome = $_POST['nomeautor'];
    $sobrenome = $_POST['sobrenomeautor'];
    $telefone = $_POST['telefoneautor'];
    $email = $_POST['emailautor'];
    /* Abertura de banco */
    include_once 'conexao.php';
    /* Inserção no banco */
    $sql = "INSERT INTO autor (nome, sobrenome, email, telefone) VALUES ('$nome', '$sobrenome', '$telefone', '$email')";
    $resultado = $conexao->query($sql);
}
?>