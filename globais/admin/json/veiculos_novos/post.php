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
    if ($_POST['id_key_linha']=="--") $Xmensagem.="Linha do veículo deve estar preenchida<BR>";
    if ($_POST['id_key_categoria']=="--") $Xmensagem.="Categoria deve estar preenchida<BR>";
    if ($_POST['id_key_marca']=="--") $Xmensagem.="Marca deve estar preenchida<BR>";
    if ($_POST['id_key_modelo']=="--") $Xmensagem.="Modelo deve estar preenchido<BR>";
    
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

/*
[motor_P] => Diesel
[potencia_hp_P] => até 100 HP
[capacidade_cacamba_P] => até 1,5 m³
[peso_operacional_P] => até 10 t

[motor_R] => Diesel
[potencia_hp_R] => até 100 HP
[capacidade_cacamba_R] => até 0,2 m³
[profundidade_escavacao_R] => até 4 m

[motor_E] => Diesel
[peso_operacional_E] => até 6 t
[capacidade_cacamba_E] => até 0,4 m³
[profundidade_escavacao_E] => até 4 m

[motor_M] => Diesel
[peso_operacional_M] => até 10 t
[potencia_hp_M] => até 120 HP
[largura_lamina_M] => até 3 m

[motor_RC] => Diesel
[peso_operacional_RC] => até 8 t
[tipo_rolo_RC] => liso
[largura_tambor_RC] => até 1,5 m

[motor_T] => Diesel
[peso_operacional_T] => até 10 t
[potencia_hp_T] => até 120 HP
[largura_lamina_T] => até 3 m

[motor_C] => Diesel
[potencia_hp_C] => até 200 HP
[capacidade_carga_C] => até 10 t
[volume_cacamba_C] => até 10 m³
*/


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

// ultima versão.

if ($_POST['template']=="TA")
	$Xtemplate_update="motor='".$_POST['motor_TA']."',potencia_hp='".$_POST['potencia_hp_TA']."',
								   tracao='".$_POST['tracao_TA']."',peso_operacional='".$_POST['peso_operacional_TA']."',
								   transmissao='".$_POST['transmissao_TA']."',";

if ($_POST['template']=="PU")
	$Xtemplate_update="motor='".$_POST['motor_PU']."',capacidade_tanque='".$_POST['capacidade_tanque_PU']."',
								   largura_barra='".$_POST['largura_barra_PU']."',tipo_propulsao='".$_POST['tipo_propulsao_PU']."',
								   sistema_controle='".$_POST['sistema_controle_PU']."',";

if ($_POST['template']=="PL")
	$Xtemplate_update="numero_linhas='".$_POST['numero_linhas_PL']."',espacamento_linhas='".$_POST['espacamento_linhas_PL']."',
								   capacidade_reservatorio='".$_POST['capacidade_reservatorio_PL']."',tipo_propulsao='".$_POST['tipo_propulsao_PL']."',";

if ($_POST['template']=="CO")
	$Xtemplate_update="motor='".$_POST['motor_CO']."',potencia_hp='".$_POST['potencia_hp_CO']."',peso_operacional='".$_POST['peso_operacional_CO']."',
								   largura_plataforma='".$_POST['largura_plataforma_CO']."',capacidade_granaleiro='".$_POST['capacidade_granaleiro_CO']."',";

if ($_POST['template']=="AR")
	$Xtemplate_update="largura_trabalho='".$_POST['largura_trabalho_AR']."',numero_discos='".$_POST['numero_discos_AR']."',diametro_disco='".$_POST['diametro_disco_AR']."',
								   tipo_maquina='".$_POST['tipo_maquina_AR']."',";


$Xpreco=str_replace(",","",$_POST['preco']);
$update = executeQuery("update veiculos
									    SET
									    	tipo='1',
									    	id_key_vendedor='--',
											titulo		= '".@$_POST['titulo']."',
											descrip			= '".@$_POST['descrip']."',
											slug			= '".@$_POST['slug']."',
											especifica			= '".@$_POST['especifica']."',
											id_key_linha    	 		= '".((!empty(@$_POST['id_key_linha']))      ? @$_POST['id_key_linha']     : '')."',
											id_key_categoria    	 		= '".((!empty(@$_POST['id_key_categoria']))      ? @$_POST['id_key_categoria']     : '')."',
											id_key_marca    	 		= '".((!empty(@$_POST['id_key_marca']))      ? @$_POST['id_key_marca']     : '')."',
											id_key_modelo 	 		= '".((!empty(@$_POST['id_key_modelo']))      ? @$_POST['id_key_modelo']     : '')."',
											preco    	 		= '".$Xpreco."',
											comic    	 		= '".((!empty(@$_POST['comic']))      ? @$_POST['comic']     : '')."',
											comic_fixa    	 		= '".((!empty(@$_POST['comic_fixa']))      ? @$_POST['comic_fixa']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											seo	      	 		= '".((!empty(@$_POST['seo']))         ? @$_POST['seo']     : '')."',
											descrip_seo	      	 		= '".((!empty(@$_POST['descrip_seo']))         ? @$_POST['descrip_seo']     : '')."',
											".$Xtemplate_update."
											titulo_seo	      	 		= '".((!empty(@$_POST['titulo_seo']))         ? @$_POST['titulo_seo']     : '')."'
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

$slu3=executeQuery("select interno from slugs where id_key_origem='".$_POST['id']."' limit 1");

if(@$slu3['error']) 
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$slu3['error']; 
	exit(json_encode($response));
}

if (!$slu3)
{

	$insert=executeQuery("insert into slugs 
												set 
													id_key='".buildIdKey(30)."',
													id_key_origem='".$_POST['id']."',
													tipo_pagina='1' ");
	if(@$insert['error'])
	{
		http_response_code(400);
		$response['msg'] = 'Erro ao insert registro: ' . @$insert['error'];
		exit(json_encode($response));
	}

}

$update=executeQuery("update slugs 
											set 
												slug='".$_POST['slug']."' 
											where 
												id_key_origem='".$_POST['id']."' and 
												tipo_pagina='1' ");
if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update slug: ' . @$update['error'];
	exit(json_encode($response));
}


http_response_code(200);
$response['msg']    = 'Seu vendedor foi cadastrado.';
$response['id'] = $_POST['id'];

exit(json_encode($response));
