<?php
include_once 'classes/autoload.php';

Login::checkAuth();

//Verifica se veio tudo preenchido do formulário
if (isset($_POST['nome']) && $_POST['nome'] != "" 
        && isset($_POST['senha']) && $_POST['senha'] != ""
        && isset($_POST['email']) && $_POST['email'] != ""
        && isset($_POST['telefone']) && $_POST['telefone'] != "") {

    $cliente = new Cliente();
    $cliente->setId($_POST['id']);
    $cliente->setNome($_POST['nome']);
    $cliente->setSenha($_POST['senha']);
    $cliente->setEmail($_POST['email']);
    $cliente->setEmail($_POST['telefone']);

    $clienteDao = new ClienteDao();
    $clienteDao->update($cliente);
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