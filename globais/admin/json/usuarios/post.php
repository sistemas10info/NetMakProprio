<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
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
    if (empty($_POST['nome'])) $Xmensagem.="Nome completo de usuario tem que estar preenchido.<BR>";
    if (empty($_POST['usuario'])) $Xmensagem.="Nome de usuário tem que estar preenchido<BR>";
    if (empty($_POST['celular'])) $Xmensagem.="Nro de celular tem que estar preenchido<BR>";
    if (!validar_email($_POST['email'])) $Xmensagem.="Email inválido<BR>";
    
    if (!empty($Xmensagem))
    {
        $Xmensagem="Para deixar o cadastro ativo verifique as seguintes infromações<BR><HR>".$Xmensagem;
		http_response_code(400);
		$response['msg'] = $Xmensagem; 
		exit(json_encode($response));
     }
     
}

// VERIFICO SE USUARIO EXISTE...
$ver3=executeQuery("select interno 
											from 
										usuarios 
											where 
										usuario='".$_POST['usuario']."' and id_key<>'".$_POST['id']."' 
											limit 1");

if(@$ver3['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca usuario: ' . $ver3['error'];
	exit(json_encode($response));
}

if ($ver3)
{
	http_response_code(400);
	$response['msg'] = 'Usuario '.$_POST['usuario'].' existente...use outro nome de usuário';
	exit(json_encode($response));
}
// FIM


if ($_POST['altera_senha']=="1")
{
     $Xsenha=encrypt($_POST['senha'],true);
     $Xsql_senha=" senha = '".$Xsenha."', altera_senha='1', ";
}
else $Xsql_senha="";


if (empty($_POST['id']))
{
	$_POST['id']=buildIdKey(30);
	
	$insert = executeQuery("INSERT INTO
											usuarios
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
    [id] => 
    [nome] => Novo usuário
    [cpf_cnpj] => 
    [telefone] => 
    [celular] => 
    [email] => 
    [site] => 
    [instagram] => 
    [facebook] => 
    [usuario] => 
    [altera_senha] => 1
    [senha] => aflb1963
    [estado] => 0
*/

$update = executeQuery("update usuarios
									    SET
											nome			= '".@$_POST['nome']."',
											telefone    	 		= '".((!empty(@$_POST['telefone']))      ? @$_POST['telefone']     : '')."',
											celular    	 		= '".((!empty(@$_POST['celular']))      ? @$_POST['celular']     : '')."',
											email    	 		= '".((!empty(@$_POST['email']))      ? @$_POST['email']     : '')."',
											usuario	      	 		= '".((!empty(@$_POST['usuario']))         ? @$_POST['usuario']     : '')."',
											senha	      	 		= '".((!empty(@$_POST['senha']))         ? @$_POST['senha']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											obs	      	 		= '".((!empty(@$_POST['obs']))         ? @$_POST['obs']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											site	      	 		= '".((!empty(@$_POST['site']))         ? @$_POST['site']     : '')."',
											nivel	      	 		= '".((!empty(@$_POST['nivel']))         ? @$_POST['nivel']     : '')."',
											instagram	      	 		= '".((!empty(@$_POST['instagram']))         ? @$_POST['instagram']     : '')."',
											".$Xsql_senha." 
											facebook	      	 		= '".((!empty(@$_POST['facebook']))         ? @$_POST['facebook']     : '')."',
											link_avatar				= '".$_POST['Vlink_avatar']."',
											cpf_cnpj					= '".$_POST['cpf_cnpj']."' 
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Seu usuário foi cadastrado.';
$response['id'] = $_POST['id'];

exit(json_encode($response));
