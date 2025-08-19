<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}


print_r($_POST);
die();

// <- Filtros *************************************************************************
if (@$_POST['estado']=="9")
{

    $Xmensagem="";
    if (empty($_POST['nome'])) $Xmensagem.="Razao Social tem que estar preenchida<BR>";
    if (empty($_POST['usuario'])) $Xmensagem.="CEP tem que estar preenchido<BR>";
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
											instagram	      	 		= '".((!empty(@$_POST['instagram']))         ? @$_POST['instagram']     : '')."',
											".$Xsql_senha." 
											facebook	      	 		= '".((!empty(@$_POST['facebook']))         ? @$_POST['facebook']     : '')."'
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
