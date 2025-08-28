<?

$Xverifica_login=true;
$arquivo = "../globais/inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

if (@$_POST['altera_senha']=="1")
{
	
	if ($_POST['senha']<>$_POST['senha2']) $Xmensagem="Verifique que não digitou a mesma senha.....";
	else
	{
		$Xsenha=encrypt($_POST['senha'],1);
		$update=executeQuery("update vendedores
													set 
														senha='".$Xsenha."',
														altera_senha='0'
													where 
														id_key='".$_SESSION['vendedores']['id_key']."' 
													limit 1");
		if(@$update['error'])
		{
			echo 'Erro update senha: ' . @$update['error'];
		}	
		
		header("Location: login_vendedor.php?alterado=on");
		exit;
		
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
                <h1 class="text-center mb-4">Painel Usuário</h1>
                <h5 class="text-center mb-4">Definir nova senha</h5>

                <form action="altera_senha_usuario.php" method="POST">
                	<input type="hidden"  name="altera_senha"  id="altera_senha" value="<?=$_SESSION['usuario']['altera_senha']?>">
                    <!-- Email -->
                    <div class="mb-3 text-center">
                        <h3><?=$_SESSION['usuario']['nome']?></h3><BR>
						<?
						if (@$_SESSION['usuario']['link_avatar']) echo "<img src='".$_SESSION['usuario']['link_avatar']."' class='rounded-circle img-profile' style='width:160px !important;'>";
						else							      						echo "<img src='../globais/images/nophoto.jpeg' style='width:160px !important;' class='rounded-circle img-profile'>";
						?>
                    </div>

                    <!-- Senha -->
                    <div class="mb-3">
                        <label for="senha" class="form-label">Nova Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Repita senha</label>
                        <input type="password" name="senha2" class="form-control" id="senha2" placeholder="Repita" required>
                    </div>

                    <!-- Botão Entrar -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                    <div class="d-grid text-center text-danger">
                    	<BR>
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