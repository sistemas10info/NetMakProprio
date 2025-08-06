		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");
		

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
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			console.log("Mensagem - Link : "+mensagem+" - "+link);
			
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
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			console.log("Mensagem - Link : "+mensagem+" - "+link);
			
        },
        error: function () {
            $('#resultado').html('<div class="alert alert-danger">Erro no upload.</div>');
        }
    });
});