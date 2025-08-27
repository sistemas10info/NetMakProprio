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

if (empty($_POST['nome']))
{
	http_response_code(400);
	$response['msg'] = 'Não existe o ID...';
	exit(json_encode($response));
}

if ($_POST['id_key']=="--")
{
    $_POST['id_key']=buildIdKey(30);
	$insert = executeQuery("
										insert into categorias_produtos
										    SET
										        id_key       = '".$_POST['id_key']."' ");
	if(@$insert['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao insert registro: ' . @$insert['error'];
		exit(json_encode($response));
	}


}

$update = executeQuery("update  categorias_produtos
									    SET
									        nome			= '".@$_POST['nome']."',
									        id_key_linha			= '".@$_POST['id_key_linha']."',
									        id_key_categoria			= '".@$_POST['id_key_categoria']."',
									        id_key_marca			= '".@$_POST['id_key_marca']."'
									    where
									    	id_key='".$_POST['id_key']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Categoria adicionada com sucesso...';
$response['id_key'] = $Xid_key;

exit(json_encode($response));
