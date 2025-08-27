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
    /*
    if ($_POST['id_key_categoria']=="--") $Xmensagem.="Categoria deve estar preenchida<BR>";
    if ($_POST['id_key_marca']=="--") $Xmensagem.="Marca deve estar preenchida<BR>";
    if ($_POST['id_key_modelo']=="--") $Xmensagem.="Modelo deve estar preenchido<BR>";
    */
    
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
											veiculos
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

/*
Array
(
    [id] => UEW052HKRR2ICFEFZXPT83JO5TBFV9
    [titulo] => Novo veículo
    [descrip] => 
    [id_key_categoria] => --
    [id_key_marca] => --
    [id_key_modelo] => --
    [preco] => 0.00
    [comic] => 0.00
    [comic_fica] => N
    [estado] => 0
    [seo] => 
)
*/

$Xpreco=str_replace(",","",$_POST['preco']);
$update = executeQuery("update veiculos
									    SET
									    	tipo='2',
									    	id_key_vendedor='".$_SESSION['vendedor']['id_key']."',
											titulo		= '".@$_POST['titulo']."',
											descrip			= '".@$_POST['descrip']."',
											especifica			= '".@$_POST['especifica']."',
											id_key_categoria    	 		= '".((!empty(@$_POST['id_key_categoria']))      ? @$_POST['id_key_categoria']     : '')."',
											id_key_marca    	 		= '".((!empty(@$_POST['id_key_marca']))      ? @$_POST['id_key_marca']     : '')."',
											id_key_modelo 	 		= '".((!empty(@$_POST['id_key_modelo']))      ? @$_POST['id_key_modelo']     : '')."',
											preco    	 		= '".$Xpreco."',
											estado	      	 		= '0'
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Seu veiculo foi cadastrado.';
$response['id'] = $_POST['id'];

exit(json_encode($response));
