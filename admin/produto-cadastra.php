<?php
include_once 'classes/autoload.php';

Login::checkAuth();
?>

<html>
    <head><title> MkBox </title>
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
        <link rel="sortcut icon" href="assets/img/icon.ico" type="image/x-icon"/>
        <meta charset="utf-8">
    </head>
    
<body>

    <!-- MENU --> 
<hr> 
Navegação do sistema:
<button type="button" onclick="window.location='produto-lista.php'">Produtos</button>
<button type="button" onclick="window.location='cliente-lista.php'">Clientes</button>
<button type="button" onclick="window.location='compra-lista.php'">Encomendas</button>
<button type="button" onclick="window.location='assinatura-lista.php'">Assinaturas</button>
<button type="button" onclick="window.location='usuario-lista.php'">Administradores</button>
<hr>

    
 <!-- FALE CONOSCO -->
    <section id="contato">
        <h2> Cadastro de produto:</h2>
        <div class="areaform">
            <form action="produto-cadastra-ok.php" method="POST" enctype="multipart/form-data">

                <label for="produto">Produto:</label>
                <input placeholder="Produto" name="produto" required="true">

                <label for="mes">Mês:</label>
                <input type="text" placeholder="Mês" name="mes" required="true">

                <label for="descricao">Descrição:</label>
                <input placeholder="Descrição" name="descricao" required="true">

                <label for="imagem">Imagem:</label>
                <input type="file" placeholder="Imagem" name="imagem" required="true">

             <button class="button" type="submit">Confirmar</button>
            </form>
        </div>
     </section>
</body>
</html>