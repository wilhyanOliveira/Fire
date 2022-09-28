<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="icone.ico">
    <link rel="stylesheet" href="css/registrese.css">
    <script src="validacoesjs/validações.js"></script>
    <title>Refistre-se</title>
</head>
<body>
<div id="main-container">
        <h1>Cadastre-se para acessar o sistema</h1>
        <form id="register-form">
            <div class="half-box">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" value='<?=$RS["email"];?>' required>
            </div>
            <div class="full-box">
                <label for="nome">Nome</label>
                <input type="nome" name="nome" id="nome" placeholder="Digite seu nome" value='<?=$RS["nome"];?>' required>
            </div>
            <div class="full-box">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" value='<?=$RS["senha"];?>' required>
            </div>
            <div class="full-box">
                <input type="submit" id="btn-submit" value="Registrar" onclick="valida_registro()">
            </div>
            <p class="error-validation template"></p>
        </form>
    </div>
    <?php
    $conexao=mysqli_connect("localhost","root","","fire");
    include ("conexao.php");

    $email	= $_REQUEST["email"];
    $nome   = $_REQUEST["nome"];
    $senha  = $_REQUEST["senha"];

    $SQL = "Insert into usuario (senha,email,nome) values ('$senha','$email','$nome')";
	mysqli_query($conexao,$SQL)or print($SQL);

    ?>   
</body>
</html>