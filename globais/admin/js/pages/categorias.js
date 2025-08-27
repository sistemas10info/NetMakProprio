		// < Configuracoes iniciais da pagina **********************************************
		$(document).ready(function() {
			
			//Para voltar o foco ao modal anterior
			$(".modal-content").parent().parent().css("overflow", "auto");

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


function add_categoria_marca() 
{
    Swal.fire({
        title: 'Digite a categoria do produto',
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
                url: '../globais/admin/json/categorias/salvar_categoria_produto.php',
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

