<?php
include_once 'classes/autoload.php';

Login::checkAuth();

//Verifica se veio tudo preenchido do formulário
if (isset($_GET['id']) && $_GET['id'] != "") {

    $compra = new Assinatura();
    $compra->setId($_GET['id']);
    

    $compraDao = new CompraDao();
    $compraDao->delete($compra);
    
    header( "Refresh:5; url=compra-lista.php", true, 303);
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

<h2> Deletado com sucesso!</h2>
</body>
</html>
