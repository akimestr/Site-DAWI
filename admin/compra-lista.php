<?php 
include_once 'classes/autoload.php';

Login::checkAuth();

$compraDao = new CompraDao();
$lista = $compraDao->select();
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

<h2>Compras:</h2>
<p>Lista das encomendas do sistema:</p>
<table>
  <tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Endereço</th>
    <th>CEP</th>
  </tr>

    <?php foreach($lista as $comp): ?>
    <tr>
        <td><?php echo $comp->getId(); ?></td>
        <td><?php echo $comp->getIdcliente(); ?></td>
        <td><?php echo $comp->getEndereco(); ?></td>
        <td><?php echo $comp->getCEP(); ?></td>
        <td>
            <button type="button" onclick="confirm('Deseja exclir este registro?') ? window.location='compra-deleta-ok.php?id=<?php echo $comp->getId(); ?>' : stop = false;">Deletar</button>
        </td>
    </tr>
    <?php endforeach; ?> 
</table>

</body>
</html>