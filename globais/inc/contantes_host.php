<?

    $Xsite="vox4you.com.br";
    	
	// DEFINES
	define('WEBSITE_ROOT', 'https://'.$Xsite.'/');
	define('WEBSITE_CONSULTA', 'https://'.$Xsite.'/consultas/');
	define('BUILDER_IMAGE_URL', 'https://'.$Xsite.'/consultas/imagem.php?id_key=');
	define('FOLDER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/cw3/vox4youDEV/painel2.0/');
	define('MURAL_UPLOAD', $_SERVER['DOCUMENT_ROOT'].'/cw3/vox4youDEV/files_mural/');
	define('WEBSITE_MURAL', 'https://'.$Xsite.'/cw3/vox4youDEV/files_mural/');
	
	define('WEBSITE_ACESSO', 'https://vox4you.com.br/acessodev');
	
	define('IMAGENS_APP', '/var/www/html/cw3/vox4youDEV/imagens/app/');
	define('LINK_IMAGENS_APP', WEBSITE_ROOT.'/cw3/vox4youDEV/imagens/app/');
	
	define('WEB_IMG', 'https://'.$Xsite.'/cw3/vox4youDEV/painel2.0/upload_files/');
	
	define('WEBSITE', WEBSITE_ROOT.'cw3/vox4youDEV/painel2.0/');
	define('CHAVE_CRIPTOGRAFIA', 'redecorpro334455francinoteste2');
	
	define('EMAIL_NOREPLY', 'no-reply@sindico.net');

    define('PAIS', @$_SESSION['codigo_pais']);
    define('ESTADO',@$_SESSION['codigo_estado']);
		define('MUNICIPIO',@$_SESSION['codigo_municipio']);
    
	define('TECNICOS_SITE',WEBSITE_ROOT."cw3/vox4youDEV/upload_files/web/");
	define('TECNICOS_FOLDER',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/upload_files/web/");
	define('ANEXOS_TEMPORAL_FOLDER',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/upload_files/web/");

	define('CHECK_FOLDER',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/painel2.0/upload_files/checklist/");
	define('LAUDO_FOLDER',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/painel2.0/upload_files/laudos/");
	

    // dados para encriptação....

	define('UPLOAD_TMP',$_SERVER['DOCUMENT_ROOT']."/cw3/namber2SYS/upload_files/tmp/");
	define('UPLOAD_DOWN',$_SERVER['DOCUMENT_ROOT']."/cw3/namber2SYS/upload_files/down/");

	define('HOST', 'localhost:3306');
	define('DBNAME', 'admin_vox4you');
	define('CHARSET', 'utf8');
	define('USER', 'admin_vox4you');
	define('PASSWORD','sJwk38?6');

    /* 

    DEFININDO
    
    CHAVE_CRIPTOGRAFIA1
    CHAVE_CRIPTOGRAFIA2
    CHAVE_FILE
    DEPOSITO_SITE1
    DEPOSITO_SITE2
    DEPOSITO_FOLDER1
    DEPOSITO_FOLDER2
       143.208.
	*/	


   // parece que não pega...
	// include("/var/www/chaves/enc.php");
	
	
	define('CHAVE_CRIPTOGRAFIA1', 'Sesmti2311');
	define('CHAVE_CRIPTOGRAFIA2', 'tisesm22345');
	
	define('CHAVE_FILE', 'spsticarlos22');
	
	// Criar folders....
	define('DEPOSITO_SITE1',WEBSITE_ROOT."cw3/vox4youDEV/deposito1");
	define('DEPOSITO_FOLDER1',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/deposito1");
	
	define('DEPOSITO_SITE2',WEBSITE_ROOT."cw3/namber2SYS/deposito2");
	define('DEPOSITO_FOLDER2',$_SERVER['DOCUMENT_ROOT']."/cw3/vox4youDEV/deposito2");
	
	// echo CHAVE_FILE;

    
    // fim
    

  //Verifica a zona horária
	$Xzona = (!empty(@$_SESSION['zona']) ? @$_SESSION['zona'] : 'America/Sao_Paulo');
  if(@date_default_timezone_get() != $Xzona)
    @date_default_timezone_set($Xzona);
?>