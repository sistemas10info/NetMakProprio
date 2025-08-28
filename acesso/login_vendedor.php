<?

if (isset($_POST['email']))
{
    $Xverifica_login=false;
	$arquivo = "../globais/inc/inc.php";
	if (file_exists($arquivo)) {
	    include($arquivo);
	} else {
	    echo "Arquivo não encontrado: $arquivo";
	}
	
	$Xsenha=encrypt($_POST['senha'],1);
	$log3=executeQuery("select interno,
											 id_key,
											 nome,
											 nome_empresa,
											 email,
											 site,
											 celular,
											 telefone,
											 id_key_categorias
										from vendedores 
											where 
												email='".$_POST['email']."' and senha='".$Xsenha."' 
											limit 1");
	if(@$log3['error'])
	{
		echo 'Erro login: ' . @$log3['error'];
	}	
	
	if ($log3)
	{
		$Xmensagem="<h4 class='text-success'>Email e senha corretos</h4>";
		$_SESSION['tipo_login']="V";
		$_SESSION['vendedor']=$log3;
		$update=executeQuery("update vendedores 
													set 
														session_id='".session_id()."',
														fult_login='".date('Y-m-d H:i')."', 
														ult_ip_login='".getIp()."' 
													where 
														id_key='".$log3['id_key']."' 
													limit 1");
		if(@$update['error'])
		{
			echo 'Erro update: ' . @$update['error'];
		}	
		
		echo "<script language=javascript>window.location='../painel_vendedor/veiculos_usados.php';</script>";
		exit;
	}
	else
	{
		$Xmensagem="<b class='text-danger'>Email e senha inválidos</b>";
	}			

}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
        }
        .login-container {
            min-height: 100vh;
            height:100%;
        }
        .login-image {
            background: url('img/login_vendedor.webp') no-repeat center center;
            background-size: cover;
        }
        .login-box {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>

<div class="container-fluid login-container">
    <div class="row h-100">
        <!-- Lado da Imagem -->
        <div class="col-md-6 login-image d-none d-md-block"></div>

        <!-- Lado do Formulário -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="login-box w-100 p-4">
                <div class='text-center'><img src='img/logo_netmak.webp' width='300px;'></div>
                <h1 class="text-center mb-4">Painel Vendedor</h2>
                <h3 class="text-center mb-4">Acesso ao Sistema</h3>

                <form action="login_vendedor.php" method="POST">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
                    </div>

                    <!-- Botão Entrar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                    </div>
                    <div class="d-grid text-center">
                        <?=@$Xmensagem?>
                    </div>
                </form>

                <p class="text-center mt-4 text-muted">© 2025 Sua Empresa</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>