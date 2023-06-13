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
      padding: 20px;
      text-align: center;
    }
    
    h1 {
      margin: 0;
    }
    
 
    
    h2 {
      margin: 0;
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
        margin-right: 20px;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1>Portal de Notícias</h1>

    <a href="noticias.php">Noticias</a>
    <a href="index.php">Home</a>
    <a href="../php/cadastronoticia.php">Cadastrar Noticias</a>
      <div class="admin">
        <a href="../php/loginadm.php">Login</a>
      </div>
  </header>
  <footer>
    &copy; 2023 Portal de Notícias. Todos os direitos reservados.
  </footer>
</body>
</html>
