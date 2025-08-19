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

// <- Filtros *************************************************************************
if (@$_POST['estado']=="9")
{
    $Xmensagem="";
    if (empty($_POST['titulo'])) $Xmensagem.="Titulo de anuncio deve estar preenchido<BR>";
    if (empty($_POST['descrip'])) $Xmensagem.="Descrição do anuncio deve estar preenchido<BR>";
    if ($_POST['id_key_categoria']=="--") $Xmensagem.="Categoria deve estar preenchida<BR>";
    
    if (!empty($Xmensagem))
    {
        $Xmensagem="Para deixar o cadastro ativo verifique as seguintes infromações<BR><HR>".$Xmensagem;
		http_response_code(400);
		$response['msg'] = $Xmensagem; 
		exit(json_encode($response));
     }    
}


if (empty($_POST['id']))
{
	$_POST['id']=buildIdKey(30);
	$insert = executeQuery("
										INSERT INTO
											produtos
										SET
											id_key        	= '".$_POST['id']."'
										");
	
	if(@$insert['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao inserir registro: ' . $insert['error'];
		exit(json_encode($response));
	}

}


$Xpreco=str_replace(",","",$_POST['preco']);
$Xpreco_oferta=str_replace(",","",$_POST['preco_oferta']);
$update = executeQuery("update produtos
									    SET
									    	tipo='1',
											titulo		= '".@$_POST['titulo']."',
											descrip			= '".@$_POST['descrip']."',
											id_key_categoria    	 		= '".((!empty(@$_POST['id_key_categoria']))      ? @$_POST['id_key_categoria']     : '')."',
											preco    	 		= '".$Xpreco."',
											preco_oferta   = '".$Xpreco_oferta."',
											comic    	 		= '".((!empty(@$_POST['comic']))      ? @$_POST['comic']     : '')."',
											comic_fixa    	 		= '".((!empty(@$_POST['comic_fixa']))      ? @$_POST['comic_fixa']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											seo	      	 		= '".((!empty(@$_POST['seo']))         ? @$_POST['seo']     : '')."'
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Seu produto foi cadastrado.';
$response['id'] = $_POST['id'];

exit(json_encode($response));
