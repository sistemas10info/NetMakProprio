<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

if (!empty($_POST['id_key']))
{
	$update = executeQuery("update
												imagens
											set
												titulo='".$_POST['titulo']."' 
											where
												id_key='".$_POST['id_key']."' limit 1");
	if(@$$update['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao update registro: ' . $update['error'];
		exit(json_encode($response));
	}

}

http_response_code(200);
$response['msg']    = 'Titulo alterado com sucesso..';
$response['id_key'] = $_POST['id_key'];
exit(json_encode($response));
