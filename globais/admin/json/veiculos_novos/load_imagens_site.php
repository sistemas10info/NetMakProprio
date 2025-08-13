<?php
header('Access-Control-Allow-Origin: *');

$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

$ima1=executeQuery("select * from imagens 
														where 
													id_key_origem='".$_POST['id_key_origem']."' 
													order by interno","all");
if(@$ima1['error'])
{
	http_response_code(400);
	$response['msg'] = 'Erro ao inserir registro: ' . $insert['error'];
	exit(json_encode($response));
}

if ($ima1)
{
    $Xcont=0;
    $Ximagens="<div class='row'>";
	foreach ($ima1 as $ima3)
	{
	    $Xtitulo=($ima3['titulo']) ? $ima3['titulo'] : "Sem titulo";

		$Xactive=(++$Xcont==1) ? "active" : "";
		
		$Ximagens.='<div class="col-2" style="vertical-align:bottom; border-bottom:1px solid #DCDCDC;">
		                        <div class="well">
		                            <div class="col-md-2 text-left">
								    	<a href="javascript:apaga_imagem(\''.$ima3['id_key'].'\');" class="btn btn-default f18"><i class="fa fa-trash"></i></a>
								    </div>
								    <div class="col-md-10">
				                    	<a href="javascript:altera_titulo(\''.$ima3['id_key'].'\');" id="titulo_'.$ima3['id_key'].'" class="btn btn-default f11">'.$Xtitulo.'</a>
				                    </div>
				                </div>
					            <a href="javascript:ver_imagem(\''.$ima3['id_key'].'\',\''.$_POST['id'].'\');">
					            	<img src="'.$ima3['link'].'" 
						                 style="width:98%; padding:5px;"
						                 class="text-center"
						                 data-bs-toggle="modal" 
						                 data-bs-target="#imagemModal" 
						                 data-img="'.$ima3['link'].'">
						         </a>
					        </div>';
	}
}

$Ximagens.="</div>";
$response['imagens']=$Ximagens;
exit(json_encode($response));
?>
