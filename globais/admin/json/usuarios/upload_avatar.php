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
    if (isset($_FILES['link_avatar']) && $_FILES['link_avatar']['error'] === UPLOAD_ERR_OK) 
    {
        $nomeTemp = $_FILES['link_avatar']['tmp_name'];
        $nomeFinal = "ImgAvatar_".buildIdKey(30).".".pathinfo($_FILES['link_avatar']['name'], PATHINFO_EXTENSION);
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
														usuarios
													SET
														id_key        	= '".$_POST['id']."',
														nome				= '".$_POST['nome']."'
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
			$response['imagem']="<img src='".$response['link']."' width='200px;' class='rounded-circle img-profile'>";
			
			$update=executeQuery("update usuarios 
														set
															 link_avatar='".$response['link']."' 
													    where 
													    	id_key='".$_POST['id']."' limit 1");
			if(@$update['error'])
			{
				http_response_code(400);
				$response['msg'] = 'Erro ao update registro: ' . @$update['error'];
				exit(json_encode($response));
			}
													    	
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