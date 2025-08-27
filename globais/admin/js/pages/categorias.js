		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");

			$('#id_key_linha').on('change', function() {
			    var Xid_key_linha = $(this).val();
			
			    if (Xid_key_linha !== "--") {
			        $.ajax({
			            url: WEBSITE + "../globais/admin/json/veiculos_novos/busca_categorias.php",
			            type: 'POST',
			            data: { 'id_key_linha': Xid_key_linha },
			            dataType: 'json',
			            success: function(response) {
			            	console.log(response.categorias);
			            	$('#id_key_marca').find('option').not(':first').remove();
			                $('#id_key_categoria').find('option').not(':first').remove();
			                $.each(response.categorias, function(index, categoria) {
			                    $('#id_key_categoria').append('<option value="' + categoria.id_key + '">' + categoria.nome + '</option>');
			                });
			            },
			            error: function() {
			                alert('Erro ao carregar categorias.');
			            }
			        });
			    } 
			});
			  

			$('#id_key_categoria').on('change', function() {
			    var Xid_key_categoria = $(this).val();
			
			    if (Xid_key_categoria !== "--") {
			        $.ajax({
			            url: WEBSITE + "../globais/admin/json/veiculos_novos/busca_marcas.php",
			            type: 'POST',
			            data: { 'id_key_linha' : $('#id_key_linha').val(),
			            		   'id_key_categoria': Xid_key_categoria },
			            dataType: 'json',
			            success: function(response) {
			            	console.log(response.marcas);
			                $('#id_key_marca').find('option').not(':first').remove();
			                $.each(response.marcas, function(index, marca) {
			                    $('#id_key_marca').append('<option value="' + marca.id_key + '">' + marca.nome + '</option>');
			                });
			            },
			            error: function() {
			                alert('Erro ao carregar marcas.');
			            }
			        });
			    } 
			});

			$('#id_key_marca').on('change', function() {
			    var Xid_key_marca = $(this).val();
			
			    if (Xid_key_marca !== "--") {
			        $.ajax({
			            url: WEBSITE + "../globais/admin/json/veiculos_novos/busca_modelos.php",
			            type: 'POST',
			            data: { 'id_key_linha' : $('#id_key_linha').val(),
			            		   'id_key_categoria': $('#id_key_categoria').val(),
			            		   'id_key_marca' : Xid_key_marca },
			            dataType: 'json',
			            success: function(response) {
			            	console.log(response.modelos);
			                $('#id_key_modelo').find('option').not(':first').remove();
			                $.each(response.modelos, function(index, modelo) {
			                    $('#id_key_modelo').append('<option value="' + modelo.id_key + '">' + modelo.nome + ' ('+modelo.anos+')</option>');
			                });
			            },
			            error: function() {
			                alert('Erro ao carregar modelos.');
			            }
			        });
			    } 
			});


		});

		// > Configuracoes iniciais da pagina **********************************************
		
		$('[data-toggle="tooltip"]').tooltip();


function apagar_registro(Xid_key,Xtipo)
{

   Swal.fire({
      title: 'Deseja apagar as informações ?',
      text: "Você não poderá revertir isso",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'red',
      cancelButtonColor: 'gray',
      confirmButtonText: 'Sim',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) 
      {
 		    $.ajax({
	        url: '../globais/admin/json/categorias/apagar_registro.php', 
	        type: 'POST',
	        data: { 
	        			"id_key" : Xid_key
	           		 },
	        success: function (dataReturn) {
				try {
						response = JSON.parse(dataReturn);
						mensagem = response.msg;
						link = response.link;
						imagem = response.imagem;
				} catch (e) {
						mensagem = 'Houve um problema com nosso servidor, tente novamente.';
				}
	
			    window.location="categorias.php";
							
	        },
	        error: function (dataReturn) {
	        
					try {
						response = JSON.parse(dataReturn.responseText);
						mensagem = response.msg;
					} catch (e) {
						mensagem = 'Houve um problema com nosso servidor, tente novamente.';
					}
	        
			        Swal.fire(
			          'Verifique as informações..',
			          mensagem,
			          'info'
			        );
	        }
	        
	      });

        // Aqui você pode chamar uma função, enviar AJAX, etc.
        // Exemplo: apagarRegistro();
      } else {
        // Ação se cancelar (opcional)
        Swal.fire(
          'Cancelado',
          'Nenhuma alteração foi feita.',
          'info'
        );
      }
    });

}

function add_categoria_marca(Xid_key="")
{

	$('#id_key').val('--');
	$('#ModalLabelCategoria').html('Nova categoria');
	$('#nome').val('Nova categoria');
	$('#id_key_linha').val('--');
	$('#id_key_categoria').val('--');
	$('#id_key_marca').val('--');
	$('#btnApagar').hide();
	$('#ModalDadosCategoria').modal("show");

}

function editar_categoria_marca(Xid_key)
{

    $.ajax({
        url: '../globais/admin/json/categorias/load_categoria_produto.php',
        type: 'POST',
        data: { 'id_key' : Xid_key },
        success: function (dataReturn) {
			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
				imagem = response.imagem;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			$('#id_key').val(Xid_key);
			$('#ModalLabelCategoria').html('Editar categoria');
			$('#nome').val(response.nome);
			$('#id_key_linha').val(response.id_key_linha);
			
			Xid_key_linha=response.id_key_linha;
			Xid_key_categoria=response.id_key_categoria;
			Xid_key_marca=response.id_key_marca;
			
		    if (response.id_key_linha !== "--") 
		    {
		        $.ajax({
		            url: WEBSITE + "../globais/admin/json/veiculos_novos/busca_categorias.php",
		            type: 'POST',
		            data: { 'id_key_linha': response.id_key_linha },
		            dataType: 'json',
		            success: function(response) {
		            	console.log(response.categorias);
		            	$('#id_key_marca').find('option').not(':first').remove();
		                $('#id_key_categoria').find('option').not(':first').remove();
		                $.each(response.categorias, function(index, categoria) {
		                    $('#id_key_categoria').append('<option value="' + categoria.id_key + '">' + categoria.nome + '</option>');
		                });
		                $('#id_key_categoria').val(Xid_key_categoria);
		            },
		            error: function() {
		                alert('Erro ao carregar categorias.');
		            }
		        });
		    } 

		    if (response.id_key_categoria !== "--") 
		    {
		        $.ajax({
		            url: WEBSITE + "../globais/admin/json/veiculos_novos/busca_marcas.php",
		            type: 'POST',
		            data: { 'id_key_linha' : Xid_key_linha,
		            		   'id_key_categoria': Xid_key_categoria },
		            dataType: 'json',
		            success: function(response) {
		            	console.log(response.marcas);
		                $('#id_key_marca').find('option').not(':first').remove();
		                $.each(response.marcas, function(index, marca) {
		                    $('#id_key_marca').append('<option value="' + marca.id_key + '">' + marca.nome + '</option>');
		                });
		                $('#id_key_marca').val(Xid_key_marca);
		            },
		            error: function() {
		                alert('Erro ao carregar marcas.');
		            }
		        });
		    } 
		    
			$('#btnApagar').show();
			$('#ModalDadosCategoria').modal("show");
			
        },
        error: function () {
            $('#resultado_link_seo').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });

}


function salvar_categoria() 
{

    var form = document.getElementById('formDadosCategoria');
    var formData = new FormData(form);
    
    console.log(formData);

   Swal.fire({
      title: 'Deseja salvar as informações ?',
      text: "",
      icon: 'info',
      showCancelButton: true,
      confirmButtonColor: 'blue',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sim',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) 
      {
 		    $.ajax({
	        url: '../globais/admin/json/categorias/post.php', // PHP que irá processar
	        type: 'POST',
	        data: { 'id_key' : $('#id_key').val() ,
	        		   'nome' : $('#nome').val() ,
	        		   'id_key_linha' : $('#id_key_linha').val() ,
	        		   'id_key_categoria' : $('#id_key_categoria').val() ,
	        		   'id_key_marca' : $('#id_key_marca').val() },	
	        success: function (dataReturn) {
				try {
						response = JSON.parse(dataReturn);
						mensagem = response.msg;
						link = response.link;
						imagem = response.imagem;
				} catch (e) {
						mensagem = 'Houve um problema com nosso servidor, tente novamente.';
				}
				
				Swal.close();
				
		        Swal.fire(
		          'Dados atualizados com sucesso..',
		          '',
		          'info'
		        );
				
				window.location="categorias.php";
							
	        },
	        error: function (dataReturn) {
	        
					try {
						response = JSON.parse(dataReturn.responseText);
						mensagem = response.msg;
					} catch (e) {
						mensagem = 'Houve um problema com nosso servidor, tente novamente.';
					}
	        
			        Swal.fire(
			          'Verifique as informações..',
			          mensagem,
			          'info'
			        );
	        }
	        
	      });

      } else {
        // Ação se cancelar (opcional)
        Swal.fire(
          'Cancelado',
          'Nenhuma alteração foi feita.',
          'info'
        );
      }
    });

}


