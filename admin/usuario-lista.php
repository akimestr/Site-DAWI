<?php 
include_once 'classes/autoload.php';

Login::checkAuth();

$usuarioDao = new UsuarioDao();
$lista = $usuarioDao->select();
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

<h2>Administradores:</h2>
<p>Lista dos administradores do sistema:</p>
<button type="button" onclick="window.location='usuario-cadastra.php'">Novo administrador</button>
<table>
  <tr>
    <th>ID</th>
    <th>Nome</th>
    <th>E-mail</th>
    <th>Ações</th>
  </tr>

    <?php foreach($lista as $usario): ?>
    <tr>
        <td><?php echo $usario->getId(); ?></td>
        <td><?php echo $usario->getNome(); ?></td>
        <td><?php echo $usario->getEmail(); ?></td>
        <td>
            <button type="button" onclick="window.location='usuario-edita.php?id=<?php echo $usario->getId(); ?>';"> Editar </button>
            <button type="button" onclick="confirm('Deseja exclir este registro?') ? window.location='usuario-deleta-ok.php?id=<?php echo $usario->getId(); ?>' : stop = false;">Deletar</button>
        </td>
    </tr>
    <?php endforeach; ?> 
</table>

</body>
</html>