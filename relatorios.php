<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorios</title>
</head>
<body>
<?php
include ("conexao.php");
include("munu.html");

$rnome   = $_REQUEST["rnome"];
$rfone   = $_REQUEST["rfone"];
$remail  = $_REQUEST["remail"];
$saida   = $_REQUEST["saida"];
$tipo    = $_REQUEST["tipo"];

If (strlen($saida) == 0) { $saida = "HTML"; }
If (strlen($tipo) == 0) { $tipo = "Nomes"; }

$saidas  = "<select name='saida' id='saida' >";
$saidas .= "<option value='$saida'>$saida</option>";
$saidas .= "<option value='HTML'>HTML</option>";
$saidas .= "<option value='DOC'>DOC</option>";
$saidas .= "<option value='XLS'>XLS</option>";
$saidas .= "<option value='PDF'>PDF</option>";
$saidas .= "<option value='IMP'>IMP</option>";
$saidas .= "</select>";

$tipos  = "<select name='tipo' id='tipo' s>";
$tipos .= "<option value='$tipo'>$tipo</option>";
$tipos .= "<option value='Nomes'>Nomes</option>";
$tipos .= "<option value='Contatos'>Contatos</option>";
$tipos .= "<option value='Cidades'>Cidades</option>";
$tipos .= "<option value='Produtos'>Produtos</option>";
$tipos .= "</select>";

$html1  = "<html><head><title>AULA</title></head><body>";

$html2 = "<fieldset><Legend>Restri��es do relatorio</legend>";
$html2 .= "<table>";
$html2 .= "<form name='aa' action='relatorio.php' method='post'>";
$html2 .= "<tr><td>Nome</td><td>Email</td><td>Fone</td><td>Saida</td><td>Tipo</td></tr>";
$html2 .= "    <td><input type='text' name='rnome' id='rnome' value='$rnome'></td>";
$html2 .= "    <td><input type='text' name='remail' id='remail' value='$remail'></td>";
$html2 .= "    <td><input type='text' name='rfone' id='rfone' value='$rfone' size='6'></td>";
$html2 .= "    <td>$saidas</td>";
$html2 .= "    <td>$tipos</td>";
$html2 .= "    <td><input type='submit' value='Gerar'></td></tr></form>";
$html2 .= "</table>";
$html2 .= "</fieldset>";
	
$html = "<html><body><table border >";

if($tipo=="Nomes") 
{
	$SQL  = " select * from clientes where 1=1 ";
	if (strlen($rnome) > 0) { $SQL .= " and nome_clie like '%".$rnome."%' "; }
	if (strlen($remail) > 0) { $SQL .= " and email like '%".$remail."%' "; }
	if (strlen($rfone) > 0) { $SQL .= " and fone like '%".$rfone."%' "; }
	$SQL .= " order by nome_clie";
// 	echo $SQL;
	$RSS = mysqli_query($conexao,$SQL);
	while($RS = mysqli_fetch_array($RSS))
	{
		$html .= "<tr><td>".$RS["id_clie"]."</td>";
		$html .= "<td>".$RS["nome_clie"]."</td>";
		$html .= "<td>".$RS["fone"]."</td>";
		$html .= "<td>".$RS["email"]."</td>";
		$html .= "</tr>";
		$xx = $xx + 1;
	}
}

if($tipo=="Contatos") 
{
	$SQL  = " select * from contatos where 1=1 ";
	if (strlen($rnome) > 0) { $SQL .= " and nome like '%".$rnome."%' "; }
	if (strlen($remail) > 0) { $SQL .= " and email like '%".$remail."%' "; }
	$SQL .= " order by nome";
// 	echo $SQL;
	$RSS = mysqli_query($conexao,$SQL);
	while($RS = mysqli_fetch_array($RSS))
	{
		$html .= "<tr><td>".$RS["id"]."</td>";
		$html .= "<td>".$RS["nome"]."</td>";
		$html .= "<td>".$RS["email"]."</td>";
		$html .= "</tr>";
		$xx = $xx + 1;
	}
}


if($tipo=="Cidades") 
{
	$SQL  = " select * from nomes where 1=1 ";
	if (strlen($rnome) > 0) { $SQL .= " and ds_nome like '%".$rnome."%' "; }
	if (strlen($remail) > 0) { $SQL .= " and ds_email like '%".$remail."%' "; }
	if (strlen($rfone) > 0) { $SQL .= " and ds_fone like '%".$rfone."%' "; }
	$SQL .= " order by ds_nome";
	echo $SQL;
	$RSS = mysqli_query($conexao,$SQL);
	while($RS = mysqli_fetch_array($RSS))
	{
		$html .= "<tr><td>".$RS["cd_nome"]."</td>";
		$html .= "<td>".$RS["ds_nome"]."</td>";
		$html .= "<td>".$RS["ds_fone"]."</td>";
		$html .= "<td>".$RS["ds_email"]."</td>";
		$html .= "</tr>";
		$xx = $xx + 1;
	}
}

$html .= "</table>";
$html .= "</body>";
$html .= "</html>"; 

If ($saida == "XLS")
{
	$arquivo = "Relatorio_em_".date("d_m_Y__H_i_s").".xls";
	header ("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msexcel");
	header ("Content-Disposition: attachment;filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data" );
	$html = str_replace(",","",$html);
	$html = str_replace(".",",",$html);
	echo $html;
}

If ($saida == "DOC")
{
	$arquivo = "Relatorio_em_".date("d_m_Y_H_i_s").".doc";
	header ("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header ("Cache-Control: no-cache, must-revalidate");
	header ("Pragma: no-cache");
	header ("Content-type: application/x-msword");
	header ("Content-Disposition: attachment;filename=\"{$arquivo}\"");
	header ("Content-Description: PHP Generated Data" );
	echo $html;
}

If ( $saida == "HTML" ) {echo $html1.$html2.$html;}     

If ( $saida == "IMP" ) 
{
	echo $html;
	echo "<center><form><input type='button' value='Imprimir' OnClick='javascript:DoPrinting()'></form></center>";
	echo "<script type='text/javascript'> function DoPrinting(){ window.print() } </script>";
}     

?>
<script language="JavaScript1.2">

function DoPrinting()
{
	if (!window.print)
	{
		alert("Use o Internet Explorer \n nas vers�es 4.0 ou superior!")
		return
	}
	window.print()
}

</script>
</body>
</html>