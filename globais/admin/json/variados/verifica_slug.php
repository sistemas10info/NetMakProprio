<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=false;
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

$ver3=executeQuery("select interno from slugs 
									where
										 id_key_origem<>'".$_POST['id_key']."' and 
										 slug='".$_POST['slug']."' limit 1");

if(@$ver3['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca slug: ' . $ver3['error'];
	exit(json_encode($response));
}	

if ($ver3)									 
{
	http_response_code(400);
	$response['msg'] = 'O Slug solicitado já existe... user outro';
	exit(json_encode($response));
}

http_response_code(200);
$response['msg'] = "Slug OK";
$response['slug']=$_POST['slug'];
$response['link']=WEBSITE_EMPRESA.$_POST['slug'];  
//echo "ERROR||".$resultado_busca['message'];

exit(json_encode($response));

?>
