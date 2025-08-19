<?php
header('Access-Control-Allow-Origin: *');

$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_FILES['imagem_site']) && $_FILES['imagem_site']['error'] === UPLOAD_ERR_OK) 
    {
        $nomeTemp = $_FILES['imagem_site']['tmp_name'];
        $nomeFinal = "ImgSite_".buildIdKey(30).".".pathinfo($_FILES['imagem_site']['name'], PATHINFO_EXTENSION);
        // basename($_FILES['logo']['name']);
        $tipoMime = mime_content_type($nomeTemp);

        $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
        if (!in_array($tipoMime, $tiposPermitidos)) 
        {
			http_response_code(400);
			$response['msg'] = 'Imagem formato inválido';
			$response['link'] = "X";
			$response['imagem']="X";
			exit(json_encode($response));
        }

        $pastaDestino = FOLDER_UPLOAD;
        if (!is_dir($pastaDestino)) 
        {
            mkdir($pastaDestino, 0777, true);
        }

        if (move_uploaded_file($nomeTemp, $pastaDestino . $nomeFinal)) 
        {

			// senão existir o ID do veiculo carrego novo.
			if (empty($_POST['id']))
			{
				$_POST['id']=buildIdKey(30);
				$insert = executeQuery("
													INSERT INTO
														veiculos
													SET
														id_key        	= '".$_POST['id']."',
														titulo				= '".$_POST['titulo']."',
														tipo='1'
													");
				
				if(@$insert['error'])
				{
					http_response_code(400);
					$response['msg'] = 'Erro ao inserir registro: ' . $insert['error'];
					exit(json_encode($response));
				}
			
			}

        
 			http_response_code(200);
			$response['msg']="Arquivo enviado com sucesso...";
			$response['link']=WEBSITE_UPLOAD . $nomeFinal;
			$response['imagem']="<img src='".$response['link']."' width='60px;'>";
			$Xformato = pathinfo(parse_url($response['link'], PHP_URL_PATH), PATHINFO_EXTENSION);
			
			$insert=executeQuery("insert into imagens
														set
														     id_key='".buildIdKey(30)."',
														     link='".$response['link']."',
														     id_key_origem='".$_POST['id']."',
														     formato='".$Xformato."' ");
			if(@$insert['error'])
			{
				http_response_code(400);
				$response['msg'] = 'Erro ao insert img registro: ' . @$insert['error'];
				exit(json_encode($response));
			}
			
			$ima1=executeQuery("select * from imagens 
																	where 
																id_key_origem='".$_POST['id']."' 
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
			    $Ximagens_carrousel="";
			    $Ximagens="<div class='row'>";
				foreach ($ima1 as $ima3)
				{
				    $Xtitulo=($ima3['titulo']) ? $ima3['titulo'] : "Sem titulo";

					$Xactive=(++$Xcont==1) ? "active" : "";
					
				    $Ximagens_carrousel.='<div class="carousel-item '.$Xactive.'" >
												        <img class="d-block w-100" src="'.$ima3['link'].'" alt="'.$Xtitulo.'">
												      </div>';
					
					$Ximagens.='<div class="col-2" style="vertical-align:bottom; border-bottom:1px solid #DCDCDC;">
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
            $response['imagens_carrousel']=$Ximagens_carrousel;
            $response['id']=$_POST['id'];
			exit(json_encode($response));
        } 
        else 
        {
            http_response_code(500);
			$response['msg']="Erro 500...";
			$response['link']="X";
			$response['imagem']="X";
			exit(json_encode($response));
        }
    } 
    else 
    {
        http_response_code(400);
		$response['msg']="Erro no envio do arquivo.";
		$response['link']="X";
		exit(json_encode($response));
    }
}
?>
