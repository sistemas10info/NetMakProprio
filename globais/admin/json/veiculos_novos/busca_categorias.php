<?php 

header('Access-Control-Allow-Origin: *');
$Xverifica_login=false;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$cat1=executeQuery("select * from categorias 
											where 
												id_key_linha='".$_POST['id_key_linha']."' 
											order by nome","all");
if(@$cat1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca: ' . @$cat1['error'];
	exit(json_encode($response));
}

$Xcategorias=[];
if ($cat1)
{
	foreach ($cat1 as $cat3)
	{
	     $Xcategorias[]=$cat3;
	}
}

http_response_code(200);
$response['msg'] = 'Categorias listadas com sucesso...';
$response['categorias']=$Xcategorias;
exit(json_encode($response));

?>
