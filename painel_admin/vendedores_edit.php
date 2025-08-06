<?
$arquivo = "../globais/inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

if (!isset($_GET['id'])) 
{
   $ven3=[];
   $ven3['razao_social']="Novo vendedor";
   $Xtitulo="Novo vendedor";
}
else
{
   $ven3=executeQuery("select * from vendedores where id_key='".$_GET['id']."' limit 1");
   $Xtitulo="Editar vendedor";
}

$cat1=executeQuery("select * from categorias ","all");

$est1=executeQuery("select * from estados","all");
			
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Painel Administrador</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

	<!-- SELECT BOOTSTRAP -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    

</head>

<body id="page-top"> 

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			<? 
			$arquivo = "../globais/admin/formatos/menu_lateral.php";
			if (file_exists($arquivo)) {
			    include($arquivo);
			} else {
			    echo "Arquivo não encontrado: $arquivo";
			}			
			?>
			
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
	 			<? 
				$arquivo = "../globais/admin/formatos/menu_top.php";
				if (file_exists($arquivo)) {
				    include($arquivo);
				} else {
				    echo "Arquivo não encontrado: $arquivo";
				}			
				?>
				
				<!-- conteudo -->
			    <div class='row' style='padding:10px;'>
				    <div class='col-md-4'>
				    	<h3><?=$Xtitulo?></h3>
				    </div>
			    </div>
				<form name="FormVendedor" id="FormVendedor" method="post" action="../globais/admin/json/vendedores/post.php">
				    <input type='hidden' name='id' id='id' value='<?=@$_GET['id']?>'>
					<div class='row'>
						<div class='col-md-7'>
							<div class='card-body border-left-secondary shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:20px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Dados principais</h5>
								    </div>
							    </div>
	
								<div class="row form-group"> 
									<div class="col-md-9">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Razão Social</label><BR>
										<input type="text" name="razao_social" id="razao_social" class="form-control f12" value="<?=$ven3['razao_social']?>">
									</div>
									<div class="col-md-3">
										<label class="control-label text-right f12" >CNPJ</label><BR>
										<input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control f12" value="" 
													data-inputmask="'mask' : '999.999.999-99'" onblur="javascript: verifica_cpf_cnpj(this.value);" maxlength="30" >
									</div>
								</div>
	
								<div class="row form-group"> 
									<div class="col-md-3">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Telefône</label><BR>
										<input type="text" name="telefone" id="telefone" class="form-control f12" value="">
									</div>
									<div class="col-md-3">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Celular</label><BR>
										<input type="text" name="celular" id="celular" class="form-control f12" value="">
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Email</label><BR>
										<input type="text" name="email" id="email" class="form-control f12" value="">
									</div>
								</div>
							    
							</div>

							<!-- endereço -->
							
							<div class='card-body border-left-secondary shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Endereço</h5>
								    </div>
							    </div>
	
								<div class="row form-group"> 
									<div class="col-md-2">
										<label class="control-label text-right f12" for="Fcpf_cnpj">CEP</label><BR>
										<input type="text" name="cep" id="cep" class="form-control f12" value="<?=$ven3['cep']?>">
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f12" >Rua</label><BR>
										<input type="text" name="rua" id="rua" class="form-control f12" value="">
									</div>
									<div class="col-md-2">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Nro</label><BR>
										<input type="text" name="nro" id="nro" class="form-control f12" value="<?=$ven3['nro']?>">
									</div>

									<div class="col-md-2">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Complemento</label><BR>
										<input type="text" name="comple" id="comple" class="form-control f12" value="<?=$ven3['nro']?>">
									</div>

								</div>
	
								<div class="row form-group"> 
									<div class="col-md-4">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Cidade</label><BR>
										<input type="text" name="cidade" id="cidade" class="form-control f12" value="<?=$ven3['cep']?>">
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" >Bairro</label><BR>
										<input type="text" name="bairro" id="bairro" class="form-control f12" value="">
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Estado</label><BR>
										<select name="uf" id="uf" class="form-control f12">
										<?
										foreach ($est1 as $est3)
										{
											 echo "<option value='".$est3['uf']."' ";
											 if ($est3['uf']==@$ven3['uf']) echo " selected ";
											 echo ">".$est3['nome']."</option>";
										}
										?>
										</select>
									</div>


								</div>

							    
							</div>
							
							<!-- fim endereço -->

							<!-- configuração do site -->
							
						</div>
						<div class='col-md-5'>
							<div class='card-body border-left-info shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Dados de acesso</h5>
								    </div>
							    </div>
								<div class="row form-group"> 
									<div class="col-md-4">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Nome de Usuário</label><BR>
										<input type="text" name="usuario" id="usuario" class="form-control f12" value="">
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" >Senha <a href="javascript:gerar_senha();"><i class='fas fa-close'></i></a></label><BR>
										<input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control f12" value="" 
													data-inputmask="'mask' : '999.999.999-99'" onblur="javascript: verifica_cpf_cnpj(this.value);" maxlength="30">
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" >Estado</label><BR>
										<select class="form-control f12" id="estado">
										   <option value='0'>Rascunho</option>
										   <option value='1'>Ativo</option>
										</select>
									</div>
								</div>
	
								<div class="row form-group"> 
									<div class="col-md-5">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Categorias habilitadas</label><BR>
										<select name="id_key_categorias[]" id="id_key_categorias"  multiple class="form-control  f14">
										<?
										foreach ($cat1 as $cat3)
										{
											echo "<option value='".$cat3['id_key']."' ";
											if (str_contains(@$ven3['id_key_categorias'], $cat3['id_key'])) echo " selected ";
											echo ">".$cat3['nome']."</option>";
										}
										?>
										</select>
									</div>
									<div class="col-md-7">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Observações</label><BR>
										<textarea  name="obs" id="obs" class="form-control  f12" rows='4'></textarea>
									</div>

								</div>

						     </div>

							<div class='card-body border-left-warning shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Redes sociais</h5>
								    </div>
							    </div>
								<div class="row form-group"> 
									<div class="col-md-12">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Site</label><BR>
										<input type="text" name="site" id="site" class="form-control f12" value="">
									</div>
								</div>
	
								<div class="row form-group"> 
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Instagram</label><BR>
										<input type="text" name="instagram" id="instagram" class="form-control f12" value="">
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Facebook</label><BR>
										<input type="text" name="facebook" id="facebook" class="form-control f12" value="">
									</div>
								</div>
	
								<!-- fim redes sociais -->
	
							</div>

						</div>
						
						<div class="col-md-12 d-grid gap-2 d-md-block text-center" style='padding-top:20px;'>
						  <button type="submit" class="btn btn-primary btn-sm">💾 SALVAR</button>&nbsp;
						  <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='vendedores.php';">↩️ VOLTAR</button>&nbsp;
						  <?
						     if (!empty($_GET['id'])) echo '<button type="button" class="btn btn-danger btn-sm">🗑️ APAGAR</button>';
						   ?>
						</div>
					</form>
					<HR>
					<?
					if (!empty($_GET['id']) or true)
					{
					?>
	                    <div class='row card-body border-left-secondary shadow py-2' style='margin-left:20px; margin-right:30px; margin-top:15px; padding:10px;'>
							<div class='col-md-12 '>
							    <div style='padding:10px;'>
								    <div class='text-center'>
								    	<h3>Configuração do Site</h3>
								    </div>
							    </div>
		
								<div class="row form-group"> 
									<form id="formUploadLogo" enctype="multipart/form-data" method="post">
									    <input type='hidden' id="link_logo" value="">
									    <div class='row'>
											<div class="col-md-8">
											    <div class="form-group">
											      <label for="arquivo">Logomarca</label>
											      <input type="file" name="logo" id="logo" class="form-control-file" required accept="image/*">
											    </div>
											</div>
											<div class="col-md-2">	
												<BR>
												<button type="submit" class="btn btn-primary" >Enviar</button>
											</div>
									    </div>
								    </form>
									<div class="col-md-12">
									  <form id="formUploadBanner" enctype="multipart/form-data" method="post">
										    <div class="form-group">
										      <label for="arquivo">Banner</label>
										      <input type="file" name="banner" id="banner" class="form-control-file" required accept="image/*">
										    </div>
										    <button type="submit" class="btn btn-primary" >Enviar</button>
									  </form>									
									</div>
									<div class="col-md-12">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Quem somos:</label><BR>
										<textarea name="quem_somos" id="quem_somos" rows="5"></textarea>
									</div>
									<div id="mensagem"></div>
								</div>
							 </div>
				        </div>
				    <?
				    }
				    ?>	
					
					<!-- fim endereço -->

				</div>
				
				<!-- Fim conteudo -->
				
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; NetMak 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="../globais/admin/js/pages/vendedores.js">
    

</body>

</html>

<script language=javascript>

</script>