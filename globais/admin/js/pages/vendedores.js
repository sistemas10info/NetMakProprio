		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");

			$('.summer_texto').summernote({
				toolbar: [
					// [groupName, [list of button]]
					['style', ['bold', 'italic', 'underline', 'clear']],
					['fontname', ['fontname']],
					['fontsize', ['fontsize']],
					['color', ['color']],
					['para', ['ul', 'ol', 'paragraph']],
					['height', ['height']],
					['table', ['table']],
				],
				height: 300
			});

		});


		// > Configuracoes iniciais da pagina **********************************************
		
		// < configuracoes do Bootgrid *****************************************************
		if ($("#table-vendedores").length)
		{
			var grid = $("#table-vendedores").bootgrid({
				labels: {
					noResults: "Não foi encontrado nenhum resultado!",
					infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros",
					loading: "Aguarde",
					refresh: "Atualizar",
					search: "Pesquisar"
				},
				formatters: {
					"commands": function(column, row){
						return"<img class=\"command-edit-planilhas\" data-row-id=\"" +  row.id + "\" data-title=\"Planilhas\" id=\"btnPlanilhas\" src=\"../img/checklist-icon.png\" width=\"30px\" height=\"30px\" title=\"Planilhas de EPI e ITENS emprestados\" style=\"cursor: pointer;\">" 
										}
				},
				ajax: true,
				url: "../json/funcionarios/list.php",
				templates: {
					header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-xs-12 actionBar\"><p class=\"{{css.search}}\"></p><p class=\"{{css.actions}}\"></p>&nbsp;&nbsp;<button class=\"btn btn-primary\" id=\"btnAdicionar\">+</button></div></div></div>"
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
					window.location="vendedores_edit.php?id="+($(this).data("row-id"));
					//$('#ModalEditar').modal('show');
	
				}).end().find(".command-edit-planilhas").on("click", function(e)
				{
					//location.href="administradoras/edit.php?id_key="+$(this).data("row-id");
					//$('#id_key').val($(this).data("row-id"));
					editar_planilhas($(this).data("row-id"));
					//$('#ModalEditar').modal('show');
				});
			});
			// > configuracoes do Bootgrid *****************************************************
		}
		
		$('[data-toggle="tooltip"]').tooltip();


// < Submit do formulário editar ***************************************************************
form = $('form[name=formGrupo]');
btnEnviar = $('button[name=btnEnviarGrupo]');

btnEnviar.click(function(e) {
	formData = form.serializeArray();
	//console.log(formData);
		$.ajax({
			url: WEBSITE + form.attr('action'),
			data: formData,
			method: 'POST',
			beforeSend: function() {
				btnEnviar.attr("disabled", "disabled");
				btnEnviar.html("<i class='fa fa-spinner fa-spin fa-fw'></i> Aguarde...")
			}
		}).success(function(dataReturn) {

			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
				id_key = response.id_key;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			swal({
				title: 'Sucesso!',
				text: mensagem,
				type: 'success',
				showConfirmButton: false,
				timer: 1500
			})
			btnEnviar.removeAttr("disabled");
			btnEnviar.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");
			$('#ModalEditar').modal("hide");
			//Carrega lista página
			$('#table-grupos').bootgrid('reload');
		}).fail(function(dataReturn) {

			try {
				response = JSON.parse(dataReturn.responseText);
				mensagem = response.msg;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			swal({
						position: 'top-right',
						title: 'Ops, tivemos um problema',
						text: mensagem,
						type: 'warning',
						showConfirmButton: false,
						timer: 1500
			})

			btnEnviar.removeAttr("disabled");
			btnEnviar.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");

		});
});
// > Submit do formulário editar ***************************************************************

$('#formUploadLogo').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('formUploadLogo');
    var formData = new FormData(form);

    var file = $('#logo')[0].files[0];
    if (!file || !file.type.startsWith('image/')) {
        alert('Por favor, selecione uma imagem válida.');
        return;
    }

	$('#resultado_logo').html('<div class="col-md-12 text-center"><BR><BR><img src="../global/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
	
    $.ajax({
        url: '../globais/admin/json/vendedores/upload_logo.php', // PHP que irá processar
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
			$('#resultado_logo').html(imagem);
			
        },
        error: function () {
            $('#resultado').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});

$('#formUploadBanner').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('formUploadBanner');
    var formData = new FormData(form);

    var file = $('#banner')[0].files[0];
    if (!file || !file.type.startsWith('image/')) {
        alert('Por favor, selecione uma imagem válida.');
        return;
    }

	$('#resultado_baner').html('<div class="col-md-12 text-center"><BR><BR><img src="../global/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
	
    $.ajax({
        url: '../globais/admin/json/vendedores/upload_banner.php', // PHP que irá processar
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
			$('#resultado_banner').html(imagem);
			
        },
        error: function () {
            $('#resultado').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});


$('#FormVendedor').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('FormVendedor');
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
	        url: '../globais/admin/json/vendedores/post.php', // PHP que irá processar
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
	
				window.location="vendedores_edit.php?id="+response.id;
							
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


function gerar_senha()
{

$('#altera_senha').val(1);
const letras = 'abcdefghijklmnopqrstuvwxyz';
const numeros = '0123456789';
let resultado = '';

// Gerar 4 letras minúsculas
for (let i = 0; i < 4; i++) {
resultado += letras.charAt(Math.floor(Math.random() * letras.length));
}

// Gerar 4 números
for (let i = 0; i < 4; i++) {
resultado += numeros.charAt(Math.floor(Math.random() * numeros.length));
}

$('#senha').show();
$('#senha').val(resultado);

}