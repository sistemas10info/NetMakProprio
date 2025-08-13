<?php
header('Access-Control-Allow-Origin: *');

$arquivo = "../../../inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

// print_r($_POST);

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
    $Ximagens_carrousel="";
	foreach ($ima1 as $ima3)
	{
	    $Xactive=($ima3['id_key']==$_POST['id_key']) ? "active" : "";
	    $Xtitulo=($ima3['titulo']) ? $ima3['titulo'] : "Sem titulo";
	    $Ximagens_carrousel.='<div class="carousel-item '.$Xactive.'" >
									        <img class="d-block w-100" src="'.$ima3['link'].'" alt="'.$Xtitulo.'">
											<div class="carousel-caption d-none d-md-block">
											    <p>'.$Xtitulo.'</p>
											</div>									        
									      </div>';
	}
}

$response['imagens_carrousel']=$Ximagens_carrousel;
exit(json_encode($response));

?>
