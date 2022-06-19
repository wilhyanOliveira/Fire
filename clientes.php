<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/clientes.css">
    <title>clientes</title>
</head>
<body>
<?php include("menu.html");?>
    <div class="full-box">
        <a href="cadastro_clientes.php">
            <input type="submit" id="btn-submit" value="Cadastrar" >
        </a>
    </div>
    <div class="full-box">
        <a href="cadastro_clientes.php">
            <input type="submit" id="btn-submit" value="Alterar" >
        </a>
    </div>
<table>
<tr><th>Código</th><th>Nome</th><th>CPF</th><th>RG</th><th>FONE</th><th>EMAIL</th><th>MUNICIPIO</th><th>UF</th><th>RUA</th><th>NÚMERO</th></tr>
<!--<tr><td>Codigo</td><td>Nome</td><td>CPF</td><td>RG</td><td>FONE</td><td>EMAIL</td><td>MUNICIPIO</td><td>UF</td><td>RUA</td><td>NÚMERO</td> -->

<?PHP

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
$numero_rua = $_REQUEST["tipo_rua"];
$tipo_rua = $_REQUEST["tipo_rua"];
$cep = $_REQUEST["cep"];
$complemento = $_REQUEST["complmento"];
$obs = $_REQUEST["observacao"];

$SQL = "select * from clientes";
$RSS = mysqli_query($conexao,$SQL);
while($RS = mysqli_fetch_array($RSS))
{
echo "<tr><td onclick='carrega(".$RS["id"].");' onmousemove='style=".chr(34)."cursor: pointer;".chr(34)."' >".$RS["id"].
"</td><td>".$RS["nome"]."</td><td>".$RS["cpf"]."</td><td>".$RS["rg"]."</td><td>".$RS["telefone"]."</td><td>".$RS["email"].
"</td><td>".$RS["municipio"]."</td><td>".$RS["estado"]."</td><td>".$RS["rua"]."</td><td>".$RS["numero_rua"]."</td> </tr>";
}
?>
</table>

 <script>
 </script>
</body>.
</html>