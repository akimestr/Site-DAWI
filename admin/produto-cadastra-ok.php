<?php
include_once 'classes/autoload.php';

Login::checkAuth();

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['produto']) && $_POST['produto'] != "" 
        && isset($_POST['mes']) && $_POST['mes'] != ""
        && isset($_POST['descricao']) && $_POST['descricao'] != "") {

    $nomeimagem = $_FILES["imagem"]["name"];
    $nometemporario = $_FILES["imagem"]["tmp_name"];
    $diretorio = "imagem/".$nomeimagem;

    if(move_uploaded_file($nometemporario,$diretorio))
            echo "imagem enviada";
        else
            echo "imagem não enviada";

    $produto = new Produto();
    $produto->setProduto($_POST['produto']);
    $produto->setMes($_POST['mes']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setImagem($nomeimagem);

    $produtoDao = new ProdutoDao();
    $produtoDao->insert($produto);
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

<h2> Produto cadastrado com sucesso!</h2>
</body>
</html>