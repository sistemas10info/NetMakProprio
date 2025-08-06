<?
$arquivo = "../globais/inc/inc.php";
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
}			
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
				    <div class='row' style='padding:10px;'>
					    <div class='col-md-4'>
					    	<h3>Veículo novos</h3>
					    </div>
					    <div class='col-md-8 text-right'>
							<a href="#" class="btn btn-primary btn-icon-split">
							    <span class="icon text-white-50">
							        +
							    </span>
							    <span class="text">Adicionar</span>
							</a>				    
					    </div>
				    </div>
					<table class="table-light table table-bordered table-striped table-hover bg-gray-500" id="table_veiculos_novos" >
						
						<tr class='f16 text-gray-700 bg-gray-400'>
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					


						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						<tr class="table-light f12">
							<td>Tumb</td>
							<td>Descrição veículo</td>
							<td>Categoria</td>
							<td>Marca</td>
							<td>Modelo</td>
							<td>...</td>
						</tr>					
						
					</table>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    
    <script src="../globais/admin/js/pages/veiculos_novos.js">

</body>

</html>