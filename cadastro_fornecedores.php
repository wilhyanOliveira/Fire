<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de fornecedores</title>
</head>
<body>

   <div class="container">

<div class="form-left">

<div class="input-group">

    <div class="input-box">
        <label for="id">ID</label>
        <input type="text" name="id" id="id" placeholder="id" value='<?=$RS["id"];?>'>
    </div>

    <div class="input-box">
        <label for="CPF">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu cpf" required value='<?=$RS["cpf"];?>'>
    </div>

    <div class="input-box">
        <label for="nome">NOME</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" required value='<?=$RS["nome"];?>'>
    </div>

    <div class="input-box">
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" placeholder="Informe o seu RG" value='<?=$RS["rg"];?>'>
    </div>

    <div class="input-box">
        <label for="email">E-MAIL</label>
        <input type="text" name="email" id="email" placeholder="email" value='<?=$RS["email"];?>'>
    </div>
    
    <div class="input-box">
        <label for="fone">TELEFONE</label>
        <input type="fone" name="fone" id="fone" placeholder="(**) *********" value='<?=$RS["telefone"];?>'>
    </div>

    <div class="input-box">
        <label for="obs">OBSERVAÇÃO</label>
        <input type="text" name="obs" id="obs" placeholder="obs" value='<?=$RS["observacao"];?>'>
    </div>
</div>

</div>
<div class="form-rigth">

<div class="input-group">

    <div class="input-box">
        <label for="municipio">MUNICIPIO</label>
        <input type="text" name="municipio" id="municipio" placeholder="municipio" <?=$RS["municipio"];?>>
    </div>

    <div class="input-box">
        <label for="uf">UF</label>
        <input type="text" name="uf" id="uf" placeholder="uf" <?=$RS["uf"];?>>
    </div>

    <div class="input-box">
        <label for="rua">RUA</label>
        <input type="text" name="rua" id="rua" placeholder="rua" <?=$RS["rua"];?>>
    </div>

    <div class="input-box">
        <label for="numero">Nº</label>
        <input type="text" name="numero" id="numero" placeholder="Nº" <?=$RS["numero_rua"];?>>
    </div>

    <div class="input-box">
        <label for="tipo">TIPO</label>
        <input type="text" name="tipo" id="tipo" placeholder="tipo" <?=$RS["tipo_rua"];?>>
    </div>

    <div class="input-box">
        <label for="uf">CEP</label>
        <input type="text" name="cep" id="cep" placeholder="cep" <?=$RS["cep"];?>>
    </div>

    <div class="input-box">
        <label for="complemento">COMPLEMENTO</label>
        <input type="text" name="complemento" id="complemento" placeholder="complemento" <?=$RS["complemento"];?>>
    </div>
</div>

</div>

</div>
<?php 
        $conexao=mysqli_connect("localhost","root","","fire");
        include ("conexao.php");
        $id	= $_REQUEST["id"];
        $nome = $_REQUEST["nome"];
        $cpf = $_REQUEST["cpf"];
        $cnpj = $_REQUEST["cnpj"];
        $rg = $_REQUEST["rg"];
        $ie = $_REQUEST["ie"];
        $telefone = $_REQUEST["telefone"];
        $email = $_REQUEST["email"];
        $municipio = $_REQUEST["municipio"];
        $estado = $_REQUEST["estado"];
        $rua = $_REQUEST["rua"];
        $numero_rua = $_REQUEST["numero_rua"];
        $tipo_rua = $_REQUEST["tipo_rua"];
        $cep = $_REQUEST["cep"];
        $complemento = $_REQUEST["complmento"];
        $obs = $_REQUEST["observacao"];

        $SQL = "Insert into fornecedores (nome,cpf,ie,telefone,email,municipio,estado,rua,numero_rua,tipo_rua,cep,complemento,observacao) values ('$nome','$cpf','$ie','$telefone','$email','$municipio','$estado','$rua','$numero_rua','$tipo_rua','$cep','$complemento','$obs')";
        mysqli_query($conexao,$SQL)or print($SQL);
    
        ?>

</body>
</html>