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

if (empty($_POST['nome']))
{
	http_response_code(400);
	$response['msg'] = 'Não existe o ID...';
	exit(json_encode($response));
}

$Xid_key=buildIdKey(30);
$insert = executeQuery("
									insert into categorias
									    SET
									        id_key       = '".$Xid_key."',
											nome			= '".@$_POST['nome']."' ");

if(@$insert['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao insert registro: ' . @$insert['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Categoria adicionada com sucesso...';
$response['id_key'] = $Xid_key;

exit(json_encode($response));
