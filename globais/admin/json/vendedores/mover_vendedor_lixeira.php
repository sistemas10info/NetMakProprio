<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

//print_r($_POST);

if (empty($_POST['id']))
{
	http_response_code(400);
	$response['msg'] = 'Não existe o ID...';
	exit(json_encode($response));
}

$update = executeQuery("
									update vendedores
									    SET
											apagado			= '1'
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Vendedor movido para lixeira.....';
$response['id'] = $_POST['id'];

exit(json_encode($response));
