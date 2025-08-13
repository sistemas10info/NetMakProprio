<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=false;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

// print_r($_POST);

$mod1=executeQuery("select * from modelos 
											where 
												id_key_categoria='".$_POST['id_key_categoria']."' and 
												id_key_marca='".$_POST['id_key_marca']."' 
											order by nome","all");
if(@$mod1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca: ' . @$mod1['error'];
	exit(json_encode($response));
}

if ($mod1)
{
    $Xmodelos=[];
	foreach ($mod1 as $mod3)
	{
	     $Xmodelos[]=$mod3;
	}
}

http_response_code(200);
$response['msg'] = 'Modelos listados com sucesso...';
$response['modelos']=$Xmodelos;
exit(json_encode($response));

?>
