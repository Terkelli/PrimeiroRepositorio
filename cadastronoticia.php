<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

header {
  background-color: #f2f2f2;
  padding: 20px;
}

.nomesite h1 {
  margin: 0;
  font-size: 24px;
}


form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-top: 10px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 5px;
  margin-top: 5px;
}

select {
  width: 100%;
  padding: 5px;
  margin-top: 5px;
}

button[type="submit"] {
  margin-top: 10px;
  padding: 10px 20px;
  background-color: #4caf50;
  color: white;
  border: none;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}


.message {
  margin-top: 10px;
  padding: 10px;
  color: white;
  font-weight: bold;
}

.error {
  background-color: #f44336;
}

.success {
  background-color: #4caf50;
}
    </style>
</head>

<body>
    <header>
        <div class="nomesite">
            <h1>CADASTRAR NOTÍCIA</h1>
        </div>
    </header>
    <main>
        <form action="" method="post" enctype="multipart/form-data">


            <label for="img">Inserir imagem</label>
            <input type="file" name="dir-img" id="" required><!-- Inserir a img -->

    
            <label for="nomenoticia">Nome da notícia:</label>
            <input type="text" name="nomenoticia" id="nomenoticia" required>
            
            <label for="manchete">Manchete da notícia:</label>
            <input type="text" name="manchete" id="manchete" required>
         
            <label for="conteudo">Conteúdo da notícia:</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required></textarea>
            
            <select name="autor" id="autor" required>
                <?php
                include_once 'conexao.php';
                $sql = "SELECT * FROM autor";
                $resultado = mysqli_query($conexao, $sql);

                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<option value='$linha[idautor]'>$linha[nome]</option>";
                }
                ?>
            </select>

            <button type="submit" name="btn">Cadastrar</button>
        </form>
    </main>
</body>

</html>
<?php
/* Somente executa o php quando o botão for clicado */
if (isset($_POST["btn"])) {
    /* Variável que armazena o nome do arquivo de imagem */
    $img = $_FILES["dir-img"]["name"]; /* Mt importante colocar o camo de name, para especificar que é para capturar o nome do arquivo */
    /* Nome da noticia */
    $Title = $_POST['nomenoticia'];
    /* Titulo da noticia */
    $Resume = $_POST['manchete'];
    /* Conteudo da noticia */
    $Description = $_POST['conteudo'];
    /* Autor da noticia */
    $AuthorID = $_POST['autor'];


    /* Verificação da extensão do arquivo */
    $fototype = pathinfo($img, PATHINFO_EXTENSION);

    /* Permite que apenas imagens sejam enviadas */
    if ($fototype != "jpg" && $fototype && "jpeg" && $fototype != "png" && $fototype != "webp") {
        echo 'Extensão de arquivo não suportada!';

    } else {

        /* Direcionar os arquivos para uma pasta */
        $pasta = 'img/';

        /* Verfica se o arquivo existe */
        if (!file_exists($pasta)) {

            /* mkdir = Make Diretory */
            mkdir($pasta);
        } /* Fecha sem else */

        /* Função para gerar nomes unicos para as fotos */
        $uniquename = uniqid();
        /* Concatena o nome da img com o diretório */
        $diretorio = $pasta . $uniquename . "." . $fototype;

        /* Upload do arquivo para a pasta que foi criada. TMP_NAME = Pega a foto dos arquivos temporários. Depois manda pro diretório informado. */
        move_uploaded_file($_FILES["dir-img"]['tmp_name'], $diretorio);
        require_once('conexao.php');
        $sql = "INSERT INTO noticias (titulo, resumo, descricao, imagem, idautor) VALUES ('$Title','$Resume','$Description','$diretorio','$AuthorID')";

        if (mysqli_query($conexao, $sql)) {
            echo 'Cadastrado com sucesso';
            header('Location: ../html/adm.html');
        } else {
            echo 'Erro ao cadastrar a imagem';
        }
        mysqli_close($conexao);
    }
}
?>