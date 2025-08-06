<?php 

/***
* Retorna a consulta ao banco de dados
* 
* @param string $query-  Query de consulta ao banco de dados
* @param string $fetch- "row" para resultados de unicos e "all" quando a consulta retornar mais resultados
* @return array - retorna um array de dados referente a consulta
* @return false - retorna falso quando a consulta não encontrou resultados
*/
function executeQuery($query, $fetch = "row"){
	require_once 'database.php';
	$pdo = Conexao::getInstance();

	try{

		$sql = $pdo->prepare($query);
		$sql->execute();
		if($sql->rowCount() == 0){
			return false;
		}

		if($fetch == "all"){
			return $sql->fetchAll();
			
		}else{
			return $sql->fetch();
		}

	} catch (PDOException $erro) {
		$return['error'] = $erro->getMessage();
		// echo "<h1><BR><BR>".$return['error']."</h1>";
		return $return;
	}

	
}

function buildCodigoInterno() {
	return mt_rand(1,9999999999);
}

function uploadToS3($FILE) {

	$file_temp  = urldecode($FILE["name"]);

	if(strpos($file_temp, '?') !== false) {
		$exp        = explode('?', $file_temp);
		$file_temp  = $exp[0];
	}

		$exp        = explode('.', $file_temp);
		$extension  = $exp[sizeof($exp)-1];

	 $file_temp_name = md5(date('Y-m-d H:i:s')).'.'.$extension;
	 $folder_temp    = 'temp/';

	 if(move_uploaded_file($FILE["tmp_name"], $folder_temp.$file_temp_name)) {

			 // < ###### AWS ######
			 /*
				$s3 = Aws\S3\S3Client::factory(array(
					'version' => 'latest',
					'region'  => 'us-west-2',
					'credentials' => array(
							'key'     => 'AKIAJH2CNFJD7XTLX55A',
							'secret'  => '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'
					)
				));
			 */

			 $s3 = Aws\S3\S3Client::factory(array(
					'version' => 'latest',
					'region'  => 'us-west-2',
					'credentials' => array(
							'key'     => 'AKIAI77IJJQFGKJN6RCQ',
							'secret'  => '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'
					)
				));

				try {
						 $result = $s3 -> putObject(array(
								 'Bucket' 		=> 'digitalizadorpro',
								 'Key'    		=> $file_temp_name,
								 'SourceFile' => $folder_temp.$file_temp_name,
								 'ACL'    		=> 'public-read'
						 ));

						@unlink($folder_temp.$file_temp_name);

				$head 	 = array('type' => true);
					$response = $result['ObjectURL'];

				 } catch (Aws\S3\Exception\S3Exception $e) {
						 $head 		= array(
								 'type' => false,
								 'AWS'  => $e -> getMessage()
						 );
						 $response = 'Erro - Houve um problema ao enviar a imagem a AWS.';
					}

			 // > ###### AWS ######

	 } else {
			 $head 		= array('type' => false);
			 $response = 'Erro - Não conseguimos receber seu arquivo, tente novamente.';
	 }
	 
	 return array(
		'head'		=> $head,
		'response'	=> $response
	);

}

function fecha($Jfecha,$Jtipo) {

if ($Jtipo==1) return (substr($Jfecha,8,2)."/".substr($Jfecha,5,2)."/".substr($Jfecha,0,4));
if ($Jtipo==0) return (substr($Jfecha,6,4)."-".substr($Jfecha,3,2)."-".substr($Jfecha,0,2));

return ;
}


function fecha_hora($Jfecha,$Jtipo) {

if ($Jtipo==1) $Xfecha=(substr($Jfecha,8,2)."/".substr($Jfecha,5,2)."/".substr($Jfecha,0,4));
if ($Jtipo==0) $Xfecha=(substr($Jfecha,6,4)."-".substr($Jfecha,3,2)."-".substr($Jfecha,0,2));

$Xfecha=$Xfecha." ".substr($Jfecha,11,5);
return $Xfecha;

}

function resizeImage($file, $new_width = 640, $qualidade = 90) {

	if (empty($file)) return "--";

	$path_full_img = $file;
	list($width, $height) = getimagesize($path_full_img);

	if($width > $new_width) {

		$valor 		  = $new_width / $width;
		$new_height = $height * $valor;

		try {

			$oImg = new m2brimagem();
			$oImg -> carrega($path_full_img);

			$valida = $oImg -> valida();

			if($valida == 'OK') {
				$oImg -> redimensiona($new_width, $new_height);
				$oImg -> grava($path_full_img, $qualidade);

				return $file;
			} else {
				return false;
			}

		} catch (Exception $e) {
			//echo 'Exceção capturada: ',  $e->getMessage(), "\n";
			return false;
		}

	} else {
		return $file;
	}

}

function buildIdKey($Xdigitos) {

	 $CaracteresAceitos = 'AQWERTYUIOPLKJHGFDSZXCVBNM0123456789';
	 $Xretorno="";

	 for($i=0; $i < $Xdigitos; $i++) $Xretorno.= $CaracteresAceitos[mt_rand(0, strlen($CaracteresAceitos)-1)];  

	 return $Xretorno;

}

function buildNum($Xdigitos)
{
		$CaracteresAceitos = '0123456789';
		$Xretorno="";
		for($i=0; $i < $Xdigitos; $i++) $Xretorno.= $CaracteresAceitos[mt_rand(0, strlen($CaracteresAceitos)-1)];  
		return $Xretorno;
}


function encrypt($frase, $crypt){
	$chave   = CHAVE_CRIPTOGRAFIA;
		$retorno = "";

		if ($frase=='') return '';

		if($crypt){
			$string = $frase;
			$i = strlen($string)-1;
			$j = strlen($chave);
			do{
					$retorno .= ($string[$i] ^ $chave[$i % $j]);
			}while ($i--);

			$retorno = strrev($retorno);
			$retorno = base64_encode($retorno);
		}else{
			$string = base64_decode($frase);
			$i = strlen($string)-1;
			$j = strlen($chave);

			do{
					$retorno .= ($string[i] ^ $chave[$i % $j]);
			}while ($i--);

			$retorno = strrev($retorno);
		}
		return $retorno;
}

function permiteAcesso($tipo) {
	$acesso = $_SESSION['usuario']['nivel'];

	if($acesso != $tipo)
		header('Location: '.WEBSITE);
}

/***
* Funcao que verifica se o usuario esta logado no sistema ou nao
* 
* @param $type - redirect = para redirecionar o usuario para a pagina de login quando resultado for falso; valid - para retornar boolean com o resultado da verificacao
*/

function checkUsuarioLogado($type = 'redirect', $Xlog = true) {

	 $Xsessao_login = $_SESSION['usuario'];

	 switch (strtolower($type)) 
	 {
			case 'redirect':

				if(!empty($Xsessao_login))
				{
					require_once("database.php");
					$usu2Query="select id_key from usuarios where id_key='".$_SESSION['usuario']['id_key']."' limit 1";
					$usu3=executeQuery($usu2Query);
					 
					if(!empty($usu3['id_key']))
					{
						sleep(@$_SESSION['bloqueio']);
						if($Xlog)
							registra_log();
						return true;
					}
					else header('Location: ../acesso');
				}
				else 
				{
						if (!empty(@$_COOKIE['id_key']))
						{
							require_once("database.php");
							$usu2Query="select * from usuarios where id_key='".$_COOKIE['id_key']."' limit 1";
							$usu3=executeQuery($usu2Query);
							
							if(!empty($usu3['id_key']))
							{
								session_start();
								$_SESSION['usuario']=$usu3;
								$_SESSION['Xusuario'] = $_COOKIE['Xusuario'];
								$_SESSION['id_key_cliente']=$_COOKIE['id_key_cliente'];
								$_SESSION['codigo_int']=$_COOKIE['codigo_int'];
								$_SESSION['id_key']=$_COOKIE['id_key'];
								$_SESSION['nome']=$_COOKIE['nome'];
								$_SESSION['foto']=$_COOKIE['foto'];
								$_SESSION['codigo_pais']=$_COOKIE['codigo_pais'];
								$_SESSION['codigo_estado']=$_COOKIE['codigo_estado'];
								$_SESSION['zona']=$_COOKIE['zona'];
								$_SESSION['id_key_sistema']=$_COOKIE['id_key_sistema'];
								$_SESSION['nivel']=$_COOKIE['nivel'];

								sleep($_SESSION['bloqueio']);
								if($Xlog)
									registra_log();
								return true;
							}
							else header('Location: ../acesso');
						}
						//else header('Location: http://osmap.net/acesso');
// 						else header('Location: http://carlos-ti.com/osmap2.0');
					 	else header('Location: ../acesso');
				 }

				 break;

			default:

				if(!empty($Xsessao_login))
				{
					require_once("database.php");
					$usu2Query="select id_key from usuarios where id_key='".$_SESSION['usuario']['id_key']."' limit 1";
					$usu3=executeQuery($usu2Query);
					
					if(!empty($usu3['id_key']))
						return true;
					else
						return false;
				}
				else 
				{
						if (!empty(@$_COOKIE['id_key']))
						{
							require_once("database.php");
							$usu2Query="select * from usuarios where id_key='".$_COOKIE['id_key']."' limit 1";
							$usu3=executeQuery($usu2Query);
							
							if(!empty($usu3['id_key']))
							{
								session_start();
								$_SESSION['usuario']=$usu3;
								$_SESSION['Xusuario'] = $_COOKIE['Xusuario'];
								$_SESSION['id_key_cliente']=$_COOKIE['id_key_cliente'];
								$_SESSION['codigo_int']=$_COOKIE['codigo_int'];
								$_SESSION['id_key']=$_COOKIE['id_key'];
								$_SESSION['nome']=$_COOKIE['nome'];
								$_SESSION['foto']=$_COOKIE['foto'];
								$_SESSION['codigo_pais']=$_COOKIE['codigo_pais'];
								$_SESSION['codigo_estado']=$_COOKIE['codigo_estado'];
								$_SESSION['zona']=$_COOKIE['zona'];
								$_SESSION['id_key_sistema']=$_COOKIE['id_key_sistema'];
								$_SESSION['nivel']=$_COOKIE['nivel'];

								return true;
							}
							else return false;
						}
						else return false;
				 }

				 break;
	 }

}

/***
* Funcao que retorna o ip do usuario
*/

function getIp() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			 $ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
		else
				$ipaddress = 'UNKNOWN';
		return $ipaddress;
}

/***
* Retorna as listas dos quais o usuario informado tem acesso
* 
* @param string $id_key_usuario -  id key do usuario
* @param string $meuTipo - informar algum destes coforme seu tipo: imobiliaria, corretor, contrutora
* @param string $tipoLista - informar algum destes coforme seu tipo: imovel, veiculo
* @return array - todas as informacoes das listas dos quais esta associado
*/


/*************************************************
*Retornar a URL atual
**************************************************/
function UrlAtual(){
	$dominio= $_SERVER['HTTP_HOST'];
	$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	return $url;
}

/*************************************************
*Retornar navegado ou browser $tipo = browser "ou" SO
**************************************************/
function VerificaNavegadorSO($tipo="browser") {
		$ip = $_SERVER['REMOTE_ADDR'];

		$u_agent = $_SERVER['HTTP_USER_AGENT'];
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";

		if (preg_match('/linux/i', $u_agent)) {
				$platform = 'Linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
				$platform = 'Mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
				$platform = 'Windows';
		}


		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
		{
				$bname = 'Internet Explorer';
				$ub = "MSIE";
		}
		elseif(preg_match('/Firefox/i',$u_agent))
		{
				$bname = 'Mozilla Firefox';
				$ub = "Firefox";
		}
		elseif(preg_match('/Chrome/i',$u_agent))
		{
				$bname = 'Google Chrome';
				$ub = "Chrome";
		}
		elseif(preg_match('/AppleWebKit/i',$u_agent))
		{
				$bname = 'AppleWebKit';
				$ub = "Opera";
		}
		elseif(preg_match('/Safari/i',$u_agent))
		{
				$bname = 'Apple Safari';
				$ub = "Safari";
		}

		elseif(preg_match('/Netscape/i',$u_agent))
		{
				$bname = 'Netscape';
				$ub = "Netscape";
		}

		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
		}


		$i = count($matches['browser']);
		if ($i != 1) {
				if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
						$version= $matches['version'][0];
				}
				else {
						$version= $matches['version'][1];
				}
		}
		else {
				$version= $matches['version'][0];
		}

		// check if we have a number
		if ($version==null || $version=="") {$version="?";}

		$Browser = array(
						'userAgent' => $u_agent,
						'name'      => $bname,
						'version'   => $version,
						'platform'  => $platform,
						'pattern'    => $pattern
		);

		if($tipo == "browser")
	{
		return $navegador = $Browser['name']." - ".$Browser['version'];
	}
	else
	{
		return $so = $Browser['platform'];
	}

}

/*
 * Função formatar_tempo()
 * 
 * Está função retorna o tempo em que determinada ação ocorreu.
 * 
 * 
 */

function formatar_tempo($timeBD) {

	$timeNow = time();
	$timeRes = $timeNow - $timeBD;
	$nar = 0;

	// variável de retorno
	$r = "";

	// Agora
	if ($timeRes == 0){
		$r = "agora";
	} else
	// Segundos
	if ($timeRes > 0 and $timeRes < 60){
		$r = $timeRes. " segundos atr&aacute;s";
	} else
	// Minutos
	if (($timeRes > 59) and ($timeRes < 3599)){
		$timeRes = $timeRes / 60;	
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " minuto atr&aacute;s";
		} else {
			$r = round($timeRes,$nar). " minutos atr&aacute;s";
		}
	}
	 else
	// Horas
	// Usar expressao regular para fazer hora e MEIA
	if ($timeRes > 3559 and $timeRes < 85399){
		$timeRes = $timeRes / 3600;

		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " hora atr&aacute;s";
		}
		else {
			$r = round($timeRes,$nar). " horas atr&aacute;s";		
		}
	} else
	// Dias
	// Usar expressao regular para fazer dia e MEIO
	if ($timeRes > 86400 and $timeRes < 2591999){

		$timeRes = $timeRes / 86400;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " dia atr&aacute;s";
		} else {

			preg_match('/(\d*)\.(\d)/', $timeRes, $matches);

			if ($matches[2] >= 5) {
				$ext = round($timeRes,$nar) - 1;

				// Imprime o dia
				$r = $ext;

				// Formata o dia, singular ou plural
				if ($ext >= 1 and $ext < 2){ $r.= " dia "; } else { $r.= " dias ";}

				// Imprime o final da data
				$r.= "&frac12; atr&aacute;s";


			} else {
				$r = round($timeRes,0) . " dias atr&aacute;s";
			}

		}		

	} else
	// Meses
	if ($timeRes > 2592000 and $timeRes < 31103999){

		$timeRes = $timeRes / 2592000;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " mes atr&aacute;s";
		} else {

			preg_match('/(\d*)\.(\d)/', $timeRes, $matches);

			if ($matches[2] >= 5){
				$ext = round($timeRes,$nar) - 1;

				// Imprime o mes
				$r.= $ext;

				// Formata o mes, singular ou plural
				if ($ext >= 1 and $ext < 2){ $r.= " mes "; } else { $r.= " meses ";}

				// Imprime o final da data
				$r.= "&frac12; atr&aacute;s";
			} else {
				$r = round($timeRes,0) . " meses atr&aacute;s";
			}

		}
	} else
	// Anos
	if ($timeRes > 31104000 and $timeRes < 155519999){

		$timeRes /= 31104000;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " ano atr&aacute;s";
		} else {
			$r = round($timeRes,$nar). " anos atr&aacute;s";
		}
	} else
	// 5 anos, mostra data
	if ($timeRes > 155520000){

		$localTimeRes = localtime($timeRes);
		$localTimeNow = localtime(time());

		$timeRes /= 31104000;
		$gmt = array();
		$gmt['mes'] = $localTimeRes[4];
		$gmt['ano'] = round($localTimeNow[5] + 1900 - $timeRes,0);				

		$mon = array("Jan ","Fev ","Mar ","Abr ","Mai ","Jun ","Jul ","Ago ","Set ","Out ","Nov ","Dez "); 

		$r = $mon[$gmt['mes']] . $gmt['ano'];
	}

	return $r;

}

/***************************
* Validar Hora informada
****************************/
function validaHora($tempo)
{
	$hora = substr("$tempo", 0,2);
	$minuto = substr("$tempo", 3,2);
	$segundo = substr("$tempo", 6,2);

	if (($hora > "23") OR ($minuto > "59") OR ($segundo > 59)) 
	{
		return false;
	} 
	else 
	{
		return true;
	}
}

function formatar_tempo_atras($data_db) {

		$dataatual = date('Y-m-d H:i:s');
		
		if ($data_db>$dataatual) return "";

		$tempo = strtotime($dataatual)-strtotime($data_db);

		//Verifica o tempo restante em segundos e depois transforma em dias, meses, anos, etc...
		if($tempo < 60) {
			$tempo = $tempo . ".segundos";
		} elseif($tempo > 59 && $tempo < 120) {
			$tempo = $tempo/60 . ".minuto";
		} elseif($tempo > 119 && $tempo < 3600) {
			$tempo = $tempo/60 . ".minutos";
		} elseif($tempo > 3599 && $tempo < 7200) {
			$tempo = $tempo/60/60 . ".hora";
		} elseif($tempo > 7199 && $tempo < 86400) {
			$tempo = $tempo/60/60 . ".horas";
		} elseif($tempo > 86399 && $tempo < 172800) {
			$tempo = $tempo/60/60/24 . ".dia";
		} elseif($tempo > 172799 && $tempo < 5184000) {
			$tempo = $tempo/60/60/24 . ".dias";
		} elseif($tempo > 5183999 && $tempo < 10368000) {
			$tempo = $tempo/60/60/24/30 . ".mês";
		} elseif($tempo > 10367999 && $tempo < 62208000) {
			$tempo = $tempo/60/60/24/30/12 . ".meses";
		} elseif($tempo > 62207999 && $tempo < 124416000) {
			$tempo = $tempo/60/60/24/30/12/12 . ".ano";
		} elseif($tempo > 124415999) {
			$tempo = $tempo/60/60/24/30/12/12 . ".anos";
		}

		//Retira os "quebrados" da divisão
		$tempo = explode('.', $tempo);

		if(empty(@$tempo['2']))
			 @$tempo['2'] = ".segundos";

		return @$tempo['0'] . " " . @$tempo['2'] . " atrás \n";
	 }

function geocode($address){

		$address = urlencode($address);

		$url = "http://maps.google.com/maps/api/geocode/json?address={$address}";

		$resp_json = file_get_contents($url);

		$resp = json_decode($resp_json, true);

		if($resp['status']=='OK'){

				$lati = $resp['results'][0]['geometry']['location']['lat'];
				$longi = $resp['results'][0]['geometry']['location']['lng'];
				$formatted_address = $resp['results'][0]['formatted_address'];

				if($lati && $longi && $formatted_address){

						$data_arr = array();            

						array_push(
								$data_arr, 
										$lati, 
										$longi, 
										$formatted_address
								);

						return $data_arr;

				}else{
						return false;
				}

		}else{
				return false;
		}
}
/***
* Retorna todos os imoveis compartilhados por grupos dos quais ele ja esta participando
* 
* @param string $texto -  string a ser cortada
* @param int $tamanho - tamanho maximo de caracteres
* @return string - retorna a string cortada
*/
function substrString($texto, $tamanho)
{
	$texto_tamanho = strlen($texto);
	if($texto_tamanho > $tamanho)
	{
		$novo_texto = substr($texto, 0, $tamanho);
		return $novo_texto."...";
	}
	return $texto;
}


class valida_email {

		private $options = array(
						"port" => 25,
						"timeout" => 1,  // Connection timeout to remote mail server.
						"sender" => "info@webtrafficexchange.com",
						"short_response" => false,
		);

		/**
		 *  Override the options for those specified.
		 */
		function __construct($options = null) {
				if (!empty($options)) {
						if (is_array($options)) {
								foreach ($options as $key => $value) {
										$this->options[$key] = $value;
								}
						}
				}
		}

		/**
		 *  Validate the email address via SMTP.
		 *  If 'shore_response' is true, the method will return true or false;
		 *  Otherwise, the entire array of useful information will be provided.
		 */
		public function validate($email, $options = null) {

				$result = array("valid" => false);
				$errors = array();

				// Email address (format) validation
				if (empty($email)) {
						$errors = array("Email address is required.\n");
				} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						$errors = array("Invalid email address.\n");
				} else {
						list($username, $hostname) = split('@', $email);
						if (function_exists('getmxrr')) {
								if (getmxrr($hostname, $mxhosts, $mxweights)) {
										$result['mx_records'] = array_combine($mxhosts, $mxweights);
										asort($result['mx_records']);
								} else {
										$errors = "No MX record found.";
								}
						}

						foreach ($mxhosts as $host) {
								$fp = @fsockopen($host, $this->options['port'], $errno, $errstr, 
																			 $this->options['timeout']);
								if ($fp) {
										$data = fgets($fp);
										$code = substr($data, 0, 3);
										if($code == '220') {
												$sender_domain = split('@', $this->options['sender']);
												fwrite($fp, "HELO {$sender_domain}\r\n");
												fread($fp, 4096);
												fwrite($fp, "MAIL FROM: <{$this->options['sender']}>\r\n");
												fgets($fp);
												fwrite($fp, "RCPT TO:<{$email}>\r\n");
												$data = fgets($fp);
												$code = substr($data, 0, 3);
												$result['response'] = array("code" => $code, "data" => $data);
												fwrite($fp, "quit\r\n");
												fclose($fp);
												switch ($code) {
														case "250":  // We're good, so exit out of foreach loop
														case "421":  // Too many SMTP connections
														case "450":
														case "451":  // Graylisted
														case "452":
																$result['valid'] = true;
																break 2;  // Assume 4xx return code is valid.
														default:
																$errors[] = "({$host}) RCPT TO: {$code}: {$data}\n";
												}
										} else {
												$errors[] = "MTA Error: (Stream: {$data})\n";
										}
								} else {
										$errors[] = "{$errno}: $errstr\n";
								}
						}
				}
				if (!empty($errors)) {
						$result['errors'] = $errors;
				}
				return ($this->options['short_response']) ? $result['valid'] : $result;
		}
}


function checkModulo($Xmodulo=array())
{
	if(!in_array($_SESSION['modulo_ativo'],$Xmodulo) and false) // carlos deshabilitado... 
	{
		// adicionar no log passando a $_SESSION,$Xobs.....
		$Xdados['codigo_int'] = $_SESSION['codigo_int'];
		$Xdados['id_key_usuario'] = $_SESSION['usuario']['id_key'];
		$Xdados['perigo'] = "on";
		$Xobs = "Bloqueio a tentativa de acesso, script do módulo não liberado.";
		add_log($Xdados, $Xobs);

		//echo "Você não tem acesso a essa página, aguarde para ser redirecioando...";

		echo "
		<script>
			location.href = 'redireciona.php';
		</script>
		";
		exit();
		// fazer pagina de redirect...
	}

}

function add_log($Xdados, $Xobs)
{

    // include('database.php');

	/*
	$insert=executeQuery("insert into log_customers 
								set id_key='".buildIdKey(30)."',
										codigo_int='".@$Xdados['codigo_int']."', 
										ip='".getIp()."',
										origem='W',
										obs='".$Xobs."', 
										perigo='".$Xdados['perigo']."',
										id_key_usuario='".@$Xdados['id_key_usuario']."' ");

    if ($insert['error']) die("Error add log ".$insert['error']);
	return ;
	*/

}

function post_log($Xtipo_mov,$Xobs)
{

	$id_key_usuario = $_SESSION['usuario']['id_key'];
	$id_key_cliente = $_SESSION['id_key_cliente'];
	
	$insert=executeQuery("insert into 
										logs 
									SET
									    id_key='".buildIdKey(30)."',
									    id_key_cliente='".$id_key_cliente."',
									    id_key_usuario='".$id_key_usuario."',
									    tipo_mov='".$Xtipo_mov."',
									    obs='".$Xobs."', 
										fecha='".date("Y-m-d H:i")."', 
										ip='".getIp()."' ");

    if (@$insert['error']) die("Error insert log ".$insert['error']);
    
	return ;

}

function number_formatBR($Xvalor,$Xdecimals=2)
{

		$Xvalor2=number_format($Xvalor,$Xdecimals);
		$Xvalor2=str_replace(",","#",$Xvalor2);
		$Xvalor2=str_replace(".",",",$Xvalor2);
		$Xvalor2=str_replace("#",".",$Xvalor2);

		return $Xvalor2;

}

function strzero($Xvalor,$Xdecimal)
{

return str_pad($Xvalor, $Xdecimal, '0', STR_PAD_LEFT);

}

function limpa_email($Xemail)
{

		$Xvalidos="1234567890qwertyuiopasdfghjklzxcvbnm@-_.*";

		$Xretorno="";

		for ($gg=1;$gg<=strlen($Xemail);$gg++)
		{
			 if(eregi(substr($Xemail,$gg-1,1), $Xvalidos)) $Xretorno.=substr($Xemail,$gg-1,1);
		}

		return $Xretorno;

}

function distancia($lat1, $lon1, $lat2, $lon2, $unit = '') 
{
	/*
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);

		if ($unit == "K") {
				return round(($miles * 1.609344),2); 
		} else if ($unit == "N") {
				return round(($miles * 0.8684),2);
		} else {
				return round($miles,2);
		}
	*/
	$d2r = 0.017453292519943295769236;

	$dlong = ($lon2 - $lon1) * $d2r;
	$dlat = ($lat2 - $lat1) * $d2r;

	$temp_sin = sin($dlat/2.0);
	$temp_cos = cos($lat1 * $d2r);
	$temp_sin2 = sin($dlong/2.0);

	$a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
	$c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));
	return round(6368.1 * $c,2);
}

// echo distancia(-12.971683, -38.460108, -12.981290, -38.981290, "K") . " Km<br />";

function validarCPF2( $cpf = '' ) 
{ 

	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
	// Verifica se nenhuma das sequ�ncias abaixo foi digitada, caso seja, retorna falso
	if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
		return FALSE;
	} else { // Calcula os n�meros para verificar se o CPF � verdadeiro
		for ($t = 9; $t < 11; $t++) {
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $cpf[$c] * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($cpf[$c] != $d) {
				return FALSE;
			}
		}
		return TRUE;
	}
}

function validaCNPJ($cnpj = '') 
{
	$cnpj = str_pad(preg_replace('/[^0-9]/', '', $cnpj), 14, '0', STR_PAD_LEFT);
	if (strlen($cnpj) <> 14)
		return false; 

	$soma = 0;

	$soma += ($cnpj[0] * 5);
	$soma += ($cnpj[1] * 4);
	$soma += ($cnpj[2] * 3);
	$soma += ($cnpj[3] * 2);
	$soma += ($cnpj[4] * 9); 
	$soma += ($cnpj[5] * 8);
	$soma += ($cnpj[6] * 7);
	$soma += ($cnpj[7] * 6);
	$soma += ($cnpj[8] * 5);
	$soma += ($cnpj[9] * 4);
	$soma += ($cnpj[10] * 3);
	$soma += ($cnpj[11] * 2); 

	$d1 = $soma % 11; 
	$d1 = $d1 < 2 ? 0 : 11 - $d1; 

	$soma = 0;
	$soma += ($cnpj[0] * 6); 
	$soma += ($cnpj[1] * 5);
	$soma += ($cnpj[2] * 4);
	$soma += ($cnpj[3] * 3);
	$soma += ($cnpj[4] * 2);
	$soma += ($cnpj[5] * 9);
	$soma += ($cnpj[6] * 8);
	$soma += ($cnpj[7] * 7);
	$soma += ($cnpj[8] * 6);
	$soma += ($cnpj[9] * 5);
	$soma += ($cnpj[10] * 4);
	$soma += ($cnpj[11] * 3);
	$soma += ($cnpj[12] * 2); 


	$d2 = $soma % 11; 
	$d2 = $d2 < 2 ? 0 : 11 - $d2; 

	if ($cnpj[12] == $d1 && $cnpj[13] == $d2) {
		return true;
	}
	else {
		return false;
	}
} 

/***
* Funcao que verifica se o usuario tem acesso a uma determinada página
* 
* @param $nivel para verificar o nível de acesso do usuário e redirecionar, caso seja necessário
*/

function checkAcessoUsuario($nivel = '2') {

	 $Xacesso = @$_SESSION['usuario']['acesso'];

	if($Xacesso <= $nivel) 
		return true;
	else 
		//header('Location: '.WEBSITE.'pages/osmap.php');
		header('Location: ../acesso');

}

/***
* Funcao que verifica se o usuario tem acesso ao modulo para acessar a página
* 
* @param $campo para verificar o modulo de acesso do usuário e redirecionar, caso seja necessário
*/
function checkModuloUsuario($campo) {

	$Xpermissao = $_SESSION['usuario']['modulo_'.$campo];

	//Se não está habilitado o módulo, então redireciona
	if($Xpermissao != 'on') 
		return true;
	else 
		return false;
		//header('Location: '.WEBSITE.'pages/osmap.php');
}

function checkModuloAcessoUsuario($campo) {

	$Xpermissao = $_SESSION['modulo'][$campo];

	//Se está habilitado o acesso ao módulo
	if($Xpermissao == 'on') 
		return true;
	else 
		return false;
		//header('Location: '.WEBSITE.'pages/osmap.php');
}


function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

	// Lista de CNPJs inválidos
	$invalidos = [
		'00000000000000',
		'11111111111111',
		'22222222222222',
		'33333333333333',
		'44444444444444',
		'55555555555555',
		'66666666666666',
		'77777777777777',
		'88888888888888',
		'99999999999999'
	];

	// Verifica se o CNPJ está na lista de inválidos
	if (in_array($cnpj, $invalidos)) {
		return false;
	}
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}

function validaCPF($cpf) {

		// Extrai somente os números
		$cpf = preg_replace( '/[^0-9]/is', '', $cpf );

		// Verifica se foi informado todos os digitos corretamente
		if (strlen($cpf) != 11) {
				return false;
		}
		// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
		if (preg_match('/(\d)\1{10}/', $cpf)) {
				return false;
		}
		// Faz o calculo para validar o CPF
		for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
						$d += $cpf[$c] * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf[$c] != $d) {
						return false;
				}
		}
		return true;
}

function registra_log()
{

///

}

function format_whatsapp($Xcelular)
{

		$Xcelular=str_replace(["/","-","*","{","}"," ",".",",","(",")"],"",$Xcelular);
		if (substr($Xcelular,0,1)=="0") $Xcelular=trim(substr($Xcelular,1,15));
		$Xcelular="55".intval($Xcelular);
		return $Xcelular;

}

function dia_semana_extenso($Xdia)
{
	$extenso = '';
	switch($Xdia)
	{
		case '0':
			$extenso = 'Domingo';
			break;
			
		case '1':
			$extenso = 'Segunda-feira';
			break;
			
		case '2':
			$extenso = 'Terça-feira';
			break;
			
		case '3':
			$extenso = 'Quarta-feira';
			break;
			
		case '4':
			$extenso = 'Quinta-feira';
			break;
			
		case '5':
			$extenso = 'Sexta-feira';
			break;
			
		case '6':
			$extenso = 'Sábado';
			break;
	}
	return $extenso;
}

function calculaidade($Xfnac,$Xhoje)
{
	$date2 = $Xhoje;
	$diff = abs(strtotime($date2) - strtotime($Xfnac));
	$years = floor($diff / (365*60*60*24));
	$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

	return $years;
}

function mes_extenso($Xmes)
{
	$extenso = '';
	$Xmes=intval($Xmes);
	switch($Xmes)
	{
		case 1:
			$extenso = 'Janeiro';
			break;
			
		case 2:
			$extenso = 'Fevereiro';
			break;
			
		case 3:
			$extenso = 'Março';
			break;
			
		case 4:
			$extenso = 'Abril';
			break;
			
		case 5:
			$extenso = 'Maio';
			break;
			
		case 6:
			$extenso = 'Junho';
			break;
			
		case 7:
			$extenso = 'Julho';
			break;
			
		case 8:
			$extenso = 'Agosto';
			break;
			
		case 9:
			$extenso = 'Setembro';
			break;
			
		case 10:
			$extenso = 'Outubro';
			break;
			
		case 11:
			$extenso = 'Novembro';
			break;
			
		case 12:
			$extenso = 'Dezembro';
			break;
	}
	return $extenso;
}


/***
* Funcao para upload do arquivo local para a AWS
* 
* @param $filepath - caminho do arquivo local
* @param $keyname - chave/nome para o arquivo remoto
* @param $bucket - bucket que será gravado o arquivo
*
* return link da AWS caso seja feito upload com sucesso ou false em caso contrário
*/
function add_amazon($filepath, $keyname, $bucket = 'vox4you')
{
	require __DIR__.'/aws/vendor/autoload.php';
	//require_once $_SERVER['DOCUMENT_ROOT']."/cw3/osmapCERT/painel2.0/inc/aws/vendor/autoload.php";

	//use Aws\S3\S3Client;
	//use Aws\S3\Exception\S3Exception;

 	$s3 = Aws\S3\S3Client::factory(array(
		'version' => 'latest',
		'region'  => 'us-west-2',
		'credentials' => array(
				'key'     => 'AKIASR2XOPKRWC66MG43',
				'secret'  => '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'
		)
	));

	try {
		$result = $s3->putObject(array(
				'Bucket' 		=> $bucket,
				'Key'    		=> $keyname,
				'SourceFile'  => $filepath,
				'ACL'    		=> 'public-read'
		));

		if($result['@metadata']['statusCode'] == '200')
		{
			//Apaga o arquivo local
			@unlink($filepath);
			return $result['ObjectURL'];
		}
		else
			return false;

	} catch (S3Exception $e) {
		//echo $e->getMessage() . "\n";
		return false;
	}
}

function add_file_digital($filepath, $keyname, $bucket = 'sesmti')
{
	require __DIR__.'/aws/vendor/autoload.php';
	//require_once $_SERVER['DOCUMENT_ROOT']."/cw3/osmapCERT/painel2.0/inc/aws/vendor/autoload.php";

	//use Aws\S3\S3Client;
	//use Aws\S3\Exception\S3Exception;

 	$s3 = Aws\S3\S3Client::factory(array(
		'version' => 'latest',
		'region'  => 'us-west-2',
		'credentials' => array(
				'key'     => 'AKIASR2XOPKRWC66MG43',
				'secret'  => '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'
		)
	));

	try {
		$result = $s3->putObject(array(
				'Bucket' 		=> $bucket,
				'Key'    		=> $keyname,
				'SourceFile'  => $filepath,
				'ACL'    		=> 'public-read'
		));

		if($result['@metadata']['statusCode'] == '200')
		{
			//Apaga o arquivo local
			@unlink($filepath);
			return $result['ObjectURL'];
		}
		else
			return false;

	} catch (S3Exception $e) {
		//echo $e->getMessage() . "\n";
		return false;
	}
}



function Xprint_r($array,$titulo="Titulo",$die=false,$Xformato="P")
{

    echo "<h1>".$titulo."</h1>";
    echo "<pre>";
    if ($Xformato=="P") print_r($array);
    else						 var_dump($array);
    echo "</pre>";

    if ($die) die("Termino....");

}

function Zprint_r($Xarray)
{

   echo "<pre>";
   print_r($Xarray);
   echo "</pre>";

}

function validar_email($email) 
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function verificar_acesso()
{

// aqui verificamos o acesso via session de usuarios
// verificaremos se o session_id corresponde ao campo salvo dentro do usuario.
// caso tenha suspeita vamos salvar o IP somando a tentativa, se tem tentativa > 5 enviamos para bloquieo.

return true;

}

function bloquieo_ip($Xip)
{

///  buscamos dentro do banco de dados 
/// bloqueamos e depois salvamos o dado dentro do arquivo data e hora do bloqueio.

}

?>
