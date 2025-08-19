		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");

			  
			$(".maskCelular").inputmask({
				mask: ['(99) 9999-9999', '(99) 99999-9999'],
				keepStatic: true
			});			  

		});

		// > Configuracoes iniciais da pagina **********************************************
		
		// < configuracoes do Bootgrid *****************************************************
		if ($("#table-usuarios").length)
		{
			var grid = $("#table-usuarios").bootgrid({
				labels: {
					noResults: "Não foi encontrado nenhum resultado!",
					infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros",
					loading: "Aguarde",
					refresh: "Atualizar",
					search: "Pesquisar"
				},
				formatters: {
					"commands": function(column, row){
						return"<img class=\"command-edit-planilhas\" data-row-id=\"" +  row.id + "\" data-title=\"Planilhas\" id=\"btnPlanilhas\" src=\"../img/checklist-icon.png\" width=\"30px\" height=\"30px\" title=\"Usuários\" style=\"cursor: pointer;\">" 
										}
				},
				ajax: true,
				url: "../globais/admin/json/usuarios/list.php",
				templates: {
					header: "<div id=\"{{ctx.id}}\" class=\"{{css.header}}\"><div class=\"row\"><div class=\"col-xs-12 actionBar\"><p class=\"{{css.search}}\"></p><p class=\"{{css.actions}}\"></p>&nbsp;&nbsp;<a href='usuarios_edit.php' class=\"btn btn-primary\" id=\"btnAdicionar\">+ Adicionar</a></div></div></div>"
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
					window.location="usuarios_edit.php?id="+($(this).data("row-id"));
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


$('#formUploadAvatar').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('formUploadAvatar');
    var formData = new FormData(form);

	formData.append('id', $('#id').val());
	
    var file = $('#logo')[0].files[0];
    if (!file || !file.type.startsWith('image/')) {
        alert('Por favor, selecione uma imagem válida.');
        return;
    }

	$('#resultado_avatar').html('<div class="col-md-12 text-center"><BR><BR><img src="../global/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
	
    $.ajax({
        url: '../globais/admin/json/usuarios/upload_avatar.php', // PHP que irá processar
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
			$('#resultado_avatar').html(imagem);
			
        },
        error: function () {
            $('#resultado_avatar').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});


$('#FormUsuario').on('submit', function (e) {

    e.preventDefault(); // evita o envio normal do formulário

    var form = document.getElementById('FormUsuario');
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
	        url: '../globais/admin/json/usuarios/post.php', // PHP que irá processar
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


$('#botao_lixeira').on('click', function(e) {

	e.preventDefault();

   Swal.fire({
      title: 'Está seguro de enviar o usuário para a lixeira ?',
      text: "",
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
	        url: '../globais/admin/json/usuarios/mover_usuario_lixeira.php', // PHP que irá processar
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
	
				window.location="vendedores.php";
							
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
