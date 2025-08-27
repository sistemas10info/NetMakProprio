<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

/*
print_r($_POST);
die();
*/

$delete = executeQuery("delete from ".$_POST['tipo']." 
									    where 
									        id_key = '".$_POST['id_key']."' limit 1");

if(@$delete['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro delete registro: ' . @$delete['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Registro apagado com sucesso...';
$response['id_key'] = $_POST['id_key'];
$response['tipo'] = $_POST['tipo'];

exit(json_encode($response));
