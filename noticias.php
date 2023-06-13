<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Portal de Notícias</title>
  <style>
    /* Estilos gerais */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    
    /* Estilos do cabeçalho */
    header {
      background-color: #333;
      color: #fff;
      padding: 40px;
      text-align: center;
    }
    
    h1 {
      margin: 0;
    }
    
    /* Estilos do conteúdo */
    main {
      margin: 20px;
    }
    
    .noticia {
      margin-bottom: 20px;
      padding: 10px;
      background-color: #f1f1f1;
    }
    
    h2 {
      margin: 0;
    }
    
    p {
      margin: 10px 0;
    }
    
    .data {
      font-size: 0.8em;
      color: #888;
    }
    
    /* Estilos do rodapé */
    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    a{
        text-decoration: none;
        color: white;
        float: left;
        margin-right: 30px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        cursor: pointer;
    }
  </style>

</head>

<?php
require_once'../php/conexao.php';
$sql="SELECT * FROM noticias";

$resultado = mysqli_query($conexao,$sql);



?>
<body>
  <header>
    <h1>Portal de Notícias</h1>

    <a href="noticias.php">Noticias</a>
    <a href="index.php">Home</a>
    <a href="../php/cadastronoticia.php">Cadastrar Noticias</a>
  </header>
  
  <main>
    <?php
        while($linha= mysqli_fetch_assoc($resultado)){?>
            <div class="noticia">
                <h2><?php echo $linha['titulo'] ?> </h2>
                <p><?php echo $linha['resumo'] ?></p>
                <img src="../php/<?php echo $linha['imagem'] ?>">
            </div>
        <?php } ?> 
    
  </main>
  
  <footer>
    &copy; 2023 Portal de Notícias. Todos os direitos reservados.
  </footer>
</body>
</html>