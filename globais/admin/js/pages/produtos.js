		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");
			
			$('.maskMoneyBR').maskMoney();

			  $('#descrip').summernote({
			    height: 300,
			    fontNames: ['Arial', 'Verdana', 'Times New Roman', 'Courier New', 'Georgia'],
			    fontSizes: ['8', '10', '12', '14', '16', '18', '20', '24', '28', '36'],
			    toolbar: [
			      ['style', ['style']],
			      ['font', ['bold', 'italic', 'underline', 'clear']],
			      ['fontsize', ['fontsize']],
			      ['fontname', ['fontname']],
			      ['color', ['color']],
			      ['para', ['ul', 'ol', 'paragraph']],
			      ['height', ['height']],
			      ['insert', ['picture', 'link', 'video']],
			      ['view', ['fullscreen', 'codeview', 'help']]
			    ],
			    callbacks: {
			      onKeydown: function(e) {
			        if (e.keyCode === 13) { // Enter
			          e.preventDefault();
			          document.execCommand('insertLineBreak');
			        }
			      },
			      onImageUpload: function(files) {
			        // Aqui você pode enviar as imagens via AJAX para o servidor
			        // ou exibir diretamente (apenas para testes locais)
			        for (let i = 0; i < files.length; i++) {
			          const reader = new FileReader();
			          reader.onload = function(e) {
			            $('#quem_somos').summernote('insertImage', e.target.result, 'imagem');
			          };
			          reader.readAsDataURL(files[i]);
			        }
			      }
			    }
			  });
			  

		});
		
		// > Configuracoes iniciais da pagina **********************************************
		
		// < configuracoes do Bootgrid *****************************************************
		if ($("#table-produtos").length)
		{
			var grid = $("#table-produtos").bootgrid({
				labels: {
					noResults: "Não foi encontrado nenhum resultado!",
					infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros",
					loading: "Aguarde",
					refresh: "Atualizar",
					search: "Pesquisar"
				},
				formatters: {
					"commands": function(column, row){
						return"<img class=\"command-edit-planilhas\" data-row-id=\"" +  row.id + "\" data-title=\"Planilhas\" id=\"btnPlanilhas\" src=\"../img/checklist-icon.png\" width=\"30px\" height=\"30px\" title=\"Planilhas de Veículos\" style=\"cursor: pointer;\">" 
										}
				},
				ajax: true,
				url: "../globais/admin/json/produtos/list.php",
				templates: {
					header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-xs-12 actionBar\"><p class=\"{{css.search}}\"></p><p class=\"{{css.actions}}\"></p>&nbsp;&nbsp;<a href='produtos_edit.php' class=\"btn btn-primary\" id=\"btnAdicionar\">+ Adicionar</a></div></div></div>"
				},
				columnSelection : false,
				ajaxSettings: {
					method: "POST",
					cache: false
				},
				searchSettings: {
					delay: 100,
					characters: 3
				},
	
	
				caseSensitive:false /* make search case insensitive */
			}).on("loaded.rs.jquery.bootgrid", function()
			{
				/* Executes after data is loaded and rendered */
				grid.find(".command-map").on("click", function(e)
				{
					//$('#id_key').val($(this).data("row-id"));
					window.location="produtos_edit.php?id="+($(this).data("row-id"));
					//$('#ModalEditar').modal('show');
				});
			});
			// > configuracoes do Bootgrid *****************************************************
		}
		
		$('[data-toggle="tooltip"]').tooltip();
		
		load_imagens($('#id').val());


// $('#formUploadImagemSeo').on('submit', function (e) {

$('#btnUploadImagemSeo').on('click', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    // var form = document.getElementById('formUploadImagemSeo');
    // var formData = new FormData(form);
	var formData = new FormData();
	
	// Adiciona o arquivo do input file (id="arquivo")
	var arquivo = $('#link_seo')[0].files[0]; 
	formData.append('link_seo', arquivo);
	
	// Adiciona o campo hidden (id="idRegistro")
	formData.append('id', $('#id').val());
	formData.append('titulo', $('#titulo').val());
	
    var file = $('#link_seo')[0].files[0];
    if (!file || !file.type.startsWith('image/')) {
        alert('Por favor, selecione uma imagem válida.');
        return;
    }

	$('#resultado_link_seo').html('<div class="col-md-12 text-center"><BR><BR><img src="../global/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
	
    $.ajax({
        url: '../globais/admin/json/produtos/upload_seo.php', // PHP que irá processar
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (dataReturn) {
			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
				link = response.link;
				imagem = response.imagem;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			console.log("Mensagem - Link : "+mensagem+" - "+link);
			$('#resultado_link_seo').html(imagem);
			
        },
        error: function () {
            $('#resultado_link_seo').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});

$('#FormProduto').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('FormProduto');
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
	        url: '../globais/admin/json/produtos/post.php', // PHP que irá processar
	        type: 'POST',
	        data: formData,
	        processData: false,
	        contentType: false,
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
				
				// window.location="vendedores_edit.php?id="+response.id;
							
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

});


$('#btnUploadImagemSite').on('click', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    // var form = document.getElementById('formUploadImagemSeo');
    // var formData = new FormData(form);
	var formData = new FormData();
	
	// Adiciona o arquivo do input file (id="arquivo")
	var arquivo = $('#imagem_site')[0].files[0]; 
	formData.append('imagem_site', arquivo);
	
	// Adiciona o campo hidden (id="idRegistro")
	formData.append('id', $('#id').val());
	formData.append('titulo', $('#titulo').val());
	
    var file = $('#imagem_site')[0].files[0];
    if (!file || !file.type.startsWith('image/')) {
        alert('Por favor, selecione uma imagem válida.');
        return;
    }

	$('#resultado_imagem_site').html('<div class="col-md-12 text-center"><BR><BR><img src="../global/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
	
    $.ajax({
        url: '../globais/admin/json/produtos/upload_imagem_site.php', // PHP que irá processar
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (dataReturn) {
			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			$('#lista_imagens_site').html(response.imagens_carrousel);
			$('#resultado_imagem_site').html(response.imagens);
			$('#id').val(response.id);
			
        },
        error: function () {
            $('#resultado_imagem_site').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});


function ver_imagem(Xid_key,Xid_key_origem="")
{

	console.log(Xid_key+" - "+Xid_key_origem);
	
	Xid_key_origem=$('#id').val();

    $.ajax({
        url: '../globais/admin/json/produtos/load_imagens_carrousel.php', // PHP que irá processar
        type: 'POST',
        data: { 'id_key' : Xid_key,
        		   'id_key_origem' : Xid_key_origem},
        success: function (dataReturn) {
			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			$('#lista_imagens_site').html(response.imagens_carrousel);
			$('#ModalImagensSite').modal('show');
			
        },
        error: function () {
	        Swal.fire(
	          'Erro na leitura de imagens..',
	          '',
	          'warning'
	        );
        }
    });

}

function load_imagens(Xid_key_origem="")
{

if (Xid_key_origem !== "")
{
    $.ajax({
        url: '../globais/admin/json/produtos/load_imagens_site.php', // PHP que irá processar
        type: 'POST',
        data: { 'id_key_origem' : Xid_key_origem },
        success: function (dataReturn) {
			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			$('#resultado_imagem_site').html(response.imagens);
			
        },
        error: function () {
            $('#resultado_imagem_site').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
}
else
{
     $('#resultado_imagem_site').html("");
}

}

function apaga_imagem(Xid_key)
{

Swal.fire({
  title: 'Tem certeza de apagar a imagem ?',
  text: "Você não poderá reverte isto.",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: 'red',
  cancelButtonColor: 'silver',
  confirmButtonText: 'Sim',
  cancelButtonText: 'Cancelar'
}).then((result) => {
  if (result.isConfirmed) 
  {
	 $.ajax({
        url: '../globais/admin/json/produtos/apagar_imagem.php', // PHP que irá processar
        type: 'POST',
        data: { 'id_key' : Xid_key },
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
			
			load_imagens($('#id').val());
						
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
      'A imagem não foi apagada...',
      'info'
    );
  }
});

}

function altera_titulo(Xid_key,Xtitulo="")
{


    Swal.fire({
        title: 'Digite o titulo',
        input: 'text',
        inputPlaceholder: 'Insira o titulo aqui...',
        inputValue : Xtitulo,
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Salvar',
        cancelButtonText: 'Cancelar',
        inputValidator: (value) => {
            if (!value) {
                return 'O campo não pode estar vazio!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            let Xtitulo = result.value;

			 $.ajax({
		        url: '../globais/admin/json/produtos/altera_titulo.php', // PHP que irá processar
		        type: 'POST',
		        data: { 'id_key' : Xid_key,
		        		   'titulo' : Xtitulo },
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
					
					load_imagens($('#id').val());
								
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
        }
    });

}

function ver_principal()
{

Xid_key=$('input[name="principal"]:checked').val();

 $.ajax({
    url: '../globais/admin/json/produtos/confirma_principal.php', // PHP que irá processar
    type: 'POST',
    data: { 'id_key' : Xid_key,
    		   'id_key_origem' : $('#id').val() },
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
		
		load_imagens($('#id').val());
					
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

}


$('#botao_lixeira').on('click', function(e) {

	e.preventDefault();

   Swal.fire({
      title: 'Está seguro apagar o produto ?',
      text: "você não poderá reverter isto...",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'red',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Sim',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) 
      {
 		    $.ajax({
	        url: '../globais/admin/json/produtos/apagar_produto.php', // PHP que irá processar
	        type: 'POST',
	        data: {
	        			"id" : $('#id').val()
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
	
				window.location="produtos.php";
							
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

});

