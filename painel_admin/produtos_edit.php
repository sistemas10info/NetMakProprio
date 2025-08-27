<?
$arquivo = "../globais/inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}

if (!isset($_GET['id'])) 
{
   $pro3=[];
   $pro3['titulo']="Novo produto";
   $Xtitulo="Novo produto";
   $pro3['id_key_categoria']='--';
}
else
{
   $pro3=executeQuery("select * from produtos 
   															where 
   													  id_key='".$_GET['id']."' 
   													  		limit 1");
   $Xtitulo="Editar Produto";
}

$cat1=executeQuery("select * from categorias_produtos ","all");
			
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
				<form name="FormProduto" id="FormProduto" method="post" action="../globais/admin/json/produtos/post.php">
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
									<div class="col-md-12">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Título</label><BR>
										<input type="text" name="titulo" id="titulo" class="form-control f12" value="<?=$pro3['titulo']?>">
									</div>
								</div>
								<div class="row form-group"> 
									<div class="col-md-12">
										<label class="control-label text-right f16" for="Fcpf_cnpj">Anúncio:</label><BR>
										<textarea name="descrip" id="descrip" class='summer_texto form-control'><?=@$pro3['descrip']?></textarea>
									</div>
								</div>
							</div>

						</div>
						<div class='col-md-5'>
							<div class='card-body border-left-info shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Outras informações</h5>
								    </div>
							    </div>
								<div class="row form-group"> 
									<div class="col-md-12">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Categoria</label><BR>
										<select class="form-control f12" id="id_key_categoria" name="id_key_categoria">
										   <option value="--">Selecione a categoria</option>
										   <?
										   		foreach ($cat1 as $cat3) 
										   		{
										   			echo "<option value='".$cat3['id_key']."' ";
										   			if ($pro3['id_key_categoria']==$cat3['id_key']) echo "selected ";
										   			echo ">".$cat3['nome']."</option>";
										   		}
										   ?>
										</select>
									</div>
						        </div>
								<div class="row form-group"> 
									<div class="col-md-4">
										<label class="control-label f12 col-md-12">Preço de venda</label><BR>
										<input type="text" name="preco" id="preco" class="form-control f12b maskMoneyBR text-right" value="<?=number_format(@$pro3['preco'],2)?>" >
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<label class="control-label f12 col-md-12">Preço de oferta</label><BR>
										<input type="text" name="preco_oferta" id="preco_oferta" class="form-control f12b maskMoneyBR text-right" value="<?=number_format(@$pro3['preco_oferta'],2)?>" >
									</div>
									
								</div>

						    	 <div class="row form-group">

									<div class="col-md-3">
										<label class="control-label text-right f12" >Comissão venda</label><BR>
										<input type="text" name="comic" id="comic" class="form-control f12 maskMoneyBR text-right" value="<?=number_format(@$pro3['comic'],2)?>" >
									</div>
									<div class="col-md-1">
									</div>									
									<div class="col-md-3">
										<label class="control-label text-right f12" >Comissão fixa</label><BR>
										<select name="comic_fica" id="comic_fica" class="form-control f12">
										   <option value="N">Não</option>
										   <option value="S">Sim</option>
										</select>
									</div>
									<div class="col-md-1">
									</div>		
									<div class="col-md-4">
										<label class="control-label text-right f12" >Estado</label><BR>
										<select class="form-control f12" id="estado" name="estado">
										   <option value='0' <? if (@$pro3['estado']=="0") echo "selected ";?>>Rascunho</option>
										   <option value='9' <? if (@$pro3['estado']=="9") echo "selected ";?>>Publicado</option>
										</select>
									</div>									

								</div>
								
						     </div>

							<div class='card-body border-left-info shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>SEO</h5>
								    </div>
							    </div>
								<div class="row form-group"> 
									<div class="col-md-12">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Palavras chave</label><BR>
										<textarea name="seo" id="seo" class='form-control' rows=3 spellcheck="false"><?=@$pro3['seo']?></textarea>
									</div>
						        </div>
								<div class="row form-group"> 
									<!-- <form id="formUploadImagemSeo" enctype="multipart/form-data" method="post"> -->
									    <input type='hidden' id="Vlink_seo" value="">
										<div class="col-md-6">
										    <div class="form-group">
										      <label for="arquivo" class="control-label text-right f14">Imagem</label>
										      <input type="file" name="link_seo" id="link_seo" class="form-control-file" accept="image/*">
										    </div>
										</div>
										<div class="col-md-2">	
											<BR>
											<button class="btn btn-primary" id="btnUploadImagemSeo">Enviar</button>
										</div>
										<div class="col-md-4" id="resultado_link_seo" style='padding-top:25px;'>	
										</div>
								   <!-- </form> -->
								</div>
						        
						     </div>
						</div>
						
						<HR>
	                    <div class='row card-body border-left-info shadow py-2' style='margin-left:20px; margin-right:30px; margin-top:15px; padding:10px;'>
							<div class='col-md-12'>
							    <div style='padding:10px;'>
								    <div class='text-left'>
								    	<h3>Imagens</h3>
								    </div>
							    </div>
						   </div>
						   <div class='col-md-12'> 
							    <input type='hidden' id="link_logo" value="">
								<div class="col-md-3">
									<input type="file" name="imagem_site" id="imagem_site" class="form-control-file" accept="image/*">
								</div>
								<div class="col-md-1">	
									<button class="btn btn-primary" id="btnUploadImagemSite">Enviar</button>
								</div>
								<div class="col-md-8" id="resultado_imagem_site" style='padding-top:5px;'>	
								</div>
							</div>
				        </div>
					</div>
					<div class="col-md-12 d-grid gap-2 d-md-block text-center" style='padding-top:20px;'>
					  <button type="submit" class="btn btn-primary btn-sm">💾 SALVAR</button>&nbsp;
					  <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='produtos.php';">↩️ VOLTAR</button>&nbsp;
					  <?
					     if (!empty($_GET['id'])) echo '<button id="botao_lixeira" type="button" class="btn btn-danger btn-sm">🗑️ Lixeira</button>';
					   ?>
					</div>
				</form>
				
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
	
     <script src="../globais/admin/js/pages/produtos.js">
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


<div class="modal fade sombra2" id="ModalImagensSite" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
		<div id="carouselExampleControls" class="carousel" data-ride="carousel">
		  <div class="carousel-inner" id="lista_imagens_site">
		  </div>
		</div>
    </div>
	<div class="modal-footer">
	  <a class="carousel-control-prev f24" href="#carouselExampleControls" role="button" data-slide="prev">
	 	 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	 	 <span class="sr-only">Previo</span>
	  </a>
	  <a class="carousel-control-next f24" href="#carouselExampleControls" role="button" data-slide="next">
		 <span class="carousel-control-next-icon" aria-hidden="true"></span>
		 <span class="sr-only">Próximo</span>
	  </a>
	</div>

</div>


