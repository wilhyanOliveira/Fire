<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/datatables.min.js"></script>

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
    <table width='100%'>
<tr><td>Codigo</td><td>Nome</td><td>Endereco</td><td>Cidade</td><td>Email</td><td>CPF</td></tr>

<?PHP
$SQL = "select * from clientes";
$RSS = mysqli_query($conexao,$SQL);
while($RS = mysqli_fetch_array($RSS))
{
echo "<tr><td onclick='carrega(".$RS["id"].");' onmousemove='style=".chr(34)."cursor: pointer;".chr(34)."' >".$RS["id"]."</td><td>".$RS["nome"]."</td><td>".$RS["endereco"]."</td><td>".$RS["cidade"]."</td><td>".$RS["email"]."</td><td>".$RS["cpf"]."</td></tr>";
}
?>
</table>

 <script>
 </script>
</body>
</html>