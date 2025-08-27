<?
header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$cat1=executeQuery("select * from categorias 
										where 
											id_key_linha='".$_POST['id_key_linha']."' 
											order by nome","all");

if(@$cat1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro query: ' . $cat1['error'];
	exit(json_encode($response));
}

?>
<table class="table-light table table-bordered table-striped table-hover f12">
	<thead>
		<tr bgcolor='#D3D3D3'>
			<th width="90%;"><a href='javascript:add_categoria();' class='f18'>+</a> Nome</th>
			<th width="10%;" class='text-center'>...</th>
		</tr>
	</thead>
	<?
	if ($cat1)
	{
	    foreach ($cat1 as $cat3)
	    {
			echo "<tr>
					  <td><i class='fa fa-arrow-right categorias text-primary f20'  id='categoria_".$cat3['id_key']."' 
					  			style='display:none;'>
					  		 </i> <a href='javascript:ver_marcas(\"".$cat3['id_key']."\");'>".$cat3['nome']."</a></td>
					  <td class='text-center'><a href='javascript:apagar_registro(\"".$cat3['id_key']."\",\"categorias\");'><i class='fa fa-trash'></i></a></td>
					</tr>";
	    }
	}
	?>
</table>

