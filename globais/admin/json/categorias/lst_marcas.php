<?
header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$mar1=executeQuery("select * from marcas 
										where 
											id_key_categoria='".$_POST['id']."' 
											order by nome","all");

if(@$mar1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro query: ' . $mar1['error'];
	exit(json_encode($response));
}

echo '<table class="table-light table table-bordered table-striped table-hover f12">
			<thead>
				<tr bgcolor="#D3D3D3">
					<th width="90%;"><a href=\'javascript:add_marca();\' class=\'f18\'>+</a> Nome</th>
					<th width="10%;" class="text-center">...</th>
				</tr>
			</thead>';

if ($mar1)
{

	foreach ($mar1 as $mar3)
	{
		echo "<tr>
				  <td><i class='fa fa-arrow-right marcas'  id='marca_".$mar3['id_key']."' 
				  			style='display:none;'>
				  		 </i> <a href='javascript:ver_modelos(\"".$_POST['id']."\",\"".$mar3['id_key']."\");'>".$mar3['nome']."</a></td>
				  <td class='text-center'><a href='javascript:apagar_registro(\"".$mar3['id_key']."\",\"marcas\");'><i class='fa fa-trash'></i></a></td>
				</tr>";
	}
	
}
else
{
	echo "<tr>
	          <td colspan=2 class='text-center'>Sem marcas configuradas</td>
	        </tr>";
}

echo "</table>";

?>