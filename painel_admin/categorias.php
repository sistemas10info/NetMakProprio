<?
$arquivo = "../globais/inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
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
				<div class='card-body border-left-secondary shadow h-100 py-2' style='margin-left:10px; margin-right:10px; margin-bottom:60px; padding:10px;'>
					<!-- categorias marca -->
				    <div class='row' style='padding:5px; border-top:1px solid silver;'>
				    	<div class='col-md-12 well'>
				    	     <h3>Categorias de Produtos</h3>
				    	</div>
					    <div class='col-md-12'>
							<table class="table-light table table-bordered table-striped table-hover f12">
								<thead>
									<tr bgcolor='#D3D3D3'>
										<th width="38%;"><a href='javascript:add_categoria_marca();' class='f18'>+</a> Nome</th>
										<th width="20%;">Linha</th>
										<th width="20%;">Categoria</th>
										<th width="20%;">Marca</th>
										<th class='text-center'>...</th>
									</tr>
								</thead>
								<?
								$cat1=executeQuery("select categorias_produtos.*,
																		 linhas.nome as Lnome,
																		 categorias.nome as Cnome,
																		 marcas.nome as Mnome
																	 from 
																	 	categorias_produtos 
																     left join linhas on (categorias_produtos.id_key_linha=linhas.id_key)
																     left join categorias on (categorias_produtos.id_key_categoria=categorias.id_key)
																     left join marcas on (categorias_produtos.id_key_marca=marcas.id_key)
																	 order by categorias_produtos.nome,
																	 			  categorias_produtos.id_key_linha,
																	 			  categorias_produtos.id_key_categoria,
																	 			  categorias_produtos.id_key_marca","all");
								if(@$cat1['error'])
								{
									die('Erro busca: ' . @$cat1['error']);
								}
								if ($cat1)
								{
								    foreach ($cat1 as $cat3)
								    {
								        $cat3['Lnome']=($cat3['id_key_linha']=="--") ? "<i>Todas as linhas</i>" : $cat3['Lnome'];
								        $cat3['Mnome']=($cat3['id_key_marca']=="--") ? "<i>Todas as Marcas</i>" : $cat3['Mnome'];
								        $cat3['Cnome']=($cat3['id_key_categoria']=="--") ? "<i>Todas as Categorias</i>" : $cat3['Cnome'];
										echo "<tr>
												  <td><a href='javascript:editar_categoria_marca(\"".$cat3['id_key']."\");'>".$cat3['nome']."</a></td>
												  <td>".$cat3['Lnome']."</td>
												  <td>".$cat3['Cnome']."</td>
												  <td>".$cat3['Mnome']."</td>
												  <td class='text-center'><a href='javascript:apagar_registro(\"".$cat3['id_key']."\",\"categorias_produtos\");'><i class='fa fa-trash'></i></a></td>
												</tr>";
								    }
								}
								?>
							</table>
					    </div>
				    </div>

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

	 <!-- SweetAlert2 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
	
	<!-- SweetAlert2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

	<script src="../globais/admin/js/pages/categorias.js">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    
    


</body>

</html>


<!-- MODAL Editar -->
<div class="modal fade" id="ModalDadosCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="ModalLabelCategoria">----</h4>
			</div>
			<div class="modal-body">
				<form name="formDadosCategoria" id='formDadosCategoria' method="POST">
					<input type="hidden" id="id_key"  name="id_key" value="">
					<div class=" form-horizontal">
						<div class="row form-group"> 
							<label class="control-label col-md-2 text-right" for="Fcpf_cnpj">Nome da categoria</label>
							<div class="col-md-10">
								<input type="text" name="nome" id="nome" class="form-control">
							</div>
						</div>
					
						<div class="row form-group">
							<label class="control-label col-md-2 text-right" for="descrip">Linha</label>
							<div class="col-md-10">
								<select class="form-control f12" id="id_key_linha" name="id_key_linha">
								   <option value="--">Qualquer linha</option>
								   <?
								        $lin1=executeQuery("select * from linhas","all");
								   		foreach ($lin1 as $lin3) echo "<option value='".$lin3['id_key']."'>".$lin3['nome']."</option>";
								   ?>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<label class="control-label col-md-2 text-right" for="descrip">Categoria</label>
							<div class="col-md-10">
								<select class="form-control f12" id="id_key_categoria" name="id_key_categoria">
								   <option value="--">Qualquer categoria</option>
								</select>
							</div>
						</div>
						<div class="row form-group">
							<label class="control-label col-md-2 text-right" for="descrip">Marca</label>
							<div class="col-md-10">
								<select class="form-control f12" id="id_key_marca" name="id_key_marca">
								   <option value="--">Qualquer marca</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" title="Fechar tela">X</button>
						<button type="button" class="btn btn-danger" name="btnApagar" id="btnApagar" title="Apagar registro!"><i class='fa fa-trash'></i></button>
						<a class="btn btn-primary" href='javascript:salvar_categoria();'  title="Salvar dados"><i class='fa fa-save'></i></a>
					</div>

				</form>
		</div>
	</div>
	</div>
</div>
<!-- fim modal editar -->
