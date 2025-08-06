<?php 
	@session_start();
	
	if (@$Xerror)
	{
	    ini_set('display_errors', 1);
	    ini_set('display_startup_errors', 1);
	    error_reporting(E_ALL);	
    }
    
    header('Content-Type: text/html; charset=utf-8');
    
    require_once 'constantes.php';
    
	// < Nao exibe quando for requests ajax
	if(strpos($_SERVER['PHP_SELF'], 'json') === false)
	{
		echo '<script>var WEBSITE           = "'.WEBSITE.'"</script>';
		echo '<script>var WEBSITE_ROOT = "'.WEBSITE_ROOT.'"</script>';
    }
	// > Nao exibe quando for requests ajax
	
	// INCLUDES
	
	
	
	require_once 'database_carlos-ti.php';
	require_once 'm2brimagem/m2brimagem.class.php';
	require_once 'functions.php';
	
	// Tipo de agenda.
	
?>