<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script language="JavaScript" src='validacoesjs/validações.js'></script>
    <title>login</title>
</head>
<body>
<div class= "main-login">
        <div class= "left-login">
            <img src="chama.png" class="left-login-image" alt="logo_chama">
            <h1>Vem para o Fire!</h1>
        </div>
        <div class= "rigth-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form >
                <div class= "textFild">
                    <label for="usuario">Usuario</label>
                    <input type="text"name="usuario" placeholder= "Usuário" required value='<?=$RS["usuario"];?>'>
                <div class= "textFild">
                    <label for="senha">Senha</label>
                    <input type="password"name="senha" placeholder= "Senha" requided value='<?=$RS["senha"];?>'>
                </div>
                </div>
                <div class="full-box">
                        <input type="submit" id="btn-submit" value="Login" onclick="validar();" >
                </div>
                <!--<button class= "btn-login">Login</button> -->
                <h2><a href="registrese.php">REGISTRE-SE </h2>
            </div>
        </div>
    </form>
    </div>

<?php 
    $conexao=mysqli_connect("localhost","root","","fire");
    include ("conexao.php");

    $usuario = $_REQUEST['usuario'];
    $senha   = $_REQUEST['senha'];


    //$conexao = mysqli_connect()->prepare("SELECT * FROM usuario WHERE email ='$usuario'");
    $resultado = mysqli_query($conexao,"SELECT * FROM usuario WHERE email ='$usuario'") or false;

    if($resultado != false){
        if(count($resultado->fetch_all()) >0)
        echo ("window.Alert('Usuario ja cadastrado')");
    }

?>        

</body>
</html>