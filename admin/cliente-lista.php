<?php 
include_once 'classes/autoload.php';

Login::checkAuth();

$clienteDao = new ClienteDao();
$lista = $clienteDao->select();
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

<h2>Clientes:</h2>
<p>Lista dos clientes cadastrados:</p>
<br/>
<table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Telefone</th>
    <th>Ações</th>
  </tr>

    <?php foreach($lista as $client): ?>
    <tr>
        <td><?php echo $client->getId(); ?></td>
        <td><?php echo $client->getNome(); ?></td>
        <td><?php echo $client->getEmail(); ?></td>
        <td><?php echo $client->getTelefone(); ?></td>
        <td>
            <button type="button" onclick="window.location='cliente-edita.php?id=<?php echo $client->getId(); ?>';"> Editar </button>
            <button type="button" onclick="confirm('Deseja exclir este registro?') ? window.location='cliente-deleta-ok.php?id=<?php echo $client->getId(); ?>' : stop = false;">Remover</button>
        </td>
    </tr>
    <?php endforeach; ?> 
</table>

</body>
</html>