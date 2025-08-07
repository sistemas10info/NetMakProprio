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
											quem_somos			= '".@$_POST['quem_somos']."',
											servicos_prestados	= '".@$_POST['servicos_prestados']."',
											subdominio    	 	= '".((!empty(@$_POST['subdominio']))      ? @$_POST['subdominio']     : '')."',
											nome_empresa    	= '".((!empty(@$_POST['nome_empresa']))      ? @$_POST['nome_empresa']     : '')."',
											slogan    	 			= '".((!empty(@$_POST['slogan']))      ? @$_POST['slogan']     : '')."',
											modelo_site    	 	= '".@$_POST['modelo_site']."' 
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Site do vendedor foi configurado com sucesso....';
$response['id'] = $_POST['id'];

exit(json_encode($response));
