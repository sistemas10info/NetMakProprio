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
    	$Xwhere[] .= "  ( produtos.titulo LIKE '%".$Xsearch."%' ) ";
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
						produtos.id_key,produtos.titulo,produtos.preco,produtos.preco_oferta,produtos.estado,
						produtos.id_key_categoria,categorias_produtos.nome as Cnome
					 from produtos 
					 	left join categorias_produtos on (categorias_produtos.id_key=produtos.id_key_categoria and 
					 												   categorias_produtos.id_key_linha=produtos.id_key_linha)
					 where 
					 	produtos.apagado=0  ".$Xwhere_busca." and produtos.id_key_linha='".$_POST['id_key_linha']."' 
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
		$Xpreco_oferta=($cap3['preco_oferta']) ? number_format(@$cap3['preco_oferta'],2) : "Sem oferta";
		$cap3['titulo']="<a href='produtos_edit.php?id_key_linha=".$_POST['id_key_linha']."&id=".$cap3['id_key']."' class='f12b'>".$cap3['titulo']."</a>";
		$cap3['categoria']="<a href='produtos_edit.php?id_key_linha=".$_POST['id_key_linha']."&id=".$cap3['id_key']."'>".$cap3['Cnome']."</a>";
		$cap3['preco']="<a href='produtos_edit.php?id_key_linha=".$_POST['id_key_linha']."&id=".$cap3['id_key']."' class='f12b'>".number_format(@$cap3['preco'],2)."</a>";
		$cap3['preco_oferta']="<a href='produtos_edit.php?id_key_linha=".$_POST['id_key_linha']."&id=".$cap3['id_key']."' class='f12b'>".$Xpreco_oferta."</a>";
		$cap3['estado']="<a href='produtos_edit.php?id_key_linha=".$_POST['id_key_linha']."&id=".$cap3['id_key']."' class='f12b'>".(($cap3['estado']=="0") ? "Rascunho" : "Publicado")."</a>";
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