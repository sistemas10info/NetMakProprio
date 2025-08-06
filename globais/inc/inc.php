<?php 
	@session_start();
	
	if (@$Xerror or @$Xerro)
	{
	    ini_set('display_errors', 1);
	    ini_set('display_startup_errors', 1);
	    error_reporting(E_ALL);	
    }
    
    // Carlos para querys grandes
    ini_set('memory_limit', '-1');
    
    header('Content-Type: text/html; charset=utf-8');
    
    require_once 'constantes.php';
    
    if (@$xqrcode)
    {
         require_once "phpqrcode/qrlib.php";
    }
    
	// < Nao exibe quando for requests ajax
	if(strpos($_SERVER['PHP_SELF'], 'json') === false)
	{
		echo '<script>var WEBSITE           = "'.WEBSITE.'"</script>';
		echo '<script>var WEBSITE_ROOT = "'.WEBSITE_ROOT.'"</script>';
    }
	// > Nao exibe quando for requests ajax
	
	// INCLUDES
	
	require_once 'database.php';
	require_once 'm2brimagem/m2brimagem.class.php';
	require_once 'functions.php';

	// verifico o acesso se é suspeito 
	$Xverifica=verificar_acesso();
	
	if (!$Xverifica) die('*-*');
	
	// Tipo de agenda.
	
	// as funções de whatsapp....
	require_once 'func_whatsapp.php';
	
	
?>