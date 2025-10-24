// < Configuracoes iniciais da pagina **********************************************
$(document).ready(function() {
	
	//Para voltar o foco ao modal anterior
	$(".modal-content").parent().parent().css("overflow", "auto");
	
	$('.resultado').hide();

});

// > Configuracoes iniciais da pagina **********************************************

$('[data-toggle="tooltip"]').tooltip();

function ver_marcas(Xid_key_categoria) 
{

  Xid_key_linha=$('#id_key_linha').val();
  console.log("ID_key....".Xid_key_categoria);
  $('#id_key_categoria').val(Xid_key_categoria);
  $('#id_key_marca').val();
  $('.categorias').hide();
  $('#categoria_'+Xid_key_categoria).show();
  $('#div_modelos').html('');
  $('#div_marcas').html('<div class="col-md-12 text-left"><BR><BR><img src="../globais/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
  $('#div_marcas').load("../globais/admin/json/linhas/lst_marcas.php",{'id_key_linha' : Xid_key_linha, 'id_key_categoria' : Xid_key_categoria});

}

function ver_modelos(Xid_key_marca) 
{

  Xid_key_linha=$('#id_key_linha').val();
  Xid_key_categoria=$('#id_key_categoria').val();
  console.log("ID_key....".Xid_key_marca);
  $('#id_key_marca').val(Xid_key_marca);
  $('.marcas').hide();
  $('#marca_'+Xid_key_marca).show();
  $('#div_modelos').html('<div class="col-md-12 text-left"><BR><BR><img src="../globais/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
  $('#div_modelos').load("../globais/admin/json/linhas/lst_modelos.php",{'id_key_linha' : Xid_key_linha,'id_key_categoria' : Xid_key_categoria, 'id_key_marca' : Xid_key_marca});

}


function add_categoria() 
{
    Swal.fire({
        title: 'Digite a categoria',
        input: 'text',
        inputLabel: 'Categoria',
        inputPlaceholder: 'Escreva aqui...',
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
            const texto = result.value;

            // Envia via AJAX para salvar
            $.ajax({
                url: '../globais/admin/json/linhas/salvar_categoria.php',
                type: 'POST',
                data: { 'id_key_linha': $('#id_key_linha').val(),
                		   'nome' : texto },
                success: function(response) {
                    Swal.fire('Salvo!', 'A categoria foi salva com sucesso.', 'success');
                    ver_categorias();
                },
                error: function() {
                    Swal.fire('Erro!', 'Houve um erro ao salvar o texto.', 'error');
                }
            });
        }
    });
}

function add_marca() 
{
    Swal.fire({
        title: 'Digite a marca',
        input: 'text',
        inputLabel: 'Marca',
        inputPlaceholder: 'Escreva aqui...',
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
            const texto = result.value;

            // Envia via AJAX para salvar
            $.ajax({
                url: '../globais/admin/json/linhas/salvar_marca.php',
                type: 'POST',
                data: { 'nome': texto,
                		    'id_key_linha' : $('#id_key_linha').val(),
                		     'id_key_categoria' : $('#id_key_categoria').val()
                		 },
                success: function(response) {
                    Swal.fire('Salvo!', 'O texto foi salvo com sucesso.', 'success');
                    ver_marcas($('#id_key_categoria').val());
                },
                error: function() {
                    Swal.fire('Erro!', 'Houve um erro ao salvar o texto.', 'error');
                }
            });
        }
    });
}

function add_modelo() {
    Swal.fire({
        title: 'Preencha os dados do modelo',
        html:
            '<input id="nome" class="form-control mb-2" placeholder="Digite o nome">' +
            '<input id="anos" class="form-control" placeholder="Digite os anos">',
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const nome = $('#nome').val().trim();
            const anos = $('#anos').val().trim();

            if (!nome || !anos) {
                Swal.showValidationMessage('Preencha todos os campos');
                return false;
            }

            return { nome: nome, anos: anos };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '../globais/admin/json/linhas/salvar_modelo.php',
                type: 'POST',
                data: {
                    'nome' : result.value.nome,
                    'anos' : result.value.anos,
                    'id_key_linha' : $('#id_key_linha').val(),
                    'id_key_categoria' : $('#id_key_categoria').val(),
                   	'id_key_marca' : $('#id_key_marca').val() 
                },
                success: function(resposta) {
                    Swal.fire('Sucesso!', 'Dados enviados com sucesso.', 'success');
                    ver_modelos($('#id_key_marca').val()); 
                },
                error: function() {
                    Swal.fire('Erro!', 'Não foi possível enviar os dados.', 'error');
                }
            });
        }
    });
}

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
	        url: '../globais/admin/json/linhas/apagar_registro.php', 
	        type: 'POST',
	        data: { 
	        			"id_key" : Xid_key,
	        		    "tipo" : Xtipo
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
	
			    switch (Xtipo) 
			    {
			        case "categorias":
			            window.location="linhas.php";
			            break;
			        case "categorias_marcas":
			            window.location="linhas.php";
			            break;
			        case "marcas":
			            ver_marcas($('#id_key_categoria').val());
			            break;
			        case "modelos":
			            ver_modelos($('#id_key_marca').val());
			            break;
			    }
							
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


function add_categoria_marca() 
{
    Swal.fire({
        title: 'Digite a categoria da marca',
        input: 'text',
        inputLabel: 'Categoria',
        inputPlaceholder: 'Escreva aqui...',
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
            const texto = result.value;

            // Envia via AJAX para salvar
            $.ajax({
                url: '../globais/admin/json/linhas/salvar_categoria_marca.php',
                type: 'POST',
                data: { 'nome' : texto },
                success: function(response) {
                    Swal.fire('Salvo!', 'A categoria foi salva com sucesso.', 'success');
                    window.location="categorias.php";
                },
                error: function() {
                    Swal.fire('Erro!', 'Houve um erro ao salvar o texto.', 'error');
                }
            });
        }
    });
}



function ver_categorias() 
{

  Xid_key_linha=$('#id_key_linha').val();
  if (Xid_key_linha === "xx")
  {
	  Swal.fire('Atenção!', 'Precisa escolher uma linha.', 'info');
	  return;
  }

  $('.resultado').show();
  
  $('#div_marcas').html('');
  $('#div_modelos').html('');
  
  $('#div_categorias').html('<div class="col-md-12 text-left"><BR><BR><img src="../globais/images/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
  $('#div_categorias').load("../globais/admin/json/linhas/lst_categorias.php",{'id_key_linha' : Xid_key_linha});

}
