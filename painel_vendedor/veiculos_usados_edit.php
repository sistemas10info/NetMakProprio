<?

$Xerror=true;
$arquivo = "../globais/inc/inc.php";  
if (file_exists($arquivo)) {
    include($arquivo);
} else {
    echo "Arquivo não encontrado: $arquivo";
} 

$cab3=executeQuery("select id_key_linhas from vendedores 
													where 
														id_key='".$_SESSION['vendedor']['id_key']."' 
													limit 1");

// if (!@$cab3) die("O vendedor não possui linhas para vender....");

$Xid_key_linhas=explode("-",@$cab3['id_key_linhas']);	
$Xbusca_linhas="(";
for ($gg=0;$gg<count($Xid_key_linhas);$gg++) $Xbusca_linhas.="'".$Xid_key_linhas[$gg]."',";
$Xbusca_linhas.="'XX')";

if (!isset($_GET['id'])) 
{
   $vei3=[];
   $vei3['titulo']="Novo veículo";
   $Xtitulo="Novo Veículo";
   $vei3['id_key_linha']='--';
   $vei3['id_key_categoria']='--';
   $vei3['id_key_marca']='--';
   $vei3['id_key_modelo']='--';
   $vei3['preco']=0.00;
   $vei3['valor_locacao']=0.00;
   $vei3['locacao']="N";
   $vei3['Ctemplate']=0;
}
else
{
   $vei3=executeQuery("select veiculos.*,categorias.template as Ctemplate
   													 from veiculos 
   													 left join categorias on (categorias.id_key=veiculos.id_key_categoria)
   															where 
   													  veiculos.id_key='".$_GET['id']."' 
   													  		limit 1");
   $Xtitulo="Editar Veículo";

   $cat1=executeQuery("select * from categorias 
   												where
   												   id_key_linha='".$vei3['id_key_linha']."' 
   												order by nome","all");
   
   $mar1=executeQuery("select * from marcas 
   												where
   												   id_key_categoria='".$vei3['id_key_categoria']."' 
   												order by nome","all");
   $mod1=executeQuery("select * from modelos 
   												where 
   													id_key_categoria='".$vei3['id_key_categoria']."' and 
   													id_key_marca='".$vei3['id_key_marca']."' 
   												order by nome","all");
}

$lin1=executeQuery("select * from linhas where id_key IN ".$Xbusca_linhas,"all");

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

    <title>Painel Vendedor</title>

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
			$arquivo = "../globais/vendedor/formatos/menu_lateral.php";
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
				$arquivo = "../globais/vendedor/formatos/menu_top.php";
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
				<form name="FormVeiculoUsado" id="FormVeiculoUsado" method="post" action="../globais/vendedor/json/veiculos_usados/post.php">
				    <input type='hidden' name='id' id='id' value='<?=@$_GET['id']?>'>
				    <input type='hidden' name='template' id='template' value='<?=@$vei3['Ctemplate']?>'>
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
										<input type="text" name="titulo" id="titulo" class="form-control f12" value="<?=$vei3['titulo']?>">
									</div>
								</div>
								<div class="row form-group"> 
									<div class="col-md-12">
										<label class="control-label text-right f16" for="Fcpf_cnpj">Anúncio:</label><BR> 
										<ul class="nav nav-tabs" id="myTab" role="tablist">
										  <li class="nav-item">
										    <a class="nav-link active" id="descrip-tab" data-toggle="tab" href="#descrip" role="tab" aria-controls="descrip" aria-selected="true">Descrição</a>
										  </li>
										  <li class="nav-item">
										    <a class="nav-link" id="especifica-tab" data-toggle="tab" href="#especifica" role="tab" aria-controls="especifica" aria-selected="false">Especificações</a>
										  </li>
										</ul>
										
										<div class="tab-content mt-3" id="myTabContent">
										  <div class="tab-pane fade show active" id="descrip" role="tabpanel" aria-labelledby="descrip-tab">
										       <textarea id="descripText" name="descrip" class="form-control summer_texto"><?=@$vei3['descrip']?></textarea>
										  </div>
										  <div class="tab-pane fade" id="especifica" role="tabpanel" aria-labelledby="especifica-tab">
										        <textarea id="especificaText" name="especifica" class="form-control summer_texto"><?=@$vei3['especifica']?></textarea>
										  </div>
										</div>
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
										<label class="control-label text-right f14b" for="Fcpf_cnpj">Linha</label><BR>
										<select class="form-control f12" id="id_key_linha" name="id_key_linha">
										   <option value="--">Selecione a linha</option>
										   <?
										   		foreach ($lin1 as $lin3) 
										   		{
										   			echo "<option value='".$lin3['id_key']."' ";
										   			if ($vei3['id_key_linha']==$lin3['id_key']) echo "selected ";
										   			echo ">".$lin3['nome']."</option>";
										   		}
										   ?>
										</select>
									</div>
								</div>	
								<div class="row form-group"> 
									<div class="col-md-6">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Categoria</label><BR>
										<select class="form-control f12" id="id_key_categoria" name="id_key_categoria">
										   <option value="--">Selecione a categoria</option>
										   <?
										   		foreach ($cat1 as $cat3) 
										   		{
										   			echo "<option value='".$cat3['id_key']."' template='".$cat3['template']."' ";
										   			if ($vei3['id_key_categoria']==$cat3['id_key']) echo "selected ";
										   			echo ">".$cat3['nome']."</option>";
										   		}
										   ?>
										</select>
									</div>
									<div class="col-md-6"> 
										<label class="control-label text-right f12" for="Fcpf_cnpj">Marca</label><BR>
										<select class="form-control f12" id="id_key_marca" name="id_key_marca">
										   <option value="--">Selecione a marca</option>
										   <?
										   		if ($mar1)
										   		{
											   		foreach ($mar1 as $mar3) 
											   		{
											   			echo "<option value='".$mar3['id_key']."' ";
											   			if ($vei3['id_key_marca']==$mar3['id_key']) echo "selected ";
											   			echo ">".$mar3['nome']."</option>";
											   		}
										   		}
										   ?>
										</select>
									</div>
						        </div>
								<div class="row form-group"> 
									<div class="col-md-9">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Modelo</label><BR>
										<select class="form-control f12" id="id_key_modelo" name="id_key_modelo">
											<option value="--">Selecione o modelo</option>
										    <?
										   		if ($mod1)
										   		{
											   		foreach ($mod1 as $mod3) 
											   		{
											   			echo "<option value='".$mod3['id_key']."' ";
											   			if ($vei3['id_key_modelo']==$mod3['id_key']) echo "selected ";
											   			echo ">".$mod3['nome']." (".$mod3['anos'].")</option>";
											   		}
										   		}
										    ?>
										</select>
									</div>
									<div class="col-md-3">
										<label class="control-label text-right f12 col-md-12" >Preço de venda</label><BR>
										<input type="text" name="preco" id="preco" class="form-control f12b maskMoneyBR text-right" value="<?=number_format(@$vei3['preco'],2)?>" >
									</div>
								</div>

								<div class="row form-group"> 

									<div class="col-md-4">
										<label class="control-label text-right f12" >Estado Cadastro</label><BR>
										<select class="form-control f12" id="estado" name="estado">
										   <option value='0' <? if (@$vei3['estado']=="0") echo "selected ";?>>Rascunho</option>
										   <option value='9' <? if (@$vei3['estado']=="9") echo "selected ";?>>Publicado</option>
										</select>
									</div>									

									<div class="col-md-4">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Disponível para locação</label><BR>
										<select class="form-control f12" id="locacao" name="locacao">
											<option value="N" <? if (@$vei3['locacao']=="N") echo "selected"; ?>>NÃO</option>
											<option value="S" <? if (@$vei3['locacao']=="S") echo "selected"; ?>>SIM</option>
										</select>
									</div>
									<div class="col-md-4 Dlocacao">
										<label class="control-label text-right f12 col-md-12" >Valor Locação</label><BR>
										<input type="text" name="valor_locacao" id="valor_locacao" 
															class="form-control f12b maskMoneyBR text-right" 
															value="<?=number_format(@$vei3['valor_locacao'],2)?>" >
									</div>
								</div>

								<!-- TEMPLATE 01 -->
						    	 <div class="row form-group template_1 templates" <?=(($vei3['Ctemplate']<>"1") ? "style='display:none;'" : "")?>>
									<div class="col-md-6">
										<label class="control-label text-right f12" >Motorização</label><BR>
										<select class="form-control f12" id="motor_1" name="motor_1">
										   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
										   <option value='GLP' <? if (@$vei3['motor']=="GLP") echo "selected ";?>>GLP</option>
										   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
										</select>
									</div>									

									<div class="col-md-6">
										<label class="control-label text-right f12" >Tipo de torre</label><BR>
										<select class="form-control f12" id="tipo_torre_1" name="tipo_torre_1">
										   <option value='Duplex' <? if (@$vei3['tipo_torre']=="Duplex") echo "selected ";?>>Duplex</option>
										   <option value='Triplex' <? if (@$vei3['tipo_torre']=="Triplex") echo "selected ";?>>Triplex</option>
										</select>
									</div>		
							     </div>

							     <div class="row form-group template_1 templates" <?=(($vei3['Ctemplate']<>"1") ? "style='display:none;'" : "")?>>
							     
									<div class="col-md-6">
										<label class="control-label text-right f12" >Cap. Carga</label><BR>
										<select class="form-control f12" id="cap_carga_1" name="cap_carga_1">
										   <option value='2500kg' <? if (@$vei3['cap_carga']=="2500kg") echo "selected ";?>>2500kg</option>
										   <option value='3000kg' <? if (@$vei3['cap_carga']=="3000kg") echo "selected ";?>>3000kg</option>
										   <option value='3500kg' <? if (@$vei3['cap_carga']=="3500kg") echo "selected ";?>>3500kg</option>
										   <option value='3600kg' <? if (@$vei3['cap_carga']=="3600kg") echo "selected ";?>>3600kg</option>
										   <option value='3800kg' <? if (@$vei3['cap_carga']=="3800kg") echo "selected ";?>>3800kg</option>
										   <option value='AC500' <? if (@$vei3['cap_carga']=="AC500") echo "selected ";?>>Acima de 5000kg</option>
										</select>
									</div>									

									<div class="col-md-6">
										<label class="control-label text-right f12" >Cap. Elevação</label><BR>
										<select class="form-control f12" id="cap_elevacao_1" name="cap_elevacao_1">
										   <option value='Até 3,5 metros' <? if (@$vei3['cap_elevacao']=="Até 3,5 metros") echo "selected ";?>>Até 3,5 metros</option>
										   <option value='4 a 5 metro' <? if (@$vei3['cap_elevacao']=="4 a 5 metro") echo "selected ";?>>4 a 5 metro</option>
										   <option value='Acima de 5 metros' <? if (@$vei3['cap_elevacao']=="Acima de 5 metros") echo "selected ";?>>Acima de 5 metros</option>
										</select>
									</div>									

								 </div>
								 <!-- FIM TEMPLATE 01 -->

								<!-- TEMPLATE 02 -->
						    	 <div class="row form-group template_2 templates" <?=(($vei3['Ctemplate']<>"2") ? "style='display:none;'" : "")?>>
									<div class="col-md-6">
										<label class="control-label text-right f12" >Motorização</label><BR>
										<select class="form-control f12" id="motor_2" name="motor_2">
										   <option value='Manual' <? if (@$vei3['motor']=="Manual") echo "selected ";?>>Manual</option>
										   <option value='Semi Elétrica' <? if (@$vei3['motor']=="Semi Elétrica") echo "selected ";?>>Semi Elétrica</option>
										   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
										</select>
									</div>									

							     </div>

							     <div class="row form-group template_2 templates" <?=(($vei3['Ctemplate']<>"2") ? "style='display:none;'" : "")?>>
							     
									<div class="col-md-6">
										<label class="control-label text-right f12" >Cap. Carga</label><BR>
										<select class="form-control f12" id="cap_carga_2" name="cap_carga_2">
										   <option value='1000kg' <? if (@$vei3['cap_carga']=="1000kg") echo "selected ";?>>1000kg</option>
										   <option value='1500kg' <? if (@$vei3['cap_carga']=="1500kg") echo "selected ";?>>1500kg</option>
										   <option value='2000kg' <? if (@$vei3['cap_carga']=="2000kg") echo "selected ";?>>2000kg</option>
										   <option value='2500kg' <? if (@$vei3['cap_carga']=="2500kg") echo "selected ";?>>2500kg</option>
										   <option value='3000kg' <? if (@$vei3['cap_carga']=="3000kg") echo "selected ";?>>3000kg</option>
										</select>
									</div>									

									<div class="col-md-6">
										<label class="control-label text-right f12" >Cap. Elevação</label><BR>
										<select class="form-control f12" id="cap_elevacao_2" name="cap_elevacao_2">
										   <option value='Sem elevação' <? if (@$vei3['cap_elevacao']=="Sem elevação") echo "selected ";?>>Sem elevação</option>
										   <option value='Até 2 metros' <? if (@$vei3['cap_elevacao']=="Até 2 metros") echo "selected ";?>>Até 2 metros</option>
										   <option value='Acima de 2 metros' <? if (@$vei3['cap_elevacao']=="Acima de 2 metros") echo "selected ";?>>Acima de 2 metros</option>
										</select>
									</div>									

								 </div>
								 <!-- FIM TEMPLATE 02 -->
						     </div>

							<div class='card-body border-left-info shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Localização</h5>
								    </div>
							    </div>
							     <div class="row form-group">
							     
									<div class="col-md-5">
										<label class="control-label text-right f12" >Estado</label><BR>
										<select class="form-control f12" id="uf" name="uf">
											<option value='xx'>Selecione o Estado</option>
											<?
											foreach ($est1 as $est3)
											{
												echo "<option value='".$est3['uf']."' ";
												if ($est3['uf']==@$vei3['uf']) echo " selected ";
												echo ">".$est3['nome']."</option>";
											}
											?>
										</select>
									</div>									
									<div class="col-md-7">
										<label class="control-label text-right f12" for="Fcpf_cnpj">Cidade</label><BR>
										<input type="text" name="cidade" id="cidade" class="form-control f12" value="<?=@$vei3['cidade']?>">
									</div>									
								 </div>
							</div>

							<div class='card-body border-left-info shadow py-2' style='margin-left:10px; margin-right:10px; margin-bottom:15px; padding:10px;'>
							    <div class='row' style='padding:10px;'>
								    <div class='col-md-12'>
								    	<h5>Estado do veículo</h5>
								    </div>
							    </div>
							     <div class="row form-group">
							     
									<div class="col-md-4">
										<label class="control-label text-right f12" >Estado</label><BR>
										<select class="form-control f12" id="estado_veiculo" name="estado_veiculo">
											<option value='Ótimo estado' <?if(@$vei3['estado']=="Ótimo estado") echo "selected "; ?>>Ótimo estado</option>
											<option value='⁠Bom estado' <?if(@$vei3['estado']=="Bom estado") echo "selected "; ?>>⁠Bom estado</option>
											<option value='Estado regular' <?if(@$vei3['estado']=="Estado regular") echo "selected "; ?>>Estado regular</option>
											<option value='⁠Estado ruim' <?if(@$vei3['estado']=="Estado ruim") echo "selected "; ?>>⁠Estado ruim</option>
										</select>
									</div>				
														
									<div class="col-md-4">
										<label class="control-label text-right f12" >Condição</label><BR>
										<select class="form-control f12" id="condicao" name="condicao">
											<option value='Semi-nova' <?if(@$vei3['condicao']=="Semi-nova") echo "selected "; ?>>Semi-nova</option>
											<option value='⁠Usada' <?if(@$vei3['condicao']=="Usada") echo "selected "; ?>>Usada</option>
										</select>
									</div>		

									<div class="col-md-4">
										<label class="control-label f12" for="horimetro">Horímetro</label><BR>
										<input type="text" name="horimetro" id="horimetro" class="form-control f12 text-right" value="<?=@$vei3['horimetro']?>">
									</div>									
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
					  <button type="button" class="btn btn-secondary btn-sm" onclick="window.location='veiculos_usados.php';">↩️ VOLTAR</button>&nbsp;
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
	
     <script src="../globais/vendedor/js/pages/veiculos_usados.js">
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