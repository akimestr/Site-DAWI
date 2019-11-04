<?php
include_once 'classes/autoload.php';

Login::checkAuth();

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['produto']) && $_POST['produto'] != "" 
        && isset($_POST['mes']) && $_POST['mes'] != ""
        && isset($_POST['descricao']) && $_POST['descricao'] != ""){

    $produto = new Produto();
    $produto->setId($_POST['id']);
    $produto->setProduto($_POST['produto']);
    $produto->setMes($_POST['mes']);
    $produto->setDescricao($_POST['descricao']);

    $produtoDao = new ProdutoDao();
    $produtoDao->update($produto);
}
?>


<html>
<head>
    <title>MkBox</title>
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

<h2> Alterações feitas com sucesso!</h2>
</body>
</html>