<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=false;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}


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
print_r($_POST);
die();
*/

$Xtemplate_update="";
if ($_POST['template']=="1")
	$Xtemplate_update="motor='".$_POST['motor_1']."',tipo_torre='".$_POST['tipo_torre_1']."',cap_carga='".$_POST['cap_carga_1']."',cap_elevacao='".$_POST['cap_elevacao_1']."',";

if ($_POST['template']=="2")
	$Xtemplate_update="motor='".$_POST['motor_2']."',cap_carga='".$_POST['cap_carga_2']."',cap_elevacao='".$_POST['cap_elevacao_2']."',";

/*

Array
(
    [id] => HGQ7JY21DINC22NF2SS9UOI4QGVMTW
    [template] => 0
    [titulo] => Novo veículo
    [descrip] => 
    [especifica] => 
    [id_key_linha] => --
    [id_key_categoria] => --
    [id_key_marca] => --
    [id_key_modelo] => --
    [preco] => 0.00
    [estado] => 0
    [locacao] => S
    [valor_locacao] => 0.00
    [motor_1] => Diesel
    [tipo_torre_1] => Duplex
    [cap_carga_1] => 2500kg
    [cap_elevacao_1] => Até 3,5 metros
    [motor_2] => Manual
    [cap_carga_2] => 1000kg
    [cap_elevacao_2] => Sem elevação
    [uf] => xx
    [cidade] => 
    [estado_veiculo] => Ótimo estado
    [condicao] => Semi-nova
    [horimetro] => 
)

*/

$Xpreco=str_replace(",","",$_POST['preco']);
$Xvalor_locacao=str_replace(",","",$_POST['valor_locacao']);
$update = executeQuery("update veiculos
									    SET
									    	tipo='2',
									    	id_key_vendedor='".$_SESSION['vendedor']['id_key']."',
											titulo		= '".@$_POST['titulo']."',
											descrip			= '".@$_POST['descrip']."',
											especifica			= '".@$_POST['especifica']."',
											id_key_linha    	 		= '".((!empty(@$_POST['id_key_linha']))      ? @$_POST['id_key_linha']     : '')."',
											id_key_categoria    	 		= '".((!empty(@$_POST['id_key_categoria']))      ? @$_POST['id_key_categoria']     : '')."',
											id_key_marca    	 		= '".((!empty(@$_POST['id_key_marca']))      ? @$_POST['id_key_marca']     : '')."',
											".$Xtemplate_update."
											id_key_modelo 	 		= '".((!empty(@$_POST['id_key_modelo']))      ? @$_POST['id_key_modelo']     : '')."',
											preco    	 		= '".$Xpreco."',
											estado	      	 		= '".@$_POST['estado']."',
											locacao = '".@$_POST['locacao']."',
											valor_locacao    	 		= '".$Xvalor_locacao."',
											uf	      	 		= '".@$_POST['uf']."',
											cidade	      	 		= '".@$_POST['cidade']."',
											estado_veiculo	      	 		= '".@$_POST['estado_veiculo']."',
											condicao	      	 		= '".@$_POST['condicao']."',
											horimetro	      	 		= '".@$_POST['horimetro']."'
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
