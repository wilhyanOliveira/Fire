<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estoque.css">
    <title>Estoque</title>
</head>
<body>
<?php include("new_menu.html");?>

<div class="full-box">
        <a href="cadastro_produtos.php">
            <input type="submit" id="btn-submit" value="Cadastrar" >
        </a>
    </div>
    <div class="full-box">
        <a href="cadastro_clientes.php">
            <input type="submit" id="btn-submit" value="Alterar" >
        </a>
    </div>

<table>
<tr><th>CÓDIGO</th><th>REFERENCIA</th><th>TIPO</th><th>DESCRICAO</th><th>PREÇO</th><th>CUSTO</th><th>UN</th></tr>
<!--<tr><td>Codigo</td><td>Nome</td><td>CPF</td><td>RG</td><td>FONE</td><td>EMAIL</td><td>MUNICIPIO</td><td>UF</td><td>RUA</td><td>NÚMERO</td> -->


    <?php 
        $conexao=mysqli_connect("localhost","root","","fire");
        include ("conexao.php");
        $id = $_REQUEST["id"];
        $referencia = $_REQUEST["referencia"];
        $tipo_item = $_REQUEST["tipo_item"];
        $descricao = $_REQUEST["descricao"];
        $valor_venda = $_REQUEST["valor_venda"];
        $valor_compra = $_REQUEST["valor_compra"];
        $un_medida = $_REQUEST["unidade_medida"];

    $SQL = "select * from estoque";
    $RSS = mysqli_query($conexao,$SQL);
    while($RS = mysqli_fetch_array($RSS))
    {
    echo "<tr><td onclick='carrega(".$RS["id"].");' onmousemove='style=".chr(34)."cursor: pointer;".chr(34)."' >".$RS["id"].
    "</td><td>".$RS["referencia"]."</td><td>".$RS["tipo_item"]."</td><td>".$RS["descricao"]."</td><td>".$RS["valor_venda"]."</td><td>".$RS["valor_compra"].
    "</td><td>".$RS["unidade_medida"]."</td> </tr>";
    }
    ?>
</body>
</html>