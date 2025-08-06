<?php

    $Xsite='localhost';  
    $Xsystem='NetMakProprio';     
    	
	// DEFINES
	define('COMPARTILHA_LEAD', 'localhost/w.php?i=');
	
	define('WEBSITE_ROOT', 'https://'.$Xsite.'/');
	define('WEBSITE_CONSULTA', 'https://'.$Xsite.'/consultas/');
	define('BUILDER_IMAGE_URL', 'https://'.$Xsite.'/consultas/imagem.php?id_key=');
	define('FOLDER_ROOT', $_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/');
	define('MURAL_UPLOAD', $_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/files_mural/');
	
	define('FOLDER_UPLOAD', $_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/tmp_files/');
	define('WEBSITE_UPLOAD', WEBSITE_ROOT.'/cw3/'.$Xsystem.'/tmp_files/');
	
	define('FOLDER_ROOT_ADMIN', $_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/painel_admin/');
	define('FOLDER_ROOT_VENDEDOR', $_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/painel_vendedor/');
	
	define('LINK_COTACAO', 'https://'.$Xsite.'/C.php?i=');
	define('LINK_ORDEM_DE_COMPRA', 'https://'.$Xsite.'/O.php?i=');
	
	define('WEBSITE_ACESSO', 'https://contarfacil.com.br/acessodev');
	
	define('NOME_SISTEMA', 'Painel Admin');
	
	define('ID_KEY_WHATSAPP', '--');

	define('WEBSITE', WEBSITE_ROOT.'cw3/'.$Xsystem.'/painel_admin/');
	define('CHAVE_CRIPTOGRAFIA', 'Net34effd');
	
	define('EMAIL_NOREPLY', 'no-reply@web.com');

	define('ANEXOS_TEMPORAL_FOLDER',$_SERVER['DOCUMENT_ROOT'].'/cw3/'.$Xsystem.'/upload_files/');

    // dados para encriptação....

	define('HOST', 'localhost:3306');
	define('DBNAME', 'netmakproprio');
	define('CHARSET', 'utf8');
	define('USER', 'netmakproprio');
	define('PASSWORD','123456');
	define('PORTA','3306');
	
	define('CHAVE_CRIPTOGRAFIA1', 'NetKffeses');
	define('CHAVE_CRIPTOGRAFIA2', 'ssdd33@#yyhgt');
	
	define('CHAVE_FILE', 'Cotando434DD');
	
  //Verifica a zona horária
	$Xzona = (!empty(@$_SESSION['zona']) ? @$_SESSION['zona'] : 'America/Sao_Paulo');
	if(@date_default_timezone_get() != $Xzona)
    @date_default_timezone_set($Xzona);
?>