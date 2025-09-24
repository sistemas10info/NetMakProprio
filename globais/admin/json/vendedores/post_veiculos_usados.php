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
if (@$_POST['estado']=="1")
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

if (!empty($_POST['slug']))
{
	$ver3=executeQuery("select interno from slugs where slug='".$_POST['slug']."' and id_key_origem<>'".$_POST['id']."' limit 1");
	
	if(@$ver3['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao busca slug: ' . @$ver3['error'];
		exit(json_encode($response));
	}
	
	if($ver3)
	{
		http_response_code(400);
		$response['msg'] = "Verifique que o slug ".$_POST['slug']."  já existe para outra pagina"; 
		exit(json_encode($response));
	}
}


$Xtemplate_update="";
if ($_POST['template']=="1")
	$Xtemplate_update="motor='".$_POST['motor_1']."',tipo_torre='".$_POST['tipo_torre_1']."',cap_carga='".$_POST['cap_carga_1']."',cap_elevacao='".$_POST['cap_elevacao_1']."',";
	
if ($_POST['template']=="2")
	$Xtemplate_update="motor='".$_POST['motor_2']."',cap_carga='".$_POST['cap_carga_2']."',cap_elevacao='".$_POST['cap_elevacao_2']."',";

if ($_POST['template']=="P")
	$Xtemplate_update="motor='".$_POST['motor_P']."',potencia_hp='".$_POST['potencia_hp_P']."',
								   capacidade_cacamba='".$_POST['capacidade_cacamba_P']."',peso_operacional='".$_POST['peso_operacional_P']."',";

if ($_POST['template']=="R")
	$Xtemplate_update="motor='".$_POST['motor_R']."',potencia_hp='".$_POST['potencia_hp_R']."',
								   capacidade_cacamba='".$_POST['capacidade_cacamba_R']."',profundidade_escavacao='".$_POST['profundidade_escavacao_R']."',";

if ($_POST['template']=="E")
	$Xtemplate_update="motor='".$_POST['motor_R']."',peso_operacional='".$_POST['peso_operacional_E']."',
								   capacidade_cacamba='".$_POST['capacidade_cacamba_E']."',profundidade_escavacao='".$_POST['profundidade_escavacao_E']."',";

if ($_POST['template']=="M")
	$Xtemplate_update="motor='".$_POST['motor_M']."',peso_operacional='".$_POST['peso_operacional_M']."',
								   potencia_hp='".$_POST['potencia_hp_M']."',largura_lamina='".$_POST['largura_lamina_M']."',";

if ($_POST['template']=="RC")
	$Xtemplate_update="motor='".$_POST['motor_RC']."',peso_operacional='".$_POST['peso_operacional_RC']."',
								   tipo_rolo='".$_POST['tipo_rolo_RC']."',largura_tambor='".$_POST['largura_tambor_RC']."',";

if ($_POST['template']=="T")
	$Xtemplate_update="motor='".$_POST['motor_T']."',peso_operacional='".$_POST['peso_operacional_T']."',
								   potencia_hp='".$_POST['potencia_hp_T']."',largura_lamina='".$_POST['largura_lamina_T']."',";

if ($_POST['template']=="C")
	$Xtemplate_update="motor='".$_POST['motor_C']."',potencia_hp='".$_POST['potencia_hp_C']."',
								   capacidade_carga='".$_POST['capacidade_carga_C']."',volume_cacamba='".$_POST['volume_cacamba_C']."',";

$Xautorizado_template="";
if (isset($_POST['estado_autorizado']))
{
	$Xautorizado_template="estado_autorizado='".$_POST['estado_autorizado']."',obs_publicacao='".$_POST['obs_publicacao']."',";
}

$Xpreco=str_replace(",","",$_POST['preco']);
$Xvalor_locacao=str_replace(",","",$_POST['valor_locacao']);
$update = executeQuery("update veiculos
									    SET
									    	tipo='2',
									    	id_key_vendedor			='".$_POST['id_key_vendedor']."',
											titulo								= '".@$_POST['titulo']."',
											descrip							= '".@$_POST['descrip']."',
											especifica						= '".@$_POST['especifica']."',
											id_key_linha    	 			= '".((!empty(@$_POST['id_key_linha']))      ? @$_POST['id_key_linha']     : '')."',
											id_key_categoria    	 		= '".((!empty(@$_POST['id_key_categoria']))      ? @$_POST['id_key_categoria']     : '')."',
											id_key_marca    	 			= '".((!empty(@$_POST['id_key_marca']))      ? @$_POST['id_key_marca']     : '')."',
											ano_fabricacao    	 		= '".((!empty(@$_POST['ano_fabricacao']))      ? @$_POST['ano_fabricacao']     : '')."',
											".$Xtemplate_update." ".$Xautorizado_template." 
											id_key_modelo 	 			= '".((!empty(@$_POST['id_key_modelo']))      ? @$_POST['id_key_modelo']     : '')."',
											preco    	 						= '".$Xpreco."',
											estado	      	 				= '".@$_POST['estado']."',
											locacao 							= '".@$_POST['locacao']."',
											valor_locacao    	 			= '".$Xvalor_locacao."',
											uf	      	 						= '".@$_POST['uf']."',
											cidade	      	 				= '".@$_POST['cidade']."',
											ddd	      	 					= '".@$_POST['ddd']."',
											estado_veiculo	      	 	= '".@$_POST['estado_veiculo']."',
											condicao	      	 			= '".@$_POST['condicao']."',
											horimetro	      	 			= '".@$_POST['horimetro']."',
											seo	      	 					= '".((!empty(@$_POST['seo']))         ? @$_POST['seo']     : '')."',
											descrip_seo	      	 		= '".((!empty(@$_POST['descrip_seo']))         ? @$_POST['descrip_seo']     : '')."',
											titulo_seo	      	 			= '".((!empty(@$_POST['titulo_seo']))         ? @$_POST['titulo_seo']     : '')."'
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
