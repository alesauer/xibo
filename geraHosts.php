<?php
$maquina="xibo.almg.uucp";
$usuario="xiboleitura";
$senha="ajk3sdf7s4";
$banco="xibo";

function conecta( $maquina , $usuario, $senha, $banco, $sql )
{
     $mysqli = new mysqli($maquina, $usuario, $senha, $banco);
     $resultado = $mysqli->query($sql);
     return $resultado;
}

$sql="SELECT display,ClientAddress,MacAddress,client_type FROM display WHERE display NOT like '%Memorial%' AND display NOT like '%ESTOQUE%' AND display NOT like '%TESTE%' AND client_type = 'android'";
$resultado=conecta($maquina,$usuario,$senha,$banco,$sql);

       while($linha=mysqli_fetch_array($resultado)){
	$display = $linha["display"];
	$ClientAddress = $linha["ClientAddress"];
	$ClientType = $linha["client_type"];


//	$hostnameX = exec("nslookup $ClientAddress | awk -F' ' '{ print $4 }'");
	$hostnameX = gethostbyaddr($ClientAddress);

	echo "$display,$hostnameX,$ClientAddress,$ClientType\n";

}//end while






?>
