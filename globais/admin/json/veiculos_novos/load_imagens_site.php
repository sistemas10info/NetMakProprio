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
		
		if ($ima3['principal']=="on")
		{
			$Xchecked="checked";
			$Xborder="border: 3px solid #4169E1; border-radius: 15px;";
		}
		else
		{
			$Xchecked="";
			$Xborder="";
		}
		
		$Ximagens.='<div class="col-3" style="padding:10px; vertical-align:bottom; border-bottom:1px solid #DCDCDC; margin-bottom:20px; '.$Xborder.' ">
		                        <div class="row well">
		                            <div class="col-md-1 text-left">
								    	<input type="radio" id="principal_'.$ima3['id_key'].'" name="principal" value="'.$ima3['id_key'].'" onclick="javascript:ver_principal();" '.$Xchecked.'>
								    </div>
								    <div class="col-md-8 text-left">
				                    	<a href="javascript:altera_titulo(\''.$ima3['id_key'].'\',\''.$Xtitulo.'\');" id="titulo_'.$ima3['id_key'].'" class="f11">'.$Xtitulo.'</a>
				                    </div>
		                            <div class="col-md-2 text-right">
								    	<a href="javascript:apaga_imagem(\''.$ima3['id_key'].'\');" class="f18"><i class="fa fa-trash"></i></a>
								    </div>
				                </div>
					            <a href="javascript:ver_imagem(\''.$ima3['id_key'].'\',\''.@$_POST['id'].'\');">
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
