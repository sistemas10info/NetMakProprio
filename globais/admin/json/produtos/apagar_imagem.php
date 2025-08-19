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
	$delete = executeQuery("delete from 
												imagens
											where
												id_key='".$_POST['id_key']."' limit 1");
	if(@$delete['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao deletar registro: ' . $delete['error'];
		exit(json_encode($response));
	}

}

http_response_code(200);
$response['msg']    = 'Imagem apagada com sucesso..';
$response['id_key'] = $_POST['id_key'];
exit(json_encode($response));
