<?
header('Access-Control-Allow-Origin: *');

$Xerror=true;
$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

/*
print_r($_POST);
die();
*/

$lin3=executeQuery("select nome from linhas where id_key='".$_POST['id_key_linha']."' limit 1");

?>
<BR>
<div class='well'>
	<h5><?=$lin3['nome']?></h5>
</div>
<table class="table-light table table-bordered table-striped table-hover f12" width='50%;'>
	<thead>
		<tr bgcolor='#D3D3D3'>
			<th width="90%;"><a href='javascript:add_categoria_marca();' class='f18'>+</a> Nome</th>
			<th class='text-center'>...</th>
		</tr>
	</thead>
	<?
	$cat1=executeQuery("select categorias_produtos.*,
											 linhas.nome as Lnome
										 from 
										 	categorias_produtos 
									     left join linhas on (categorias_produtos.id_key_linha=linhas.id_key)
									     where categorias_produtos.id_key_linha='".$_POST['id_key_linha']."' 
										 order by categorias_produtos.nome","all");
	if(@$cat1['error'])
	{
		die('Erro busca: ' . @$cat1['error']);
	}
	if ($cat1)
	{
	    foreach ($cat1 as $cat3)
	    {
			echo "<tr>
					  <td><a href='javascript:editar_categoria_marca(\"".$cat3['id_key']."\");'>".$cat3['nome']."</a></td>
					  <td class='text-center'><a href='javascript:apagar_registro(\"".$cat3['id_key']."\",\"categorias_produtos\");'><i class='fa fa-trash'></i></a></td>
					</tr>";
	    }
	}
	?>
</table>
