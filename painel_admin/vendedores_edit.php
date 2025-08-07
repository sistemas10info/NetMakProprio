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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="../bootstrap/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<!-- NProgress -->
		<link href="../bootstrap/vendors/nprogress/nprogress.css" rel="stylesheet">
		<!-- iCheck -->
		<link href="../bootstrap/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
		<!-- bootstrap-daterangepicker -->
		<link href="../bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<!-- bootstrap-datetimepicker -->
		<link href="../bootstrap/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
		<!-- Bootstrap Colorpicker -->
		<link href="../bootstrap/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

		<!-- bootstrap-progressbar -->
		<link href="../bootstrap/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
		<!-- JQVMap -->
		<link href="../bootstrap/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

		<!-- Switchery -->
		<link href="../bootstrap/vendors/switchery/dist/switchery.min.css" rel="stylesheet">

		<link href="../bootstrap/assets/plugins/bootgrid/jquery.bootgrid.min.css" rel="stylesheet"> 
		<link href="../bootstrap/assets/plugins/lightbox/css/lightbox.css" rel="stylesheet" />
		<link href="../bootstrap/assets/plugins/summernote/summernote.css" rel="stylesheet">

		<!-- Dropzone -->
		<link href="../bootstrap/assets/plugins/dropzone/min/dropzone.min.css" rel="stylesheet" />

		<!-- PNotify -->
		<link href="../bootstrap/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
		<link href="../bootstrap/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
		<link href="../bootstrap/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
		
		<!-- Custom Theme Style -->
		<link href="../bootstrap/build/css/custom.min.css" rel="stylesheet">
		
		<!-- SELECT BOOTSTRAP -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	    <!-- Bootstrap core JavaScript-->
	    <script src="vendor/jquery/jquery.min.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	    <!-- Core plugin JavaScript-->
	    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	
	    <!-- Custom scripts for all pages-->
	    <script src="js/sb-admin-2.min.js"></script>

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
													data-inputmask="'mask' : '999.999.999-99'" onblur="javascript: verifica_cpf_cnpj(this.value);" maxlength="30" value="<?=$ven3['cpf_cnpj']?>">
									</div>
								</div>
	
								<div class="row form-group"> 
									<div class="col-md-3">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Telefône</label><BR>
										<input type="text" name="telefone" id="telefone" class="form-control f12" value="<?=$ven3['telefone']?>">
									</div>
									<div class="col-md-3">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Celular</label><BR>
										<input type="text" name="celular" id="celular" class="form-control f12" value="<?=$ven3['celular']?>">
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Email</label><BR>
										<input type="text" name="email" id="email" class="form-control f12" value="<?=$ven3['email']?>">
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
										<input type="text" name="rua" id="rua" class="form-control f12" value="<?=$ven3['rua']?>">
									</div>
									<div class="col-md-2">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Nro</label><BR>
										<input type="text" name="nro" id="nro" class="form-control f12" value="<?=$ven3['nro']?>">
									</div>

									<div class="col-md-2">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Complemento</label><BR>
										<input type="text" name="comple" id="comple" class="form-control f12" value="<?=$ven3['comple']?>">
									</div>

								</div>
	
								<div class="row form-group"> 
									<div class="col-md-4">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Cidade</label><BR>
										<input type="text" name="cidade" id="cidade" class="form-control f12" value="<?=$ven3['cidade']?>">
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" >Bairro</label><BR>
										<input type="text" name="bairro" id="bairro" class="form-control f12" value="<?=$ven3['bairro']?>">
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
										<input type="text" name="usuario" id="usuario" class="form-control f12" value="<?=$ven3['usuario']?>">
									</div>
									<div class="col-md-4">
									    <input type="hidden" id="altera_senha" name="altera_senha" value="0">
										<label class="control-label text-right f12" >Senha <a href="javascript:gerar_senha();"><i class='fas fa-refresh'></i></a></label><BR>
										<input type="text" name="senha" id="senha" class="form-control f12" value="" maxlength="30" style='display:none;' readonly>
									</div>
									<div class="col-md-4">
										<label class="control-label text-right f12" >Estado</label><BR>
										<select class="form-control f12" id="estado" name="estado">
										   <option value='0' <? if ($ven3['estado']=="0") echo "selected ";?>>Rascunho</option>
										   <option value='1' <? if ($ven3['estado']=="1") echo "selected ";?>>Pendente</option>
										   <option value='9' <? if ($ven3['estado']=="9") echo "selected ";?>>Ativo</option>
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
										<textarea  name="obs" id="obs" class="form-control  f12" rows='4'><?=$ven3['obs']?></textarea>
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
										<input type="text" name="site" id="site" class="form-control f12" value="<?=$ven3['site']?>">
									</div>
								</div>
	
								<div class="row form-group"> 
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Instagram</label><BR>
										<input type="text" name="instagram" id="instagram" class="form-control f12" value="<?=$ven3['instagram']?>">
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Facebook</label><BR>
										<input type="text" name="facebook" id="facebook" class="form-control f12" value="<?=$ven3['facebook']?>">
									</div>
								</div>
	
								<!-- fim redes sociais -->
	
							</div>

						</div>
						
						<div class="col-md-12 d-grid gap-2 d-md-block text-center" style='padding-top:20px;'>
						  <button type="submit" class="btn btn-primary btn-sm">💾 SALVAR</button>&nbsp;
						  <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='vendedores.php';">↩️ VOLTAR</button>&nbsp;
						  <?
						     if (!empty($_GET['id'])) echo '<button id="botao_lixeira" type="button" class="btn btn-danger btn-sm">🗑️ Lixeira</button>';
						   ?>
						</div>
					</form>
					<HR>
					<?
					if (!empty($_GET['id']))
					{
					?>
	                    <div class='row card-body border-left-info shadow py-2' style='margin-left:20px; margin-right:30px; margin-top:15px; padding:10px;'>
							<div class='col-md-12'>
							    <div style='padding:10px;'>
								    <div class='text-center'>
								    	<h3>Configuração do Site</h3>
								    </div>
							    </div>
								<div class="row form-group"> 
									<div class="col-md-6">
										<label class="control-label text-right f16" for="Fcpf_cnpj">Quem somos:</label><BR>
										<textarea name="quem_somos" id="quem_somos" class='summer_texto form-control'><?=$ven3['quem_somos']?></textarea>
									</div>
									<div class="col-md-6">
										<label class="control-label text-right f16" for="Fcpf_cnpj">Serviços prestados:</label><BR>
										<textarea name="servicos_prestados" id="servicos_prestados" class='summer_texto form-control'><?=$ven3['servicos_prestados']?></textarea>
									</div>
							    </div>
						   </div>
						   <div class='row col-md-12'>
						        <div class='col-md-6'>
									<div class="row form-group" style='padding-top:8px;'> 
										<div class="col-md-9">
											<label class="control-label text-right f12" for="Fcpf_cnpj">Nome da empresa</label><BR>
											<input type="text" name="nome_empresa" id="nome_empresa" class="form-control f12" value="<?=$ven3['nome_empresa']?>">
										</div>
										<div class="col-md-3">
											<label class="control-label text-right f12" for="Fcpf_cnpj">Modelo de site</label><BR>
											<select name="modelo_site" id="modelo_site" class='form-control'>
											    <option value="1" <? if ($ven3['modelo_site']=="1") echo "selected ";?>>1</option>
											    <option value="2" <? if ($ven3['modelo_site']=="2") echo "selected ";?>>2</option>
											    <option value="3" <? if ($ven3['modelo_site']=="3") echo "selected ";?>>3</option>
											</select>
										</div>

								    </div>
								    <div class="row form-group">
										<div class="col-md-9">
											<label class="control-label text-right f12" for="Fcpf_cnpj">Slogan</label><BR>
											<input type="text" name="slogan" id="slogan" class="form-control f12" value="<?=$ven3['slogan']?>">
										</div>
										<div class="col-md-3">
											<label class="control-label text-right f12" for="Fcpf_cnpj">Subdominio</label><BR>
											<input type="text" name="subdominio" id="subdominio" class="form-control f12" autocomplete="off" value="<?=$ven3['subdominio']?>">
										</div>
									</div>
						        </div>
						        <div class='col-md-6'>
									<div class="row form-group"> 
										<form id="formUploadLogo" enctype="multipart/form-data" method="post">
										    <input type='hidden' id="link_logo" value="">
										    <div class='row'>
												<div class="col-md-6">
												    <div class="form-group">
												      <label for="arquivo" class='f16'>Logomarca</label>
												      <input type="file" name="logo" id="logo" class="form-control-file" required accept="image/*">
												    </div>
												</div>
												<div class="col-md-2">	
													<BR>
													<button type="submit" class="btn btn-primary" >Enviar</button>
												</div>
												<div class="col-md-4" id="resultado_logo" style='padding-top:25px;'>	
												</div>
	
										    </div>
									    </form>
									</div>
									<div class="row form-group"> 
										<form id="formUploadBanner" enctype="multipart/form-data" method="post">
										    <input type='hidden' id="link_banner" value="">
										    <div class='row'>
												<div class="col-md-6">
												    <div class="form-group">
												      <label for="arquivo" class='f16'>Banner</label>
												      <input type="file" name="banner" id="banner" class="form-control-file" required accept="image/*">
												    </div>
												</div>
												<div class="col-md-2">	
													<BR>
													<button type="submit" class="btn btn-primary" >Enviar</button>
												</div>
												<div class="col-md-4" id="resultado_banner">	
												</div>
										    </div>
									    </form>
								   </div>
							   </div>
							   <div id="mensagem"></div>
							 </div>
							 
				        </div>

						<div class="col-md-12 d-grid gap-2 d-md-block text-center" style='padding-top:20px;'>
						  <a  class="btn btn-info btn-sm" href="javascript:salvar_site();">💾 SALVAR CONFIGURAÇÕES</a>&nbsp;
						  <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='vendedores.php';">↩️ VOLTAR</button>&nbsp;
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

	<!-- FastClick -->
	<script src="../bootstrap/vendors/fastclick/lib/fastclick.js"></script>
	<!-- NProgress -->
	<script src="../bootstrap/vendors/nprogress/nprogress.js"></script>
	<!-- iCheck -->
	<script src="../bootstrap/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-daterangepicker -->
	<script src="../bootstrap/vendors/moment/min/moment.min.js"></script>
	<script src="../bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap-datetimepicker -->    
	<script src="../bootstrap/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<!-- Bootstrap Colorpicker -->
	<script src="../bootstrap/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<!-- PNotify -->
	<script src="../bootstrap/vendors/pnotify/dist/pnotify.js"></script>
	<script src="../bootstrap/vendors/pnotify/dist/pnotify.buttons.js"></script>
	<script src="../bootstrap/vendors/pnotify/dist/pnotify.nonblock.js"></script>
	<!-- Switchery -->
	<script src="../bootstrap/vendors/switchery/dist/switchery.min.js"></script>
	<!-- jquery.inputmask -->
	<script src="../bootstrap/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
	
	<!-- Custom Theme Scripts -->
	<script src="../bootstrap/build/js/custom.min.js"></script>

	<script src="../bootstrap/assets/plugins/shortenerUrl/jquery.urlshortener.js"></script>
	<script src="../bootstrap/assets/plugins/bootgrid/jquery.bootgrid.min.js"></script>
	<script src="../bootstrap/assets/plugins/bootgrid/jquery.bootgrid.fa.js" type="text/javascript"></script>
	<script src="../bootstrap/assets/plugins/eModal/dist/eModal.js"></script>
	<script src="../bootstrap/assets/plugins/jquery-maskmoney/jquery.maskMoney.min.js"></script>
	<script src="../bootstrap/assets/plugins/lightbox/js/lightbox.min.js"></script>
	<script src="../bootstrap/assets/plugins/summernote/summernote.min.js"></script>
	<script src="../bootstrap/assets/plugins/dropzone/min/dropzone.min.js"></script>
	
     <script src="../globais/admin/js/pages/vendedores.js">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
	 <!-- SweetAlert2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
	
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
</body>

</html>

