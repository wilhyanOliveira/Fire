<?php 

$json = file_get_contents("http://192.168.0.106/trabalhoweb/json/APIUsuarios.php");	// Check in your php.ini so allow_url_fopen is set to on.
$obj = json_decode($json);

$conexao=mysqli_connect("localhost","root","","fire");
include ("conexao.php");

if (json_last_error() == 0) {
    //echo '- Nao houve erro! O parsing foi perfeito';
}
else {
    echo 'OCORREU UM ERRO!</br>';
	switch (json_last_error()) {

        case JSON_ERROR_DEPTH:
            echo ' - profundidade maxima excedida';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Erro de sintaxe genérico';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Caracter de controle encontrado';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Erro de sintaxe! String JSON mal-formatado!';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Erro na codificação UTF-8';
        break;
        default:
            echo ' – Erro desconhecido';
        break;
    }
}

if (count($obj)>0)
{
	$i=0;

	while ($i<count($obj))
	{
        $obj[$i]->nome;
        $obj[$i]->senha;
        $obj[$i]->email;

        $SQL = "Insert into usuario (nome,senha,email) values ('".$obj[$i]->nome."','".$obj[$i]->senha."','".$obj[$i]->email."')";
        mysqli_query($conexao,$SQL)or print($SQL);
		$i++;
	}
echo $i;
}
else
{
	echo "Json Vazio ou com Problema";
}


?> 