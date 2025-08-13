<?php
header('Access-Control-Allow-Origin: *');

$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$update=executeQuery("update imagens 
													set principal='xx' 
												where 
													id_key_origem='".$_POST['id_key_origem']."' ");
													
if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update principal registro: ' . $update['error'];
}

$update=executeQuery("update imagens 
													set principal='on' 
												where 
													id_key='".$_POST['id_key']."'
												limit 1");
													
if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update principal unico: ' . $update['error'];
}

$response['msg']="Imagem principal configurada com sucesso...";
exit(json_encode($response));
?>
