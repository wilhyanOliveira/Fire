<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro_produtos.css">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <script>
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
        ?>
    </script>
<div class="container">

    <div class="form-left">

    <div class="input-group">

    <div class="input-box">
        <label for="id">ID</label>
        <input type="text" name="id" id="id" placeholder="id" value='<?=$RS["id"];?>'>
    </div>

    <div class="input-box">
        <label for="referencia">REFERENCIA</label>
        <input type="text" name="referencia" id="referencia" placeholder="Referencia" value='<?=$RS["referencia"];?>'>
    </div>

    <div class="input-box">
        <label for="tipo">TIPO</label>
        <input type="text" name="tipo" id="tipo" placeholder="tipo" required value='<?=$RS["tipo"];?>'>
    </div>

    <div class="input-box">
        <label for="descricao">DESCRIÇÃO</label>
        <input type="text" name="descricao" id="descricao" placeholder="descricao" required value='<?=$RS["descricao"];?>'>
    </div>

    <div class="input-box">
        <label for="valor_venda">PREÇO DE VENDA</label>
        <input type="text" name="valor_venda" id="valor_venda" placeholder="R$0,00" required value='<?=$RS["valor_venda"];?>'>
    </div>
    
    <div class="input-box">
        <label for="valor_compra">PREÇO DE COMPRA</label>
        <input type="text" name="valor_compra" id="valor_compra" placeholder="R$0,00" required value='<?=$RS["valor_compra"];?>'>
    </div>

    <div class="input-box">
        <label for="unidade_medida">UNIDADE DE MEDIDA</label>
        <input type="text" name="unidade_medida" id="unidade_medida" placeholder="UN" required value='<?=$RS["unidade_medida"];?>'>
    </div>
</div>

</div>

</div>
    
</body>
</html>