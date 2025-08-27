<?php
header('Access-Control-Allow-Origin: *');

$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$cat3=executeQuery("select * from categorias_produtos 
														where 
													id_key='".$_POST['id_key']."' limit 1");
if(@$cat3['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao busca registro: ' . $ima3['error'];
	exit(json_encode($response));
}

if ($cat3)
{
    $response['id_key']=$_POST['id_key'];
    $response['nome']=$cat3['nome'];
    $response['id_key_linha']=$cat3['id_key_linha'];
    $response['id_key_categoria']=$cat3['id_key_categoria'];
    $response['id_key_marca']=$cat3['id_key_marca'];
	http_response_code(200);
	$response['msg'] = 'Categoria encontrada ';
	exit(json_encode($response));
}
else
{
	http_response_code(400);
	$response['msg'] = 'Categoria não encontrada';
	$response['id_key']=$_POST['id_key'];
	exit(json_encode($response));
}
?>
