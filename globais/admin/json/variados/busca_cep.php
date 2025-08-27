<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$resultado_busca=busca_cep($_POST['cep']);

//print_r($resultado_busca);

if(empty(@$resultado_busca['erro']))
{  
	http_response_code(200);
	$response['tipo']='1';
	$response['tipo_logradouro']=@$resultado_busca['tipo_logradouro'];
	$response['logradouro']=@$resultado_busca['logradouro'];
	$response['bairro']=@$resultado_busca['bairro'];
	$response['cidade']=@$resultado_busca['localidade'];
	$response['ibge']=@$resultado_busca['ibge'];
	$response['uf']=@$resultado_busca['uf'];
	switch(@$resultado_busca['uf'])
	{
		case 'AC':
			$response['estado']='Acre';
			$response['codigo_estado']='512';
			break;

		case 'AL':
			$response['estado']='Alagoas';
			$response['codigo_estado']='513';
			break;

		case 'AP':
			$response['estado']='Amapa';
			$response['codigo_estado']='514';
			break;

		case 'AM':
			$response['estado']='Amazonas';
			$response['codigo_estado']='515';
			break;

		case 'BA':
			$response['estado']='Bahia';
			$response['codigo_estado']='516';
			break;

		case 'CE':
			$response['estado']='Ceara';
			$response['codigo_estado']='517';
			break;

		case 'DF':
			$response['estado']='Distrito Federal';
			$response['codigo_estado']='518';
			break;

		case 'ES':
			$response['estado']='Espirito Santo';
			$response['codigo_estado']='519';
			break;

		case 'GO':
			$response['estado']='Goias';
			$response['codigo_estado']='521';
			break;

		case 'MA':
			$response['estado']='Maranhao';
			$response['codigo_estado']='522';
			break;

		case 'MT':
			$response['estado']='Mato Grosso';
			$response['codigo_estado']='523';
			break;

		case 'MS':
			$response['estado']='Mato Grosso do Sul';
			$response['codigo_estado']='524';
			break;

		case 'MG':
			$response['estado']='Minas Gerais';
			$response['codigo_estado']='525';
			break;

		case 'PA':
			$response['estado']='Para';
			$response['codigo_estado']='526';
			break;

		case 'PB':
			$response['estado']='Paraiba';
			$response['codigo_estado']='527';
			break;

		case 'PR':
			$response['estado']='Parana';
			$response['codigo_estado']='528';
			break;

		case 'PE':
			$response['estado']='Pernambuco';
			$response['codigo_estado']='529';
			break;

		case 'PI':
			$response['estado']='Piaui';
			$response['codigo_estado']='530';
			break;

		case 'RJ':
			$response['estado']='Rio de Janeiro';
			$response['codigo_estado']='533';
			break;

		case 'RN':
			$response['estado']='Rio Grande do Norte';
			$response['codigo_estado']='532';
			break;

		case 'RS':
			$response['estado']='Rio Grande do Sul';
			$response['codigo_estado']='531';
			break;

		case 'RO':
			$response['estado']='Rondonia';
			$response['codigo_estado']='534';
			break;

		case 'RR':
			$response['estado']='Roraima';
			$response['codigo_estado']='535';
			break;

		case 'SC':
			$response['estado']='Santa Catarina';
			$response['codigo_estado']='536';
			break;

		case 'SP':
			$response['estado']='São Paulo';
			$response['codigo_estado']='520';
			break;

		case 'SE':
			$response['estado']='Sergipe';
			$response['codigo_estado']='538';
			break;

		case 'TO':
			$response['estado']='Tocantins';
			$response['codigo_estado']='539';
			break;

		default:
			$response['estado']='';
			$response['codigo_estado']='';
			break;
	}
	//echo "2||".$resultado_busca['cidade']."||".$resultado_busca['uf'];
	exit(json_encode($response));
}
else
{
	http_response_code(400);
	$response['tipo']='9';
	$response['msg'] = "Falha ao buscar cep: ".$resultado_busca['resultado'];  
	exit(json_encode($response));
}


function busca_cep($cep){  
		//$resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=query_string');  
// 		$resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep));  
// 		if(!$resultado){  
// 				$resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
// 		}  
// 		$xml = simplexml_load_string($resultado, "SimpleXMLElement", LIBXML_NOCDATA);
// 		$json = json_encode($xml);
// 		$retorno = json_decode($json,TRUE);
		$resultado = @file_get_contents('https://viacep.com.br/ws/'.urlencode(str_replace(["-","."],"",$cep)).'/xml/');  
 		if(!$resultado){  
				$resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
 		}  
 		$xml = simplexml_load_string($resultado, "SimpleXMLElement", LIBXML_NOCDATA);
 		$json = json_encode($xml);
 		$retorno = json_decode($json,TRUE);
		//parse_str($resultado, $retorno);   
		return $retorno;  
}  


?>
