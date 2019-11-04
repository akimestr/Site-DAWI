<?php 
include_once 'classes/autoload.php';

Login::checkAuth();

$produtoDao = new ProdutoDao();
$lista = $produtoDao->select();
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

<h2>Produtos:</h2>
<p>Lista dos produtos do sistema:</p>
<button type="button" onclick="window.location='produto-cadastra.php'">Novo produto</button>
<table>
  <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Mês</th>
    <th>Descrição</th>
    <th>Imagem</th>
    <th>Ações</th>
  </tr>

    <?php foreach($lista as $produt): ?>
    <tr>
        <td><?php echo $produt->getId(); ?></td>
        <td><?php echo $produt->getProduto(); ?></td>
        <td><?php echo $produt->getMes(); ?></td>
        <td><?php echo $produt->getDescricao(); ?></td>
        <td><?php echo $produt->getImagem(); ?></td>
        <td>
            <button type="button" onclick="window.location='produto-edita.php?id=<?php echo $produt->getId(); ?>';"> Editar </button>
            <button type="button" onclick="confirm('Deseja exclir este registro?') ? window.location='produto-deleta-ok.php?id=<?php echo $produt->getId(); ?>' : stop = false;">Deletar</button>
        </td>
    </tr>
    <?php endforeach; ?> 
</table>

</body>
</html>