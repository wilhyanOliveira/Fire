<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script language="JavaScript" src='validacoesjs/validações.js'></script>
    <link rel="shortcut icon" type="image/x-icon" href="icone.ico">
    <title>login</title>
</head>
<body>
<div class= "main-login">
        <div class= "left-login">
            <img src="chama.png" class="left-login-image" alt="">
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

    session_start();

    //print_r($_REQUEST);
    /*if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        include_once('conexao.php');
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' and senha = '$senha'";

        $result = $conexao->query($sql);

        
        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else{
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            /*header('Location:');
        }
    }
    else
    {
        header('Location:index.php');
    }
*/
?>        

</body>
</html>