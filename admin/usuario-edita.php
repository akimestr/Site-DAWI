<?php
include_once 'classes/autoload.php';

//Verifica se veio tudo preenchido do formulário
if (isset($_GET['id']) && $_GET['id'] != "") {

    $usuario = new Usuario();
    $usuario->setId($_GET['id']);

    $usuarioDao = new UsuarioDao();
    $userData = $usuarioDao->selectById($usuario);
    
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
        <h2> Editar conta de Administrador:</h2>
        <div class="areaform">
            <form action="usuario-edita-ok.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $userData->getId(); ?>" >

                <label for="nome">Nome:</label>
                <input value="<?php echo $userData->getNome(); ?>" type="text" name="nome" placeholder="Insira seu nome"  required="true">

                <label for="Senha">Senha:</label>
                <input type="password" value="<?php echo $userData->getSenha(); ?>" placeholder="Senha" name="senha" required="true">

                <label for="Senha">Confirmar senha:</label>
                 <input type="password" value="<?php echo $userData->getSenha(); ?>" placeholder="Confirmar" name="confirmar" required="true">

                <label for="email">E-mail:</label>
                <input value="<?php echo $userData->getEmail(); ?>" type="email" name="email" placeholder="Insira seu e-mail">

             <button class="button" type="submit"> Confirmar</button>
            </form>
        </div>
     </section>
</body>
</html>