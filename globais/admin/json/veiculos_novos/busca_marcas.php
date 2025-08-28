<?php 

header('Access-Control-Allow-Origin: *');
$Xverifica_login=false;
$Xerror=false;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$mar1=executeQuery("select * from marcas 
											where 
												id_key_categoria='".$_POST['id_key_categoria']."' 
											order by nome","all");
if(@$mar1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca: ' . @$mar1['error'];
	exit(json_encode($response));
}

$Xmarcas=[];
if ($mar1)
{
	foreach ($mar1 as $mar3)
	{
	     $Xmarcas[]=$mar3;
	}
}

http_response_code(200);
$response['msg'] = 'Marcas listadas com sucesso...';
$response['marcas']=$Xmarcas;
exit(json_encode($response));

?>
