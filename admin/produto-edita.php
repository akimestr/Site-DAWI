<?php
include_once 'classes/autoload.php';

//Verifica se veio tudo preenchido do formulário
if (isset($_GET['id']) && $_GET['id'] != "") {

    $produto = new Produto();
    $produto->setId($_GET['id']);

    $produtoDao = new ProdutoDao();
    $produtoData = $produtoDao->selectById($produto);  
}
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
        <h2> Editar Produto:</h2>
        <div class="areaform">
            <form action="produto-edita-ok.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $produtoData->getId(); ?>" >

                <label for="produto">Produto:</label>
                <input value="<?php echo $produtoData->getProduto(); ?>" type="text" name="produto" placeholder="Produto"  required="true">

                <label for="mes">Mês:</label>
                <input value="<?php echo $produtoData->getMes(); ?>" type="text" name="mes" placeholder="Mês"  required="true">

                <label for="descricao">Descrição:</label>
                <input value="<?php echo $produtoData->getDescricao(); ?>" type="text" name="descricao" placeholder="Descrição"  required="true">

             <button class="button" type="submit"> Confirmar</button>
            </form>
        </div>
     </section>
</body>
</html>