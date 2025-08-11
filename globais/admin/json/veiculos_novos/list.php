<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$Xorder_by = " razao_social ";
$Xrows     = 50;
$Xcurrent  = 1;
$Xlimit_l  = ($Xcurrent * $Xrows) - ($Xrows);
$Xlimit_h  = $Xlimit_l + $Xrows ;

if (isset($_REQUEST['sort']) && is_array($_REQUEST['sort']) )
{
    $Xorder_by = "";
    foreach($_REQUEST['sort'] as $key=> $value)
        $Xorder_by.= " $key $value";
}

$Xwhere=[];

if (isset($_REQUEST['searchPhrase']) )
{
    if(!empty($_REQUEST['searchPhrase']))
	{
		$Xsearch = trim($_REQUEST['searchPhrase']);
    	$Xwhere[] .= "  ( vendedores.razao_social LIKE '%".$Xsearch."%' or 
    							 vendedores.nome LIKE '%".$Xsearch."%' or 
    							 vendedores.nome_empresa LIKE '%".$Xsearch."%' ) ";
	}
}

$Xwhere_busca="";

if (count($Xwhere)>0) $Xwhere_busca=" and ".implode(" and ",$Xwhere);

if (isset($_REQUEST['rowCount']) )
{
    $Xrows = $_REQUEST['rowCount'];
}	

if (isset($_REQUEST['current']) )
{
    $Xcurrent = $_REQUEST['current'];
    $Xlimit_l = ($Xcurrent * $Xrows) - ($Xrows);
    $Xlimit_h = $Xrows ;
}
if ($Xrows==-1)
{
    $Xlimit=""; //no limit
}
else
{
    $Xlimit=" LIMIT $Xlimit_l, $Xlimit_h ";
}

// echo "Busca: ".$Xwhere_busca;

$XqueryCap ="SELECT 
						vendedores.id_key,vendedores.razao_social,vendedores.cpf_cnpj,vendedores.uf,vendedores.cidade,
						estados.nome as Enome,
						(select count(interno) from veiculos where vendedores.id_key=veiculos.id_key_vendedor) as Tanuncios
					 from vendedores 
					 	left join estados on (vendedores.uf=estados.uf)
					 where 
					 	vendedores.apagado=0 ".$Xwhere_busca."
		    		ORDER BY 
						".$Xorder_by." ".$Xlimit." ";

// echo $XqueryCap;

$XnRows=0;
$cap1=executeQuery($XqueryCap,"all");

if(@$cap1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro busca: ' . @$cap1['error'];
	exit(json_encode($response));
}

if ($cap1)
{
	foreach ($cap1 as $cap3)
	{
		$cap3['id']=$cap3['id_key'];
		$cap3['nome']="<a href='vendedores_edit.php?id=".$cap3['id_key']."' class='f12b'>".$cap3['razao_social']."</a>";
		$cap3['cpf_cnpj']="<a href='vendedores_edit.php?id=".$cap3['id_key']."'>".$cap3['cpf_cnpj']."</a>";
		$cap3['estado_cidade']="<a href='vendedores_edit.php?id=".$cap3['id_key']."'>".$cap3['Enome']."/".$cap3['cidade']."</a>";
	    $Aresults[] = $cap3;
	    ++$XnRows;
	}
	$Xjson = json_encode( $Aresults );
}
if($XnRows == 0)
{
    $Xjson = '[]';
}

header('Content-Type: application/json'); //tell the broswer JSON is coming
if (isset($_REQUEST['rowCount']) ) //Means we're using bootgrid library
{
    echo "{ \"current\": $Xcurrent, \"rowCount\":$Xrows, \"rows\": ".$Xjson.", \"total\": $XnRows }";
}
else
{
    echo $Xjson; //Just plain vanillat JSON output
}
exit;