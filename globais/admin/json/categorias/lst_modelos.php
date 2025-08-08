<?
header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$mod1=executeQuery("select * from modelos 
										where 
											id_key_categoria='".$_POST['id_key_categoria']."' and
											id_key_marca='".$_POST['id']."'  
											order by nome","all");

if(@$mod1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro query: ' . $mod1['error'];
	exit(json_encode($response));
}

echo '<table class="table-light table table-bordered table-striped table-hover f12">
			<thead>
				<tr bgcolor="#D3D3D3">
					<th width="70%;"><a href=\'javascript:add_modelo();\' class=\'f18\'>+</a> Nome</th>
					<th width="20%;">Anos</th>
					<th width="10%;" class="text-center">...</th>
				</tr>
			</thead>';

if ($mod1)
{

	foreach ($mod1 as $mod3)
	{
		echo "<tr>
				  <td><a href='javascript:altera_modelo(\"".$mod3['id_key']."\");'>".$mod3['nome']."</a></td>
				  <td>".$mod3['anos']."</td>
				  <td class='text-center'><a href='javascript:apagar_registro(\"".$mod3['id_key']."\",\"modelos\");'><i class='fa fa-trash'></i></a></td>
				</tr>";
	}
	
}
else
{
	echo "<tr>
	          <td colspan=3 class='text-center'>Sem modelos configuradas</td>
	        </tr>";
}

echo "</table>";

?>