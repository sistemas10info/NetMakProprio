<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
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
    if (empty($_POST['razao_social'])) $Xmensagem.="Razao Social tem que estar preenchida<BR>";
    if (empty($_POST['cep'])) $Xmensagem.="CEP tem que estar preenchido<BR>";
    if (empty($_POST['rua'])) $Xmensagem.="Rua tem que estar preenchida<BR>";
    if (empty($_POST['cidade'])) $Xmensagem.="Cidade tem que estar preenchida<BR>";
    if (!validaCNPJ($_POST['cpf_cnpj'])) $Xmensagem.="CNPJ inválido<BR>";
    if (empty($_POST['usuario'])) $Xmensagem.="Nome de usuário tem que estar preenchido<BR>";
    if (empty($_POST['celular'])) $Xmensagem.="Nro de celular tem que estar preenchido<BR>";
    if (!validar_email($_POST['email'])) $Xmensagem.="Email inválido<BR>";
    if (!isset($_POST['id_key_categorias'])) $Xmensagem.="Precisa definir alguma categoria<BR>";
    
    if (!empty($Xmensagem))
    {
        $Xmensagem="Para deixar o cadastro ativo verifique as seguintes infromações<BR><HR>".$Xmensagem;
		http_response_code(400);
		$response['msg'] = $Xmensagem; 
		exit(json_encode($response));
     }
     
}

$Xid_key_categorias="";

if (isset($_POST['id_key_categorias']))
{
	$Xid_key_categorias=implode("-",$_POST['id_key_categorias']);
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
	$insert = executeQuery("
										INSERT INTO
											vendedores
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
    [id] => 
    [razao_social] => Novo vendedor
    [cpf_cnpj] => 
    [telefone] => 
    [celular] => 
    [email] => 
    [cep] => 
    [rua] => 
    [nro] => 
    [comple] => 
    [cidade] => 
    [bairro] => 
    [uf] => AC
    [usuario] => 
    [senha] => 
    [estado] => 0
    [obs] => 
    [site] => 
    [instagram] => 
    [facebook] => 
    [quem_somos] => 
    [servicos_prestados] => 
    [nome_empresa] => 
    [modelo_site] => 1
    [slogan] => 
    [subdominio] => 
)
*/

$update = executeQuery("
									update vendedores
									    SET
											razao_social		= '".@$_POST['razao_social']."',
											cpf_cnpj			= '".@$_POST['cpf_cnpj']."',
											telefone    	 		= '".((!empty(@$_POST['telefone']))      ? @$_POST['telefone']     : '')."',
											celular    	 		= '".((!empty(@$_POST['celular']))      ? @$_POST['celular']     : '')."',
											email    	 		= '".((!empty(@$_POST['email']))      ? @$_POST['email']     : '')."',
											cep    	 		= '".((!empty(@$_POST['cep']))      ? @$_POST['cep']     : '')."',
											rua    	 		= '".((!empty(@$_POST['rua']))      ? @$_POST['rua']     : '')."',
											nro    	 		= '".((!empty(@$_POST['nro']))      ? @$_POST['nro']     : '')."',
											comple	      	 		= '".((!empty(@$_POST['comple']))         ? @$_POST['comple']     : '')."',
											cidade	      	 		= '".((!empty(@$_POST['cidade']))         ? @$_POST['cidade']     : '')."',
											bairro	      	 		= '".((!empty(@$_POST['bairro']))         ? @$_POST['bairro']     : '')."',
											uf	      	 		= '".((!empty(@$_POST['uf']))         ? @$_POST['uf']     : '')."',
											usuario	      	 		= '".((!empty(@$_POST['usuario']))         ? @$_POST['usuario']     : '')."',
											senha	      	 		= '".((!empty(@$_POST['senha']))         ? @$_POST['senha']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											obs	      	 		= '".((!empty(@$_POST['obs']))         ? @$_POST['obs']     : '')."',
											estado	      	 		= '".((!empty(@$_POST['estado']))         ? @$_POST['estado']     : '')."',
											site	      	 		= '".((!empty(@$_POST['site']))         ? @$_POST['site']     : '')."',
											instagram	      	 		= '".((!empty(@$_POST['instagram']))         ? @$_POST['instagram']     : '')."',
											".$Xsql_senha." 
											facebook	      	 		= '".((!empty(@$_POST['facebook']))         ? @$_POST['facebook']     : '')."',
											id_key_categorias = '".$Xid_key_categorias."' 
									   WHERE
										    id_key='".$_POST['id']."' limit 1 ");

if(@$update['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
	exit(json_encode($response));
}

http_response_code(200);
$response['msg']    = 'Seu vendedor foi cadastrado.';
$response['id'] = $_POST['id'];

exit(json_encode($response));
