<?php 

header('Access-Control-Allow-Origin: *');

$Xerror=false;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$Xorder_by = " titulo ";
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
    	$Xwhere[] .= "  ( veiculos.titulo LIKE '%".$Xsearch."%' ) ";
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

$XqueryCap ="SELECT 
						veiculos.id_key,veiculos.titulo,veiculos.preco,veiculos.estado,veiculos.id_key_vendedor,
						veiculos.id_key_marca,veiculos.id_key_categoria,veiculos.id_key_modelo,
						categorias.nome as Cnome,marcas.nome as MAnome,modelos.nome as MOnome
					 from veiculos 
					 	left join categorias on (categorias.id_key=veiculos.id_key_categoria)
					 	left join marcas on (marcas.id_key=veiculos.id_key_marca)
					 	left join modelos on (modelos.id_key=veiculos.id_key_modelo)
					 where 
					 	veiculos.apagado=0 and veiculos.tipo='2' and veiculos.id_key_vendedor='".$_POST['id']."' ".$Xwhere_busca."
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
		$cap3['titulo']="<a href='veiculos_usados_edit.php?id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."' class='f12b'>".$cap3['titulo']."</a>";
		$cap3['categoria']="<a href='veiculos_usados_edit.php?id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."'>".$cap3['Cnome']."</a>";
		$cap3['marca']="<a href='veiculos_usados_edit.php?id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."'>".$cap3['MAnome']."</a>";
		$cap3['modelo']="<a href='veiculos_usados_edit.php?id=id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."'>".$cap3['MOnome']."</a>";
		$cap3['preco']="<a href='veiculos_usados_edit.php?id=id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."' class='f12b'>".number_format(@$cap3['preco'],2)."</a>";
		$cap3['estado']="<a href='veiculos_usados_edit.php?id=".$cap3['id_key']."&id_vendedor=".$cap3['id_key_vendedor']."' class='f12b'>".(($cap3['estado']=="0") ? "Pendente" : "Publicado")."</a>";
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