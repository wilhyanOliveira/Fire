<?php
$conexao=mysqli_connect("localhost","root","","fire");
if ($conexao->connect_errno) 
{
	echo "Falha na MySQL: (" . $conexao->connect_errno . ") " . $conexao->connect_error;
}
?>