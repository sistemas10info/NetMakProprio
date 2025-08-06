this.scrollToElement = function (element) {

    if($(element.toLowerCase()).length) {
        $('html, body').stop().animate({
            scrollTop: $(element.toLowerCase()).offset().top - 100
        }, 2000);
    }

}

this.apenasNumeros = function(elementPai) {
   elementPai.find('.apenas_numeros').keypress(function(event){
      if(event.which != 8 && isNaN(String.fromCharCode(event.which))){
         event.preventDefault(); //stop character from entering input
      }
   });
}

this.getImagens = function(id_key_origem, callback) {
    requestToServer(
        'json/imagens/get-imagens.php', 
        {
        'id_key_origem' : id_key_origem
        }, 
        'POST', 
        function(response) {
            loadPage(
               WEBSITE+'pages/template/imagens.html',
               function(template) {
                   callback(renderPage(template, response));
               }
            );
        }, 
        function(response) {
            $.gritter.add({
               title   : 'Ops, tivemos um problema!',
               text    : 'Não foi possveil carrregar as imagens',
               sticky  : false,
               time    : 8000,
               class_name: 'my-sticky-class'
            });
        }
    ); 
}

this.enviarImagem = function(e) {
    form     = $(e).closest('form[name=formImagens]');
    formData = form.serializeArray();
    
    requestToServer(
      'json/imagens/put-imagem.php', 
      formData, 
      'POST', 
      function(response) {
        $.gritter.add({
            text    : response.msg,
            sticky  : false,
            time    : 8000,
            class_name: 'my-sticky-class'
        });
      },
      function(response) {
        $.gritter.add({
            text    : 'Não foi possivel salvar',
            sticky  : false,
            time    : 8000,
            class_name: 'my-sticky-class'
        });
      }
   );
}

this.openImage = function(id_key_imagem) {
   $modal_image      = $('#modalFormImagen');
   
   requestToServer(
      'json/imagens/get-imagem.php', 
      {
         'id_key' : id_key_imagem
      }, 
      'POST', 
      function(response) {
         
         loadPage(
            WEBSITE+'pages/template/form-imagem.html',
            function(template) {
               $modal_image.find('.modal-content').html(renderPage(template, mergeObjects(response, {id_key_imagem: id_key_imagem})));
               
               if(response.imagens[0] != undefined) {
                   $.each(response.imagens[0], function(i,e) {
                       if(i == 'mostra_outros' || i == 'mostra_site') {
                        if(e != '--')
                            $modal_image.find('[name='+i+']').attr('checked', true);
                       } else {
                        $modal_image.find('[name='+i+']').val(e);
                       }
                   });
               }
               
               FormSliderSwitcher.init();
            }
         );
         
      }
   );
   
   $modal_image.modal('show');
}

this.deleteImage = function(id_key_imagem, element) {
   
   requestToServer(
      'json/imagens/delete-imagem.php', 
      {
         'id_key' : id_key_imagem
      }, 
      'POST', 
      function(response) {
        $(element).parents('[id-key-images='+id_key_imagem+']').remove(); 
      },
      function() {
        $.gritter.add({
           title   : 'Ops, tivemos um problema!',
           text    : 'Não foi remover a imagem',
           sticky  : false,
           time    : 8000,
           class_name: 'my-sticky-class'
        });
      }
   );
   
}

/*
* Envia requests para o servidor
*
* @param string - page = URL que sera executada (vide case da funcao)
* @param object - dataSend (opcional) = Objeto que sera enviado para o processamento backend (.php)
* @param string - method que ser utilizado (POST, GET, PUT, DELETE, PATCH)
* @param function() - callback (opcional)
* @param function() - callback  error(opcional)
*/

this.requestToServer = function(page, dataSend, method, callbackSucess, callBackError) {

    $.ajax({
        url    : WEBSITE+page,
        data   : dataSend,
        method : method,
        complete : function(data) {
            // script
        },
        success: function (data) {

            try {
                returnData = JSON.parse(data); // Converte retorno  para JSON
            } catch (error) {
                returnData = 'false';
                console.log(data);
            }
            
            if (callbackSucess)
                callbackSucess(returnData);
        },
        error: function (jqXHR, statusError) {
            textError  = jqXHR.responseText;

            try {
                returnDataError = JSON.parse(textError); // Converte retorno  para JSON
            } catch (error) {}

            if (callBackError)
                callBackError('false');

        }
    });
    
}

/*
 * Obtem as informações  do form e converte para um objeto de informacoes
 *
 * @param String - Form
 * @return object
 */

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

/*
 * Une dois objetos
 *
 * @param object - obj1
 * @param object - obj2
 * ... obj6
 * @return object
 */

this.mergeObjects = function(obj1, obj2, obj3, obj4, obj5, obj6) {
    var response = {};

    if(obj1)
        for (var attrname in obj1) { response[attrname] = obj1[attrname]; }

    if(obj2)
        for (var attrname in obj2) { response[attrname] = obj2[attrname]; }

    if(obj3)
        for (var attrname in obj3) { response[attrname] = obj3[attrname]; }

    if(obj4)
        for (var attrname in obj4) { response[attrname] = obj4[attrname]; }

    if(obj5)
        for (var attrname in obj5) { response[attrname] = obj5[attrname]; }

    if(obj6)
        for (var attrname in obj6) { response[attrname] = obj6[attrname]; }

    return response;
}

/*
 * retorna o valor do local storage
 *
 * @param string - field
 * @return false = nao encotnrado, string caso encontrar
 */

this.getLocalStorage = function(field, format) {
    value = localStorage.getItem(field);
    if(value) {

        switch(format) {
            case 'object':
                try {
                    return JSON.parse(value);
                } catch(e) {
                    return value;
                    console.log("localStorage '"+field+"' não esta em formato de objeto");
                }
                break;

            default:
                return value;
        }

    } else {
        return false;
    }
}

/*
 * Salva o valor em local storage
 *
 * @param string - field
 * @param string - value
 */

this.setLocalStorage = function(field, value) {
    localStorage.setItem(field, value);

    if(typeof storage.field != undefined) {
        try {
            storage[field] = JSON.parse(value);
        } catch(e){
            storage[field] = value;
        }
    }
}

/*
 * Remove localstorage e limpa variavel
 *
 * @param string - field
 * @param string - value
 */

this.removeLocalStorage = function(field) {
    localStorage.removeItem(field);

    if(typeof storage.field != undefined) {
        storage[field] = null;
    }
}

/*
 * Renderiza com mustache o template
 * @param string - conteudo que sera renderizado (template)
 * @param json - informacoes a serem renderizadas no template
 * @return string - html renderizado
 */

this.renderPage = function(template, data) {
    if(!data)
        data = {};

    if(template)
        return Mustache.render(template, data);
    else
        return false;
}

/*
 * Carrega a view e automaticamente a chama
 *
 * @param sting page - URL da view
 * @param json data
 * @param boolean animate
 * @param function callback
 * @param string type
 */

this.mustacheLoad = function(div, page, data, callback) {

    $.get(page,
        function (template) {

            template = Mustache.render(template, data);

            $(div).html(template);

            if(callback)
                callback();

        }
    );
}

/*
* Desloga o usuario do painel
*/

this.sair = function() {

		$.ajax({
				url     : WEBSITE+'json/variados/deslogar.php',
				data    : {},
				method  : 'GET'
		}).success(function(dataReturn) {
			try 
			{
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} 
			catch(e)
			{
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			swal({
					position: 'top-right',
					type: 'success',
					title: 'Deslogado com sucesso!',
					text: "Você será redirecionado em 5 segundos.",
					showConfirmButton: false,
					timer: 1500
			})
			
// 				if(response.acesso == 'europa')
// 					location.href=WEBSITE+"acesso_europa/index.php"; // reload();
// 				else
// 					location.href=WEBSITE+"acesso/index.php"; // reload();
					location.href="http://carlos-ti.com/cw3/osmapCERT/painel2.0/acesso/index.php?destroy=SIM";
				// location.reload();
			});

}

/*
* Altera o status do chat
*/

this.statusChat = function(status) {
    
    Pace.track(function(){

        $.ajax({
            url     : WEBSITE+'json/chat/put-status.php',
            data    : {'status' : status},
            method  : 'POST'
        }).success(function(dataReturn) {
    
            $.gritter.add({
                title       : 'Status do Chat alterado!',
                text        : 'Agora você está .' + status,
                sticky      : false,
                time        : 8000,
                class_name  : 'my-sticky-class'
            });
    
            $('.dropdown-menu').each(function(){
				$(this).find('li').each(function(){
					var current = $(this);
					current.removeClass("bg-yellow-lighter");
				})
			});
			$('#stChat'+status).addClass("bg-yellow-lighter");
			$('#colorIcon').removeClass("text-success");
			$('#colorIcon').removeClass("text-warning");
			if(status == 'on')
			{
				$('#stChatIco').html('<i class="fa fa-check-circle text-success"></i>');
				$('#colorIcon').addClass("text-success");
			}
			else
			{
				$('#stChatIco').html('<i class="fa fa-minus-circle text-warning"></i>');
				$('#colorIcon').addClass("text-warning");
			}
    
        });
    
    });

}

/*
* Carrega HTML para renderizacao posterior
*/

this.loadPage = function(url, callback) {
    $.get(url,
		function (template) {
			if(callback)
                callback(template);
		}
	);   
}

this.shortUrl = function() {
    var btn		  = $(this);
	var id_key	  = btn.attr('data-id-key');
	var data_link = btn.attr('data-link');
	
	btn.popover({
		"trigger"	: "manual", 
		"html"		: "true", 
		"placement" : "bottom", 
		"container" : "body",
		"title"		: ""
	});
	
	jQuery.urlShortener({
		longUrl: config.url_compartilhamento+data_link,
		success: function (shortUrl) {
			btn.attr('data-content', '<div class="input-group"><input type="text" class="form-control" id="'+id_key+'" value="'+shortUrl+'" ><span class="input-group-btn"><a class="btn btn-warning" href="'+shortUrl+'" target="_black"><i class="fa fa-share"></i></a></span></div>');
            btn.popover('toggle');
			$("#"+id_key).focus();
			$("#"+id_key).select();
		}
	});
}

this.buildIdKey = function($Xdigitos) {

   $CaracteresAceitos = 'AQWERTYUIOPLKJHGFDSZXCVBNM0123456789';
   $Xretorno          = "";
   
   for($i=0; $i < $Xdigitos; $i++) 
    $Xretorno += $CaracteresAceitos[parseInt(Math.random() * $CaracteresAceitos.length)];
   
   return $Xretorno;

}

this.ultimosImoveisCadastrados = function() {
 
    $.gritter.add({
        title       : 'Carregando últimos imoveis',
        sticky      : false,
        time        : 1500,
        class_name  : 'my-sticky-class'
    });
    
    $modal_ultimos_imoveis = $('#modal_ultimos_imoveis');
    $modal_ultimos_imoveis.find('.modal-content').html('<center style="padding-top:15px; padding-bottom:15px">Carregando...</center>');
   
    requestToServer(
      'json/carteiradeimoveis/get-ultimos-imoveis.php', 
      {}, 
      'POST', 
      function(response) {
         
         loadPage(
            WEBSITE+'pages/template/ultimos-imoveis-cadastrados.html',
            function(template) {
               $modal_ultimos_imoveis.find('.modal-content').html(renderPage(template, mergeObjects(response, {'WEBSITE': config.website})));
               
                $.gritter.add({
                    title       : 'Listagem carregada',
                    sticky      : false,
                    time        : 2000,
                    class_name  : 'my-sticky-class'
                });
            }
         );
         
      }
    );
   
    $modal_ultimos_imoveis.modal('show');
    
}

this.emailsPendentes = function() {
 
    /*
		$.gritter.add({
        title       : 'Carregando emails pendentes',
        sticky      : false,
        time        : 1500,
        class_name  : 'my-sticky-class'
    });
    */
    $modal_emails_pendentes = $('#modal_emails_pendentes');
    $modal_emails_pendentes.modal('show');
    
}

// Visualizar os
function visualizar_os(Xid_key)
{
	$('#principal-tab').click();
	$('#aba_chat').show();
	$('#aba_faturamento').show();
	$('#aba_checklist').show();
	$('#aba_orcamento').show();
	$('#btnImprimirOS').show();
	$('#btnFinalizaOS').show();
	$.ajax({
		url  : "../json/osmap/load_os.php",
		data : { 'id_key':Xid_key
		},
		method  : "POST",
		beforeSend: function() {
				swal({
					title: 'Aguarde!',
  				text: 'Carregando...',
					position: 'top-right',
					showConfirmButton: false,
				})
		}
	}).success(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn);
			mensagem = response.msg;
		} 
		catch(e)
		{
			mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		}
		
		$('#id_key_os').val(response.id_key);
		$('#numero').val(response.numero);
		$('#fecha').val(response.fecha);
		$('#id_key_tipo_os').val(response.id_key_tipo_os);
		$('#id_key_cliente_os').val(response.id_key_cliente);
		$('#cliente_os').val(response.nome_cliente);
		$('#select_cliente_os').html('');
		$('#select_cliente_os').hide();
		$('#locais_os').load("../json/osmap/load_locais.php?id_key_cliente="+response.id_key_cliente+"&oc=1");
		
		if(response.id_key_local == '--')
		{
			$('#onde').val('--');
			$('#div_locais').hide();
		}
		else
		{
			$('#onde').val('DO');
			$('#id_key_local_os').val(response.id_key_local);
			$('#codigo_cidade').val(response.codigo_cidade);
			$('#div_locais').show();
		}
		
		$('#objetos').val(response.objetos);
		$("textarea[name='defeito']").val(response.defeito);
		$("textarea[name='acessorios']").val(response.acessorios);
		$("textarea[name='obs_fatura']").val(response.obs_fatura);
		
		$('#div_aparelho').html('');
		if(response.id_key_aparelho != null && response.id_key_aparelho != '--')
		{
			escolhe_aparelho_visualiza(response.id_key_aparelho, response.id_key_item_aparelho);
		}
		
		//Checkbox Retido na fonte
		if(response.retido_na_fonte == "on")
		{
			$('#retido_na_fonte').prop('checked',true);
		}
		else
		{
			$('#retido_na_fonte').prop('checked',false);
		}
		
		//Checkbox Urgência
		if(response.urgencia == "on")
		{
			$('#urgencia').prop('checked',true);
		}
		else
		{
			$('#urgencia').prop('checked',false);
		}
		
		//Data Agendamento
		if(response.fecha_agendado == "00/00/0000")
		{
			$('#fecha_agendado').val('');
		}
		else
		{
			$('#fecha_agendado').val(response.fecha_agendado);
		}
		
		//Verifica se é os de manutenção
		if(response.id_key_man == null || response.id_key_man == '')
		{
			$('#os_manutencao').hide();
		} 
		else
		{
			$('#os_manutencao').show();
		}
		
		//Tipo de cobrança
		if(response.tipo_cob == 'NO')
		{
			$('#aba_pagamento').show();
		}
		else
		{
			$('#aba_pagamento').hide();
		}
		$('#tipo_cob').val(response.tipo_cob);
		
		$('#hora_agendado').val(response.hora_agendado);
		$('#fecha_previsto').val(response.fecha_previsto);
		$('#hora_previsto').val(response.hora_previsto);
		$('#id_key_estado_os').val(response.id_key_estado_os);
		$('#id_key_cnae').val(response.id_key_cnae);
		$('#id_key_ati').val(response.id_key_ati);
		$('#valor_total').val(response.valor_total);
		$('#saldo').val(response.saldo);
		$("textarea[name='obs_finaliza']").val(response.obs);
		$('#id_key_estado_finaliza').val(response.id_key_estado_os);
		$('#total_p').val(response.total_p);
		$('#total_s').val(response.total_s);
		$('#aliquota_iss').val(response.aliquota_iss);
		$('#valor_iss').val(response.valor_iss);
		$('#nro_nfse').val(response.nro_nfse);
		$('#obs_orca').val(response.obs_orca);
		$('#Ototal').val(response.Ototal);
		$('#Ototal_servicos').val(response.Ototal_servicos);
		$('#Ototal_produtos').val(response.Ototal_produtos);
		$('#id_key_supervisor').val(response.id_key_supervisor);
		$('#id_key_vendedor').val(response.id_key_vendedor);
		$('#id_key_vendedor2').val(response.id_key_vendedor2);
		$('#id_key_vendedor3').val(response.id_key_vendedor3);
		$('#cfop').val(response.cfop);
		$('#tecnicos').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
		$('#tecnicos').load("../json/osmap/load_tecnicos.php?id_key=" + response.id_key+"&oc=1");
		$('#servicos').html('<tr><td class="text-center" colspan="6"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></td></tr>');
		$('#servicos').load("../json/osmap/load_servicos.php?id_key=" + response.id_key+"&oc=1");
		$('#produtos').html('<tr><td class="text-center" colspan="7"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></td></tr>');
		$('#produtos').load("../json/osmap/load_produtos.php?id_key=" + response.id_key+"&oc=1");
		$('#servicos_orcamento').html('<tr><td class="text-center" colspan="6"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></td></tr>');
		$('#servicos_orcamento').load("../json/osmap/load_servicos_orcamento.php?id_key=" + response.id_key+"&oc=1");
		$('#produtos_orcamento').html('<tr><td class="text-center" colspan="6"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></td></tr>');
		$('#produtos_orcamento').load("../json/osmap/load_produtos_orcamento.php?id_key=" + response.id_key+"&oc=1");
		$('#lista_produtos_tecnicos').html('<tr><td class="text-center" colspan="4"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></td></tr>');
		$('#lista_produtos_tecnicos').load("../json/osmap/load_produtos_tecnicos.php?id_key=" + response.id_key+"&oc=1");
		$('#messages_chat').html('<div class="col-md-12 text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
		$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + response.id_key+"&oc=1");
		$('#pagamentos').html('<div class="col-md-12 text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
		$('#pagamentos').load("../json/osmap/load_pagamentos.php?id_key=" + response.id_key+"&oc=1");
		$('#lista_checklist').html('<div class="col-md-12 text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando</h3><BR><BR></div>');
		$('#lista_checklist').load("../json/osmap/load_checklist_all.php?id_key=" + response.id_key+"&oc=1");
		$('#btnImprimirChecklist').attr('onclick',"window.open('" + WEBSITE + "pages/osmap/checklist_print.php?id_key=" + response.id_key + "');");
		$('#ModalOS').modal('show');
		
		//RESTRIÇÕES
		if(response.edit)
		{
			$('button[name=btnEnviarOS]').show();
			$('button[name=btnRefreshOS]').show();
		}
		else
		{
			$('button[name=btnEnviarOS]').hide();
			$('button[name=btnRefreshOS]').hide();
		}
		
		if(response.cancela)
		{
			$('#btnCancelarOS').show();
		}
		else
		{
			$('#btnCancelarOS').hide();
		}
		
		if(response.fecha_finalizada == '' || response.fecha_finalizada == '0000-00-00')
		{
			$('.BBfinalizada').show();
			$('.IIfinalizada').removeAttr('disabled');
			$('.BBreabrir').hide();
		}
		else
		{
			$('.BBfinalizada').hide();
			$('.IIfinalizada').attr('disabled', 'disabled');
			$('.BBreabrir').show();
		}
		
		if(response.cancela_nfe)
		{
			$('.BBcancelada').show();
		}
		else
		{
			$('.BBcancelada').hide();
		}
		//RESTRIÇÕES
		swal.close();
	}).fail(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn.responseText);
			mensagem = response.msg;
		} catch(e) {
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

	});
}
//  > fim visualizar os

// escolhe aparelho
function escolhe_aparelho_visualiza(Xid_key, Xid_key_item_aparelho = '')
{
	$.ajax({
		url  : "../json/osmap/load_aparelho.php",
		data : { 'id_key':Xid_key,
					 	 'id_key_item_aparelho':Xid_key_item_aparelho},
		method  : "POST",
	}).success(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn);
			mensagem = response.msg;
		} 
		catch(e)
		{
			mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		}
		
		$('#id_key_aparelho').val(response.id_key);
		$('#div_aparelho').html('<span class="label label-default" style="font-size: 11px !important;">Aparelho: '+response.Pdescrip +' - Número: '+response.numero_aparelho+'</span>');
		
		if(response.Aid_key != null && response.Aid_key != '')
			$('#div_aparelho').html($('#div_aparelho').html()+'&nbsp;<span class="label label-success" style="font-size: 11px !important;">Manutenção: '+response.Mdescrip +'</span>');
		else
			$('#div_aparelho').html($('#div_aparelho').html()+'&nbsp;<span class="label label-info" style="font-size: 11px !important;">Sem manutenção</span>');
		
	}).fail(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn.responseText);
			mensagem = response.msg;
		} catch(e) {
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

	});
}
//  > fim escolhe aparelho

//Botões necessários para OS
// < Chat Assinatura
$('#btnChatAssinatura').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=A");
});
// > fim Chat Assinatura

// < Chat Ajuda/Manual
$('#btnChatManual').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=H");
});
// > fim Chat Ajuda/Manual

// < Chat Check-In
$('#btnChatCheckIn').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=C");
});
// > fim Chat Check-In

// < Chat Observações
$('#btnChatObservacao').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=O");
});
// > fim Chat Observações

// < Chat Reclamação
$('#btnChatReclamacao').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=X");
});
// > fim Chat Reclamação

// < Chat Recebimento
$('#btnChatRecebimento').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=R");
});
// > fim Chat Reclamação

// < Chat Finalização
$('#btnChatFinalizacao').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val() + "&tipo=T");
});
// > fim Chat Reclamação

// < Chat Todas
$('#btnChatTodas').click(function(e) {
	$('#messages_chat').load("../json/osmap/load_chat.php?id_key=" + $('#id_key_os').val());
});
// > fim Chat Todas

// < Imprimir
$('#btnImprimirOS').click(function(e) {
	window.open( WEBSITE + 'pages/osmap/invoice_print.php?id_key=' + $('#id_key_os').val(),'_blank');
});
// > fim imprimir

// < Finalizar OS
$('#btnFinalizaOS').click(function(e) {
	//$("textarea[name='obs_finaliza']").val('');
	$('#ModalFinaliza').modal("show");
});
// > fim Finalizar OS

// < Imprimir orçamento
$('#btnImprimirOrcamento').click(function(e) {
	window.open( WEBSITE + 'pages/osmap/orcamento_print.php?id_key=' + $('#id_key_os').val());
});
// > fim imprimir orçamento
//> Botões necessários para OS

// ver mapa técnicos
function mapa_tecnicos(Xtipo, Xcoord, Xid_key_os)
{
	//Quando a OS está aberta, ponto central é o endereço da OS
	if(Xtipo == 'O')
	{
		if(Xid_key_os != null && Xid_key_os == 'XX' && $('#id_key_local_os').val() != null)
		{
			$('#mapa_tecnicos').load(WEBSITE + "json/variados/load_mapa_tecnicos.php?tipo=O&id_key="+Xid_key_os+"&id_key_local="+$('#id_key_local_os').val());
		}
		//Quando a OS está aberta, porém não foi selecionado nenhum cliente com local, ponto central é a empresa
		else if(Xid_key_os != null && Xid_key_os == 'XX')
		{
			$('#mapa_tecnicos').load(WEBSITE + "json/variados/load_mapa_tecnicos.php?tipo=O&id_key="+Xid_key_os);
		}
	}
	else if(Xtipo == 'P')
	{
		//Quando a OS está fechada, página principal das OS´s, ponto central é o endereço da OS
		if(Xcoord != null && Xcoord != '')
		{
			$('#mapa_tecnicos').load(WEBSITE + "json/variados/load_mapa_tecnicos.php?tipo=P&id_key="+Xid_key_os+"&lat="+Xcoord.lat+"&longi="+Xcoord.longi);
		} 
	}
	else if(Xtipo == 'C')
	{
		//Quando é um CheckIN do técnico
		if(Xcoord != null && Xcoord != '')
		{
			$('#mapa_tecnicos').load(WEBSITE + "json/variados/load_mapa_tecnicos.php?tipo=C&id_key="+Xid_key_os+"&lat="+Xcoord.lat+"&longi="+Xcoord.longi);
		} 
	}
	//Quando é a localização dos técnicos, ponto central é a empresa
	else
	{
		$('#mapa_tecnicos').load(WEBSITE + "json/variados/load_mapa_tecnicos.php?tipo=T");
	}
	
	$('#ModalMapaTecnicos').modal('show');
}
//  > fim ver mapa técnicos

//Mapa técnicos
var map;

//Iniciar mapa técnicos
function initMapTecnicos(Xpontos) {
	//Limpa mapa
	$('#mapa_t').html('');
	var marker;
	var mm = 0;
	if(Xpontos != null)
	{
		// Criar pontos dos técnicos
		Xpontos.forEach(function(marca) {
			//Inicializa o mapa
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('mapa_t'), {
					zoom              : 14,
					center            : {lat: marca.lat, lng: marca.lng}
				});
				mm=1;
			}
			
			//Cria os pontos no mapa
			var marker = new google.maps.Marker({
				position: {lat: marca.lat, lng: marca.lng},
				title: marca.titulo,
				label: marca.label,
				icon: marca.icon,
				map: map
			});
			
			//Busca as informações do técnico
			var contentString;
			$.get(WEBSITE + "json/variados/load_oss_tecnico.php?id_key="+marca.id_key, function (data){
				//Insere no infowindow
				if(data != '')
				{
					var infowindow = new google.maps.InfoWindow({
						content: data
					});
				
					//Associa a informação com a posição do mapa
					marker.addListener('click', function() {
						infowindow.open(map, marker);
					});
				}
			}, 'html');
		});
	}
 }
// Fim mapa técnicos

// Expandir os do técnico no mapa
function expandir_tec_os($Xid_key)
{
	if ($('#tec_os_'+$Xid_key).css('display') == 'none')
	{
		$('#tec_os_'+$Xid_key).show();
		$('#tec_os_'+$Xid_key).css('padding-bottom', '15px');
		$('#icon_tec_os_'+$Xid_key).html('<i class="fa fa-caret-down"></i>');
	}
	else
	{
		$('#tec_os_'+$Xid_key).hide();
		$('#icon_tec_os_'+$Xid_key).html('<i class="fa fa-caret-right"></i>');
	}
}
// > Expandir os do técnico no mapa

// ver apitos
function ver_apitos()
{
	//$('#apitos').load(WEBSITE + "json/variados/load_apitos.php");

	// < configuracoes do Bootgrid apitos *****************************************************
		var grid = $("#table-apitos").bootgrid({
			labels: {
				noResults: "Não foi encontrado nenhum resultado!",
				infos: "Mostrando {{ctx.start}} a {{ctx.end}} de {{ctx.total}} registros",
				loading: "Aguarde",
				refresh: "Atualizar",
				search: "Pesquisar"
			},
			formatters: {
				"commands": function(column, row){
					if(row.lat != '')
					{
						return"<button type=\"button\" class=\"btn btn-primary btn-sm command-view\" data-row-id=\"" +  row.id + "\" data-row-lat=\"" +  row.lat + "\" data-row-longi=\"" +  row.longi + "\" data-toggle=\"tooltip\" data-placement=\"top\" data-title=\"Ver mapa\" title='Ver no mapa'><i class='fa fa-map-pin' aria-hidden='true'></i></button>"
					}
				}
			},
			ajax: true,
			url: "../json/variados/list_apitos.php",
			templates: {
				header: ""
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
			grid.find(".command-view").on("click", function(e)
			{
				mapa_tecnicos("C",{lat: $(this).data("row-lat"), longi: $(this).data("row-longi")},$(this).data("row-id"));
			});
			
			atualiza_apitos();
		});
		// > configuracoes do Bootgrid *****************************************************
		$('[data-toggle="tooltip"]').tooltip();
	
		$("#table-apitos").bootgrid("reload");
	
		$('#ModalApitos').modal('show');
}
//  > fim ver apitos

// atualizar apitos lidos
function atualiza_apitos()
{
	$.ajax({
		url  : "../json/variados/up_apitos.php",
		method  : "POST",
	}).success(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn);
			mensagem = response.msg;
		} 
		catch(e)
		{
			mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		}
		
	}).fail(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn.responseText);
			mensagem = response.msg;
		} catch(e) {
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
	});
}
//  > fim atualizar apitos lidos

// ver imagens apitos
function ver_imagens_apitos(Xid_key)
{
	$('#imagens_apitos').load(WEBSITE + "json/variados/load_imagens.php?id_key="+Xid_key);
	$('#ModalApitosImagens').modal('show');
}
//  > fim ver imagens apitos

//Auto refresh no topo das páginas
var auto_refresh = setInterval(
	function ()
	{
		$('#topo').load(WEBSITE+'pages/formatos/refresh_top_nav.php');
	}, 120000); // refresh every 10000 milliseconds


// ver lista veículos
function lista_veiculos()
{
	$('#veiculos').load(WEBSITE + "json/variados/load_veiculos.php");
	$('#ModalVeiculos').modal('show');
}
//  > fim ver lista veículos

// ver historico veiculo
function ver_historico_veiculo(Xid_key, Xid_key_veiculo)
{
	$('#Hfecha_in').daterangepicker({
			singleDatePicker: true,
			locale: {
		"format": "DD/MM/YYYY",
		"daysOfWeek": [
				"D",
				"S",
				"T",
				"Q",
				"Q",
				"S",
				"S"
		],
		"monthNames": [
				"Janeiro",
				"Fevereiro",
				"Março",
				"Abril",
				"Maio",
				"Junho",
				"Julho",
				"Agosto",
				"Setembro",
				"Outubro",
				"Novembro",
				"Dezembro"
		],
		}
	});	
$('#Hfecha_in').val('');

$('#Hfecha_out').daterangepicker({
			singleDatePicker: true,
			locale: {
		"format": "DD/MM/YYYY",
		"daysOfWeek": [
				"D",
				"S",
				"T",
				"Q",
				"Q",
				"S",
				"S"
		],
		"monthNames": [
				"Janeiro",
				"Fevereiro",
				"Março",
				"Abril",
				"Maio",
				"Junho",
				"Julho",
				"Agosto",
				"Setembro",
				"Outubro",
				"Novembro",
				"Dezembro"
		],
		}
	});	
$('#Hfecha_out').val('');
	
	$.ajax({
		url  : WEBSITE + "json/veiculos/load_historico.php",
		data : { 'id_key':Xid_key,
						 'id_key_veiculo':Xid_key_veiculo},
		method  : "POST",
		
		beforeSend: function() {
				swal({
					title: 'Aguarde!',
  				text: 'Carregando...',
					position: 'top-right',
					showConfirmButton: false,
				})
		}
	}).success(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn);
			mensagem = response.msg;
		} 
		catch(e)
		{
			mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		}
		$('#Hid_key_historico').val(response.id_key);
		$('#Hid_key_veiculo').val(response.id_key_veiculo);
		$('#Hmarca').val(response.marca);
		$('#Hmodelo').val(response.modelo);
		$('#Hplaca').val(response.placa);
		$('#Hfecha_in').val(response.fecha_in);
		$('#Hkm_in').val(response.km_in);
		$('#Hhora_in').val(response.hora_in);
		
		if(response.foto_in!=null && response.foto_in!='')
		{
			$("#Hlink_in").attr("href", response.foto_in);
			$('#Hlink_in').show();
		}
		else
		{
			$("#Hlink_in").attr("href", '');
			$('#Hlink_in').hide();
		}
		$('#Hfoto_in').val(response.foto_in);
		$('#Hfile_in').val('');
		
		$('#Hfecha_out').val(response.fecha_out);
		$('#Hkm_out').val(response.km_out);
		$('#Hhora_out').val(response.hora_out);
		
		if(response.foto_out!=null && response.foto_out!='')
		{
			$("#Hlink_out").attr("href", response.foto_out);
			$('#Hlink_out').show();
		}
		else
		{
			$("#Hlink_out").attr("href", '');
			$('#Hlink_out').hide();
		}
		$('#Hfoto_out').val(response.foto_out);
		$('#Hfile_out').val('');
		
		if(response.bloqueia=='on')
			$('#Hbloqueia').prop('checked', true);
		else
			$('#Hbloqueia').prop('checked', false);
		
		$('#ModalVeiculosHistorico').modal('show');
		swal.close();
	}).fail(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn.responseText);
			mensagem = response.msg;
		} catch(e) {
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

	});
}
//  > ver historico veiculo

// ver lista veículos precisando abastecer
function lista_veiculos_abastecer()
{
	$('#veiculos_abastecer').load(WEBSITE + "json/variados/load_veiculos_abastecer.php");
	$('#ModalVeiculosAbastecer').modal('show');
}
//  > fim ver lista veículos

// < Submit do formulário veiculos historico ***************************************************************
formVeiculosHistorico = $('form[name=formVeiculosHistorico]');
btnEnviarVeiculoHistorico = $('button[name=btnEnviarVeiculoHistorico]');

btnEnviarVeiculoHistorico.click(function(e) {
	swal({
			title: 'Tem certeza que deseja salvar essas informações?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#4169E1',
			confirmButtonText: 'Sim!',
			cancelButtonText: 'Cancelar',
			cancelButtonColor: '#FF6347',
	}, function() {
	formData = formVeiculosHistorico.serializeArray();
	console.log(formData);
		$.ajax({
			url: WEBSITE + formVeiculosHistorico.attr('action'),
			data: formData,
			method: 'POST',
			beforeSend: function() {
				btnEnviarVeiculoHistorico.attr("disabled", "disabled");
				btnEnviarVeiculoHistorico.html("<i class='fa fa-spinner fa-spin fa-fw'></i> Aguarde...")
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
					position: 'top-right',
					type: 'success',
					title: 'Sucesso',
					text: mensagem,
					showConfirmButton: false,
					timer: 1500
			})
			btnEnviarVeiculoHistorico.removeAttr("disabled");
			btnEnviarVeiculoHistorico.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");
			$('#ModalVeiculosHistorico').modal("hide");
			//Carrega lista página
			$('#veiculos').load(WEBSITE + "json/variados/load_veiculos.php");
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

			btnEnviarVeiculoHistorico.removeAttr("disabled");
			btnEnviarVeiculoHistorico.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");

		});
	})
});
// > Submit do formulário veiculos historico ***************************************************************

// ver apagar historico veiculo
function cancela_historico_veiculo(Xid_key, Xid_key_veiculo)
{
	swal({
				title: 'Tem certeza que deseja cancelar o histórico?',
				text: "Você não poderá reverter isso!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#4169E1',
				confirmButtonText: 'Sim!',
				cancelButtonText: 'Cancelar',
				cancelButtonColor: '#FF6347',
		}, function() {
			$.ajax({
				url  : WEBSITE + "json/veiculos/apagar_historico.php",
				data : { 'id_key':Xid_key,
								 'id_key_veiculo':Xid_key_veiculo},
				method  : "POST",
			}).success(function(dataReturn) {

				try 
				{
					response = JSON.parse(dataReturn);
					mensagem = response.msg;
				} 
				catch(e)
				{
					mensagem = 'Houve um problema com nosso servidor, tente novamente.';
				}
				
				swal({
						title: 'Apagado!',
						text: mensagem,
						type: 'success',
						showConfirmButton: false,
						timer: 1500
					})
				//Carrega lista página
				$('#veiculos').load(WEBSITE + "json/variados/load_veiculos.php");
			}).fail(function(dataReturn) {

				try 
				{
					response = JSON.parse(dataReturn.responseText);
					mensagem = response.msg;
				} catch(e) {
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
			});
	})
}
//  > ver apagar historico veiculo

// < FOTOS DO VELOCÍMETRO DOS VEÍCULOS *********************************************************************
// FOTO IN....
arquivoIN  = $("input[name=Hfile_in]");

// Detecta ao ter mudanca no evento do botao de envio de arquivo
arquivoIN.bind('change', function(event) {
	fData = new FormData();
	fData.append('file', $('#Hfile_in')[0].files[0]); // Campo do arquivo
	fData.append('origem', 'historico'); // Campo do arquivo
	
	event.preventDefault();
	
	$.ajax({
		url 		: WEBSITE+'json/veiculos/upload-to-s3.php',
		data 		: fData,
		processData : false,
		contentType : false,
		method 		: 'POST',
		beforeSend: function(){
		    swal({
					title: 'Aguarde!',
  				text: 'Enviando imagem...',
					position: 'top-right',
					showConfirmButton: false,
				})
		},
		success: function(data){
			dataJson = JSON.parse(data); // Converte retorno  para JSON

			if(dataJson.head.type) 
			{
				 $.ajax({
						 url     : WEBSITE+'json/veiculos/post-foto.php',
						 data    : dataJson,
						 method  : 'POST'
				 }).success(function(dataReturn2) {

						try {
							response = JSON.parse(dataReturn2);
							mensagem = response.msg;
						} catch(e) {
							mensagem = 'Houve um problema com nosso servidor, tente novamente.';
						}

						console.log("Imagem "+dataJson.head.URL);

						$('#Hfoto_in').val(dataJson.head.URL);
					 	$("#Hlink_in").attr("href", dataJson.head.URL);
					  $('#Hlink_in').show();
						swal.close();
				 }).fail(function(dataReturn2) {

						 try {
								 response = JSON.parse(dataReturn2.responseText);
								 mensagem = response.msg;
						 } catch(e) {
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

				 });
		             
			} else {
				swal({
							position: 'top-right',
							title: 'Ops, tivemos um problema',
							text: mensagem,
							type: 'warning',
							showConfirmButton: false,
							timer: 1500
				})
			}
			
		}
	});
});

// FOTO OUT
arquivoOUT  = $("input[name=Hfile_out]");

// Detecta ao ter mudanca no evento do botao de envio de arquivo
arquivoOUT.bind('change', function(event) {
	fData = new FormData();
	fData.append('file', $('#Hfile_out')[0].files[0]); // Campo do arquivo
	fData.append('origem', 'historico'); // Campo do arquivo
	
	event.preventDefault();
	
	$.ajax({
		url 		: WEBSITE+'json/veiculos/upload-to-s3.php',
		data 		: fData,
		processData : false,
		contentType : false,
		method 		: 'POST',
		beforeSend: function(){
		    swal({
					title: 'Aguarde!',
  				text: 'Enviando imagem...',
					position: 'top-right',
					showConfirmButton: false,
				})
		},
		success: function(data){
			dataJson = JSON.parse(data); // Converte retorno  para JSON

			if(dataJson.head.type) 
			{
				 $.ajax({
						 url     : WEBSITE+'json/veiculos/post-foto.php',
						 data    : dataJson,
						 method  : 'POST'
				 }).success(function(dataReturn2) {

						try {
							response = JSON.parse(dataReturn2);
							mensagem = response.msg;
						} catch(e) {
							mensagem = 'Houve um problema com nosso servidor, tente novamente.';
						}

						console.log("Imagem "+dataJson.head.URL);

						$('#Hfoto_out').val(dataJson.head.URL);
					  $("#Hlink_out").attr("href", dataJson.head.URL);
					  $('#Hlink_out').show();
						swal.close();
						 swal({
								position: 'top-right',
								title: 'Sucesso',
								text: mensagem,
								type: 'warning',
								showConfirmButton: false,
								timer: 1500
					})
				 }).fail(function(dataReturn2) {

						 try {
								 response = JSON.parse(dataReturn2.responseText);
								 mensagem = response.msg;
						 } catch(e) {
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

				 });
		             
			} else {
				swal({
							position: 'top-right',
							title: 'Ops, tivemos um problema',
							text: mensagem,
							type: 'warning',
							showConfirmButton: false,
							timer: 1500
				})
			}
			
		}
	});
});
// > FOTOS DO VELOCÍMETRO DOS VEÍCULOS *********************************************************************

// ver lista manutenção
function lista_manutencao()
{
	$('#veiculos_manutencao').load(WEBSITE + "json/variados/load_manutencao.php");
	$('#ModalVeiculosManutencao').modal('show');
}
//  > fim ver lista manutenção

// ver realiza manutenção
function realiza_manutencao(Xid_key, Xid_key_veiculo,Xdescrip)
{
	$('.maskMoneyBR').maskMoney();
	$('#Mfecha').daterangepicker({
			singleDatePicker: true,
			locale: {
		"format": "DD/MM/YYYY",
		"daysOfWeek": [
				"D",
				"S",
				"T",
				"Q",
				"Q",
				"S",
				"S"
		],
		"monthNames": [
				"Janeiro",
				"Fevereiro",
				"Março",
				"Abril",
				"Maio",
				"Junho",
				"Julho",
				"Agosto",
				"Setembro",
				"Outubro",
				"Novembro",
				"Dezembro"
		],
		}
	});
	
	$('#Mid_key_man').val(Xid_key);
	$('#Mid_key_veiculo').val(Xid_key_veiculo);
	$('#Mdescrip').val(Xdescrip);
	$('#Mvalor').val('');
	$('#Mid_key_tecnico').val('');
	$('#Mnro_nota').val('');
	var data = new Date();
	$('#Mfecha').val(data.toLocaleDateString());
	$('#Mhora').val(data.toLocaleTimeString(navigator.language,{hour: '2-digit', minute:'2-digit'}));
	$('#Mkm').val('');
	$('#Mconfirmado').prop('checked', true);
	$('#Mobs').val('');
	$('#modalManutencaoDespesa').modal('show');
}
//  > fim ver realiza manutenção

// < Submit do formulário veiculos manutencao despesas ***************************************************************
formManutencaoDespesa = $('form[name=formManutencaoDespesa]');
btnEnviarManutencaoDespesa = $('button[name=btnEnviarManutencaoDespesa]');

btnEnviarManutencaoDespesa.click(function(e) {
	swal({
			title: 'Tem certeza que deseja salvar essas informações?',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#4169E1',
			confirmButtonText: 'Sim!',
			cancelButtonText: 'Cancelar',
			cancelButtonColor: '#FF6347',
	}, function() {
	formData = formManutencaoDespesa.serializeArray();
	console.log(formData);
		$.ajax({
			url: WEBSITE + formManutencaoDespesa.attr('action'),
			data: formData,
			method: 'POST',
			beforeSend: function() {
				btnEnviarManutencaoDespesa.attr("disabled", "disabled");
				btnEnviarManutencaoDespesa.html("<i class='fa fa-spinner fa-spin fa-fw'></i> Aguarde...")
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
					position: 'top-right',
					type: 'success',
					title: 'Sucesso',
					text: mensagem,
					showConfirmButton: false,
					timer: 1500
			})
			btnEnviarManutencaoDespesa.removeAttr("disabled");
			btnEnviarManutencaoDespesa.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");
			$('#modalManutencaoDespesa').modal("hide");
			//Carrega lista página
			$('#veiculos_manutencao').load(WEBSITE + "json/variados/load_manutencao.php");
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

			btnEnviarManutencaoDespesa.removeAttr("disabled");
			btnEnviarManutencaoDespesa.html("&nbsp;&nbsp;Salvar&nbsp;&nbsp;");

		});
	})
});
// > Submit do formulário veiculos veiculos manutencao despesas ***************************************************************

// < Relógio para exibição
/*
function startTime() {
    var today = new Date();
    var d = today.getDate();
    var m = today.getMonth()+1;
    var y = today.getFullYear();
    var h = today.getHours();
    var i = today.getMinutes();
    var s = today.getSeconds();
    d = checkTime(d);
    m = checkTime(m);
    h = checkTime(h);
    i = checkTime(i);
    s = checkTime(s);
    //$('#date_clock').html(d + "/" + m + "/" + y);
    $('#clock').html(d + "/" + m + "/" + y + " " + h + ":" + i + ":" + s);
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i;}  // add zero in front of numbers < 10
    return i;
}
*/
// > Relógio para exibição

// < Redireciona para tickets ***************************************************************
function ticket_suporte() {
		$.ajax({
			url: WEBSITE + 'json/variados/load_dados_internos.php',
			method: 'POST'
		}).success(function(dataReturn) {

			try {
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
				id_key = response.id_key;
			} catch (e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			/*
			swal({
					position: 'top-right',
					type: 'success',
					title: 'Sucesso',
					text: mensagem,
					showConfirmButton: false,
					timer: 1500
			})
			*/
			 OpenWindowWithPost("width=730,height=345,left=100,top=100,resizable=yes,scrollbars=yes", "NewFile", response);
				
			//window.open("post.htm", name, windowoption);
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

		});
}

function OpenWindowWithPost(windowoption, name, params)
{
		var form = document.createElement("form");
		form.setAttribute("method", "post");
		//form.setAttribute("action", WEBSITE_ROOT + "cw3/carlos-ti/painel_suporte/pages/ticket.php");
		form.setAttribute("action", "http://carlos-ti.com/cw3/carlos-ti/painel_suporte/pages/ticket.php");
		form.setAttribute("target", name);

 		for (var i in params) {
			if (params.hasOwnProperty(i)) {
					var input = document.createElement('input');
					input.type = 'hidden';
					input.name = i;
					input.value = params[i];
					form.appendChild(input);
			}
			console.log("a[" + i + "] = " + params[i]);
		}

		document.body.appendChild(form);

		//note I am using a post.htm page since I did not want to make double request to the page 
	 //it might have some Page_Load call which might screw things up.
		//window.open(WEBSITE + "pages/post_ticket.php", 'Ticket Suporte', windowoption);

		form.submit();

		document.body.removeChild(form);
}



$('#form_busca').on('submit', function(e){
        e.preventDefault();
        var len = $('#busca_global').val().length;
        if (len >= 3) {
            this.submit();
        }
        else
        {
	        alert("O campo de busca precisa ter mais de 3 caracteres");
        }
    });


//*******************  FUNÇÕES GEOLOCALIZAÇÃO *************/
var MLGXquietos = [];
var MLGXgeofences = [];
$('#MLGfecha').daterangepicker({
	singleDatePicker: true,
	opens: 'center',
	timePicker: false,
	timePickerIncrement: 1,
	timePicker12Hour: true,
	locale: {
		"format": "DD/MM/YYYY",
		"daysOfWeek": [
				"D",
				"S",
				"T",
				"Q",
				"Q",
				"S",
				"S"
		],
		"monthNames": [
				"Janeiro",
				"Fevereiro",
				"Março",
				"Abril",
				"Maio",
				"Junho",
				"Julho",
				"Agosto",
				"Setembro",
				"Outubro",
				"Novembro",
				"Dezembro"
		],
	},
	maxDate: moment().add(2, 'hours')
});

$('#MLGfecha').change(function(){
	$('#MLGlista_tecnicos').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
	$('#MLGlista_tecnicos').load("../json/geolocation/load_veiculos.php?fecha="+$('#MLGfecha').val());
	
	$('#MLGmapa').html('');
});

//Iniciar mapa geolocalização
function initMapLogsGeo() {
	console.log("carregou mapa logs");
	MLGXquietos = [];
	MLGXgeofences = [];
	//Limpa mapa
	$('#MLGfecha').change();
	$('#MLGmapa').html('');
	$('#ModalMapaLogsGeo').modal('show');
	
	//MLGload_registros();
 }
// Fim mapa geolocalização

function MLGmarca_veiculo()
{
	$('.MLGtecnicos').css("background", "");
	$('#MLGrelatorio').hide();
	$('.MLGbuttons').hide();
	$('#MLGplay'+$('input[name="MLGid_key_tecnico"]:checked').val()).show();
	$('#MLGstop'+$('input[name="MLGid_key_tecnico"]:checked').val()).show();
	$('#MLGtecnico_'+$('input[name="MLGid_key_tecnico"]:checked').val()).css("background", "#E0FFFF");
}

function MLGload_registros()
{
	if($('input[name="MLGid_key_tecnico"]:checked').val() != undefined && $('input[name="MLGid_key_tecnico"]:checked').val() != null)
	{
		$('.MLGtecnicos').css("background", "");
		$('#MLGrelatorio').hide();
		$('#MLGmapa').html('<div class="text-center"><BR><BR><img src="../img/carro.gif"><h3>Procurando registros de geolocalização...</h3><BR><BR></div>');
		$('#MLGrelatorio').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
		//$('#MLGrelatorio').load("../json/geolocation/lst_registros.php?fecha="+$('#MLGfecha').val()+"&id_key_tecnico="+$('input[name="MLGid_key_tecnico"]:checked').val()+"&h_inicio="+$('#MLGh_inicio').val()+"&h_fim="+$('#MLGh_fim').val()+"&distancia="+$('#MLGdistancia').val()+"&sleep="+$('#MLGsleep').val());
		$('#MLGrelatorio').load("../json/geolocation/lst_registros_traccar.php?fecha="+$('#MLGfecha').val()+"&id_key_tecnico="+$('input[name="MLGid_key_tecnico"]:checked').val()+"&h_inicio="+$('#MLGh_inicio').val()+"&h_fim="+$('#MLGh_fim').val()+"&distancia="+$('#MLGdistancia').val()+"&sleep="+$('#MLGsleep').val(), 
		function () 
		{
			$('#MapaEstaTecnico').modal('show');
			$('#mapa_esta_tecnico').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
			$('#mapa_esta_tecnico').load("../json/geolocation/load_esta_tecnico.php?fecha="+$('#MLGfecha').val()+"&id_key_tecnico="+$('input[name="MLGid_key_tecnico"]:checked').val());
		}); // esta função faz com que espere o load anterior para executar o load do detalhe do tecnico... temos _SESSION envolvidas.
		
		$('.MLGbuttons').hide();
		$('#MLGplay'+$('input[name="MLGid_key_tecnico"]:checked').val()).show();
		$('#MLGstop'+$('input[name="MLGid_key_tecnico"]:checked').val()).show();
		$('#MLGtecnico_'+$('input[name="MLGid_key_tecnico"]:checked').val()).css("background", "#cccccc");


	}
	else
	{
		swal({
				position: 'top-right',
				title: 'Ops, tivemos um problema',
				text: "É necessário selecionar um veículo/funcionário",
				type: 'warning',
				showConfirmButton: false,
				timer: 1500
		});
	}
}

//Iniciar mapa registros
function MLGmapa_registros(Xindex = '', Xmovimento = false, Xtime = false) {
	//Limpa mapa
	$('#MLGmapa').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
	$('*[class*="MLGchk_mov_"]').css("background", "");
	$('#MLGstop').val('0'); 
	var marker;
	var mm = 0;
	var map;
	// Criar pontos dos técnicos
	var Xpontos = [];
	$('.MLGmovimentos').each(function(e) {
		if(Xindex == '' || parseInt($(this).val()) <= parseInt(Xindex))
		{
			Xlat = parseFloat($(this).attr('lat'));
			Xlongi = parseFloat($(this).attr('longi'));
			//Inicializa o mapa
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('MLGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			if(parseInt($(this).val()) == parseInt(Xindex) || parseInt($(this).val()) == parseInt($('#MLGplay').val()))
			{
				map.setCenter({lat: Xlat, lng: Xlongi});
				if(Xmovimento)
				{
					//console.log("Último: "+$(this).attr('id_key'));
					Xpontos.push({
						'lat': Xlat,
						'longi': Xlongi,
						'id_key': $(this).attr('id_key'),
						'velocidade': $(this).attr('velocidade'), // aca carlos
						'index': mm,
						'ultimo': true,
						'timestamp': $(this).attr('timestamp'),
					});
				}
				else
					MLGsetMarker(Xlat, Xlongi, map, mm, $(this).attr('id_key'), true);
			}
			else
			{
				if(Xmovimento)
				{
					//console.log($(this).attr('id_key'));
					//setTimeout(MLGsetMarker, 3000, Xlat, Xlongi, Xheading, map, mm, $(this).attr('id_key'));
					Xpontos.push({
						'lat': Xlat,
						'longi': Xlongi,
						'id_key': $(this).attr('id_key'),
						'velocidade': $(this).attr('velocidade'), // aca carlos
						'index': mm,
						'ultimo': false
					});
				}
				else
					MLGsetMarker(Xlat, Xlongi, map, mm, $(this).attr('id_key'));
			}
			mm = mm+1;
		}
	});
	
	MLGmostra_geofences(MLGXgeofences, map);
	if(Xmovimento && Xpontos.length > 0)
		MLGmarcaPontos(Xpontos, map, null, null, Xtime);
	MLGmostra_quietos(MLGXquietos, map);
 }
// Fim mapa registros

//Carrega mapa registros
function MLGcarrega_mapa_registros(Xindex = '', Xquietos = []) {
	//Limpa mapa
	$('#MLGmapa').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
	var marker;
	var mm = 0;
	var map;
	$('.MLGmovimentos').each(function(e) {
		if(Xindex == '' || parseInt($(this).val()) <= parseInt(Xindex))
		{
			Xlat = parseFloat($(this).attr('lat'));
			Xlongi = parseFloat($(this).attr('longi'));
			//Inicializa o mapa
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('MLGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			if(parseInt($(this).val()) == parseInt(Xindex) || parseInt($(this).val()) == parseInt($('#MLGplay').val()))
			{
				map.setCenter({lat: Xlat, lng: Xlongi});
				MLGsetMarker(Xlat, Xlongi, map, mm, $(this).attr('id_key'), true, false);
			}
			else
				MLGsetMarker(Xlat, Xlongi, map, mm, $(this).attr('id_key'), false, false);
			mm = mm+1;
		}
	});
	if(mm == 0)
		$('#MLGmapa').html('');
	else
	{
		MLGcarrega_geofences(map);
		MLGcarrega_quietos(Xquietos, map);
	}
 }
// Fim carrega mapa registros

//Carrega mapa registros
function MLGcarrega_geofences(map = '', Xid_key = '') {
	MLGXgeofences = [];
	if(Xid_key == '')
		Xid_key = $('input[name="MLGid_key_tecnico"]:checked').val();
	//Resgata registros
	$.ajax({
			 url     : WEBSITE+'json/geolocation/load_geofences.php',
			 data    : {'id_key': Xid_key,
								  'fecha': $('#MLGfecha').val()},
			 method  : 'POST'
	}).success(function(dataReturn) {
		dataReturn = JSON.parse(dataReturn);

		//Geofences / OS
		$.each(dataReturn.geofences, function(i, e) {
			e.tipo_geo = 'GE';
			MLGXgeofences.push(e);
			/*
			
			Xlat = parseFloat(e.Olat);
			Xlongi = parseFloat(e.Olongi);
			
			if(map == '')
			{
				map = new google.maps.Map(document.getElementById('MLGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			//if(e.estado == 'on')
			if(e.estado == '02')
				Xicon = WEBSITE+'images/icon_os_check.png';
			else
				Xicon = WEBSITE+'images/icon_os_pend.png';
			
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				icon: Xicon,
				map: map
			});
			
			//Busca as informações do técnico
			var infowindow = new google.maps.InfoWindow({
				content: "<b>"+e.Cnome+"</b><br>"+e.Onome + "<br>"+e.nome+"<br><br><button class='btn btn-warning btn-xs' onclick='javascript: MLGcompartilhar_checklist(\""+e.id_key+"\", \""+e.id_key_obra+"\");'>Compartilhar</button>"
			});

			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			*/
		});
		
		//Empresa / Customer
		$.each(dataReturn.empresa, function(i, e) {
			e.tipo_geo = 'CU';
			MLGXgeofences.push(e);
			/*
			Xlat = parseFloat(e.lat);
			Xlongi = parseFloat(e.longi);
			
			if(map == '')
			{
				map = new google.maps.Map(document.getElementById('MLGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				icon: WEBSITE+'images/icon_customer.png',
				map: map
			});
			*/
		});
		
		//Usuário / Técnico
		$.each(dataReturn.usuario, function(i, e) {
			e.tipo_geo = 'US';
			MLGXgeofences.push(e);
			/*
			Xlat = parseFloat(e.lat);
			Xlongi = parseFloat(e.longi);
			
			if(map == '')
			{
				map = new google.maps.Map(document.getElementById('MLGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				icon: WEBSITE+'images/icon_home.png',
				map: map
			});
			*/
		});
		
		MLGmostra_geofences(MLGXgeofences, map);

	}).fail(function(dataReturn) {

		 try {
				 response = JSON.parse(dataReturn.responseText);
				 mensagem = response.msg;
		 } catch(e) {
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
	});
}
// Fim carrega mapa registros

//Mostra geofences no mapa
function MLGmostra_geofences(Xgeofences, map = '') {
	if(Xgeofences.length > 0)
	{
		for (var cont = 0; cont < Xgeofences.length; cont++) {
			var dados = Xgeofences[cont];
			MLGsetGeofence(dados, map);
		}
	}
}
// Fim mostra geofences do mapa

//Carrega quietos
function MLGcarrega_quietos(Xquietos, map = '') {
	MLGXquietos = [];
	MLGXquietos = Xquietos;
	MLGmostra_quietos(MLGXquietos, map);
// 	if(Xquietos.length > 0)
// 	{
// 		for (var cont = 0; cont < Xquietos.length; cont++) {
// 			var dados = Xquietos[cont];
// 			MLGsetSleep(dados.lat, dados.longi, map, dados.inicio, dados.fim, dados.tempo);
// 		}
// 	}
}
// Fim carrega quietos

//Mostra quietos no mapa
function MLGmostra_quietos(Xquietos, map = '') {
	if(Xquietos.length > 0)
	{
		for (var cont = 0; cont < Xquietos.length; cont++) {
			var dados = Xquietos[cont];
			MLGsetSleep(dados.lat, dados.longi, map, dados.inicio, dados.fim, dados.tempo);
		}
	}
}
// Fim mostra quietos no mapa

function MLGsetMarker(Xlat, Xlongi, map, index, Xid_key, Xultimo = false, Xmarca = true, Xlat_marker = null, Xlongi_marker = null){
	var icon = {
		path: google.maps.SymbolPath.CIRCLE,
		strokeWeight: 3,
		strokeOpacity: 0.7,
	};
	
	if(Xultimo)
	{
		icon.scale = 8;
		icon.path = google.maps.SymbolPath.CIRCLE,
		icon.fillColor = '#11b700';
		icon.fillOpacity = 1;
		icon.strokeColor = '#0d6104';
		if(Xmarca)
			$('.MLGchk_mov_'+Xid_key).css("background", "#b3ffcc");
	}
	else
	{
		//if (parseInt($('#MLGmov_'+index).attr('velocidade'))>80) // velocidades maximas verificar....
		//console.log(parseInt($('#MLGmov_'+index).attr('velocidade'))>parseInt($('#MLGmov_'+index).attr('v_maxima')));
		if(parseInt($('#MLGmov_'+index).attr('v_maxima'))>0 && parseInt($('#MLGmov_'+index).attr('velocidade'))>parseInt($('#MLGmov_'+index).attr('v_maxima'))) // velocidades maximas verificar....
		{
			icon.scale = 7;
			if (parseInt($('#MLGmov_'+index).attr('multa'))==9) 		 icon.fillColor = '#FFFF00';
			else if (parseInt($('#MLGmov_'+index).attr('multa'))==2) 
			{
			    icon.fillColor = '#A020F0';
			    icon.scale=10;
			}
			else icon.fillColor = '#FF0000';	    
		}
		else
		{
			icon.scale = 4;
			icon.fillColor = '#333333';
		}
		
		icon.path = google.maps.SymbolPath.CIRCLE,

		icon.fillOpacity = 1;
		icon.strokeColor = '#0d0d0d';
		if(Xmarca)
			$('.MLGchk_mov_'+Xid_key).css("background", "#cccccc");
	}
	
	//Cria os pontos no mapa
	var marker = new google.maps.Marker({
		position: {lat: Xlat, lng: Xlongi},
		icon: icon,
		map: map
	});
	
	if(Xlat_marker != null)
	{
		var redline = new google.maps.Polyline({
			path: [
				new google.maps.LatLng(Xlat, Xlongi),
				new google.maps.LatLng(Xlat_marker, Xlongi_marker),
			],
			strokeColor: "#0080ff",
			strokeOpacity: 0.5,
			strokeWeight: 10,
			map: map
		});
	}
	
	//Busca as informações do técnico
	/*
	var contentString;
	$.get(WEBSITE + "json/geolocation/load_registros_detalhes_text.php?id_key="+Xid_key, function (data){
		//Insere no infowindow
		if(data != '')
		{
			var infowindow = new google.maps.InfoWindow({
				content: data
			});

			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		}
	}, 'html');
	*/
	var infowindow;
	
	if(parseInt($('#MLGmov_'+index).attr('v_maxima'))>0 && parseInt($('#MLGmov_'+index).attr('velocidade'))>parseInt($('#MLGmov_'+index).attr('v_maxima'))) // velocidades maximas verificar....
	{
		infowindow = new google.maps.InfoWindow({
			content: '<div class="col-md-12"><table><tbody><tr><td class="text-center" colspan="2"><h2>'+$('#MLGmov_'+index).attr('data')+'</h2><small>há '+$('#MLGmov_'+index).attr('tempo_atras')+'</small><BR><BR></td></tr><tr><td class="text-center"><img src="'+$('#MLGmov_'+index).attr('img_v_maxima')+'" style="max-width: 60px;"></td><td class="text-center">Velocidade: <b>'+$('#MLGmov_'+index).attr('velocidade')+'</b><br>'+$('#MLGmov_'+index).attr('porc_v_maxima')+'<br>'+$('#MLGmov_'+index).attr('inf_v_maxima')+'<br>'+$('#MLGmov_'+index).attr('valor_v_maxima')+'<br>'+$('#MLGmov_'+index).attr('pont_v_maxima')+'</td></tr></tbody></table></div>'
		});
	}
	else
	{
		infowindow = new google.maps.InfoWindow({
			content: '<div class="col-md-12"><table><tbody><tr><td class="text-center"><h2>'+$('#MLGmov_'+index).attr('data')+'</h2><small>há '+$('#MLGmov_'+index).attr('tempo_atras')+'</small><BR><BR>Velocidade: '+$('#MLGmov_'+index).attr('velocidade')+'</td></tr></tbody></table></div>'
		});
	}

	//Associa a informação com a posição do mapa
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});
}

function MLGsetSleep(Xlat, Xlongi, map, Xinicio, Xfim, Xtempo){
	Xlat = parseFloat(Xlat);
	Xlongi = parseFloat(Xlongi);

	if(map == '')
	{
		map = new google.maps.Map(document.getElementById('MLGmapa'), {
			zoom              : 14,
			center            : {lat: Xlat, lng: Xlongi},
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	}

	var marker = new google.maps.Marker({
		position: {lat: Xlat, lng: Xlongi},
		icon: 'http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_sleep.png',
		map: map
	});

	//Busca as informações do técnico
	var infowindow = new google.maps.InfoWindow({
		content: Xinicio+ " - " + Xfim +"<br><small>"+Xtempo+"</small>"
	});

	//Associa a informação com a posição do mapa
	marker.addListener('click', function() {
		infowindow.open(map, marker);
	});
}

function MLGsetGeofence(Xdados, map){
	if(Xdados.tipo_geo == 'GE')
	{
		Xlat = parseFloat(Xdados.Llat);
		Xlongi = parseFloat(Xdados.Llongi);
	}
	else
	{
		Xlat = parseFloat(Xdados.lat);
		Xlongi = parseFloat(Xdados.longi);
	}
	
	if(map == '')
	{
		map = new google.maps.Map(document.getElementById('MLGmapa'), {
			zoom              : 14,
			center            : {lat: Xlat, lng: Xlongi},
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
	}
	
	var marker = new google.maps.Marker({
		position: {lat: Xlat, lng: Xlongi},
		map: map
	});
	
	if(Xdados.tipo_geo == 'GE')
	{
		//if(e.estado == 'on')
		if(Xdados.estado == '02')
			marker.setIcon('http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_os_check.png');
		else
			marker.setIcon('http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_os_pend.png');
		
		//Busca as informações do técnico
		Xtexto = "";
		if(Xdados.Ccelular_whats.length > 3)
			Xtexto = "&nbsp;&nbsp;<a href='https://api.whatsapp.com/send?phone="+Xdados.Ccelular_whats+"' target='_blank' title='Whatsapp cliente'><img src='http://icons.iconarchive.com/icons/dtafalonso/android-l/24/WhatsApp-icon.png'></a>";
		var infowindow = new google.maps.InfoWindow({
			content: "<b>"+Xdados.Cnome+"</b><br>"+Xdados.Onumero + " - " + Xdados.Oobjetos + "<br>&nbsp;&nbsp;"+Xdados.Odefeito+"<br><br><i class='btn btn-default btn-md fa fa-print' style='background-color: gray; color: black;' onclick='javascript: window.open(\""+WEBSITE+"pages/osmap/invoice_print.php?id_key="+Xdados.id_key_os1+"\");'></i>"+Xtexto
		});

		//Associa a informação com a posição do mapa
		marker.addListener('click', function() {
			infowindow.open(map, marker);
		});
		console.log("OS: "+marker.getPosition().lat() + " - " + marker.getPosition().lng());
		console.log(marker);
	}
	else if(Xdados.tipo_geo == 'CU')
		marker.setIcon('http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_customer.png');
	else
		marker.setIcon('http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_home.png');
}

function MLGmarcaPontos(Xarray, map, Xlat = null, Xlongi = null, Xtime = false){
	//console.log(Xarray);
	if(Xarray.length > 0 && $('#MLGstop').val() == '0')
	{
		map.setCenter({lat: parseFloat(Xarray[0].lat), lng: parseFloat(Xarray[0].longi)});
		MLGsetMarker(parseFloat(Xarray[0].lat), parseFloat(Xarray[0].longi), map, Xarray[0].index, Xarray[0].id_key, Xarray[0].ultimo, true, Xlat, Xlongi);
		Xlat = parseFloat(Xarray[0].lat);
		Xlongi = parseFloat(Xarray[0].longi);
		Xarray.shift();
		if(Xtime)
			setTimeout(MLGmarcaPontos, 1000,Xarray, map, Xlat, Xlongi, true);
		else
			MLGmarcaPontos(Xarray, map, Xlat, Xlongi);
	}
}

//Compartilhar checklist
function MLGcompartilhar_checklist(Xid_key, Xid_key_obra)
{
	$.ajax({
		url  : "../json/osmap/load_checklist.php",
		data : { 'id_key':Xid_key},
		method  : "POST",
		beforeSend: function() {
				swal({
					title: 'Aguarde!',
					text: 'Carregando...',
					position: 'top-right',
					showConfirmButton: false,
				})
		}
	}).success(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn);
			mensagem = response.msg;
		} 
		catch(e)
		{
			mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		}
		
		Xnome = response.nome_assinatura;
		Xassinatura = response.assinatura
		Xlink = WEBSITE+'consultas/consulta_checklist.php?id_key='+Xid_key;
	
		$.ajax({
			url  : WEBSITE_ROOT+"llc.php",
			data : { 'x':Xlink
			},
			method  : "POST",

		}).success(function(dataReturn) {

			try 
			{
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} 
			catch(e)
			{
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			$('#MSClinkcurtocompartilhado').val(response.link);
			$('#MSCbtn_linkcurtocompartilhado').attr("href", response.link);
			$('#MSCid_key').val(Xid_key);
			if(Xassinatura != null && Xassinatura != '')
				$('#MSCnome_assinatura').prop('readonly', true);
			else
				$('#MSCnome_assinatura').prop('readonly', false);
			$('#MSCnome_assinatura').val(Xnome);

			$('#MSCtecnicos_share').load(WEBSITE+"json/clientes/load_responsaveis.php?id_key="+Xid_key_obra+"&nome=1&link="+encodeURI(response.link));

			$('#ModalShareChecklist').modal('show');

		}).fail(function(dataReturn) {

			try 
			{
				response = JSON.parse(dataReturn.responseText);
				mensagem = response.msg;
			} catch(e) {
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}

			swal({
						position: 'top-right',
						title: 'Ops, tivemos um problema',
						text: mensagem,
						type: 'warning',
						showConfirmButton: true,
						timer: 1500
			})

		});
		
		swal.close();
	}).fail(function(dataReturn) {

		try 
		{
			response = JSON.parse(dataReturn.responseText);
			mensagem = response.msg;
		} catch(e) {
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

	});

	return ;
}
//fim compartilhar checklist

//Carrega visualizar posição do técnico
function MLGvisualiza_tecnico(Xid_key) {
	$('#MLGmapa').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
	MLGXgeofences = [];
	//Resgata registros
	$.ajax({
			 url     : WEBSITE+'json/tecnicos/load_tecnico.php',
			 data    : {'id_key': Xid_key},
			 method  : 'POST'
	}).success(function(dataReturn) {
		dataReturn = JSON.parse(dataReturn);
			Xlat = parseFloat(dataReturn.lat);
			Xlongi = parseFloat(dataReturn.longi);
		
			var map = new google.maps.Map(document.getElementById('MLGmapa'), {
				zoom              : 14,
				center            : {lat: Xlat, lng: Xlongi},
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
		
			var icon = {
				path: google.maps.SymbolPath.CIRCLE,
				strokeWeight: 3,
				strokeOpacity: 0.7,
				scale: 10,
				fillColor: '#11b700',
				fillOpacity: 1,
				strokeColor:'#0d6104'
			}
			
			//Cria os pontos no mapa
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				icon: icon,
				map: map
			});
		
			var infowindow = new google.maps.InfoWindow({
				content: '<div class="col-md-12"><table><tbody><tr><td class="text-center"><h2>'+dataReturn.fult_loc+' '+dataReturn.hult_loc+'</h2><br><small>há '+dataReturn.tempo_atras+'</small></td></tr></tbody></table></div>'
			});

			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
		
		MLGcarrega_geofences(map, Xid_key);
		
	}).fail(function(dataReturn) {

		 try {
				 response = JSON.parse(dataReturn.responseText);
				 mensagem = response.msg;
		 } catch(e) {
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
	});
}
// Fim carrega mapa registros

// < Submit do formulário compartilhar checklist ***************************************************************
MSCformCompartilharChecklist = $('form[name=MSCformCompartilharChecklist]');
MSCbtnEnviarCompartilharChecklist = $('button[name=MSCbtnEnviarCompartilharChecklist]');

MSCbtnEnviarCompartilharChecklist.click(function(e) {
	
	if($('.CKemail').is(':checked'))
	{
		if($('#CKchk_email_6').is(':checked') &&
			 ($('#CKemail_6').val() == undefined || $('#CKemail_6').val() == ''))
		{
			swal({
					position: 'top-right',
					title: 'Ops, tivemos um problema',
					text: 'Um email deve ser informado.',
					type: 'warning',
					showConfirmButton: false,
					timer: 1500
			});
		}
		else
		{
			formData = MSCformCompartilharChecklist.serializeArray();
			//console.log(formData);
				$.ajax({
					url: WEBSITE + MSCformCompartilharChecklist.attr('action'),
					data: formData,
					method: 'POST',
					beforeSend: function() {
						MSCbtnEnviarCompartilharChecklist.attr("disabled", "disabled");
						MSCbtnEnviarCompartilharChecklist.html("<i class='fa fa-spinner fa-spin fa-fw'></i> Aguarde...")
					}
				}).success(function(dataReturn) {

					try {
						response = JSON.parse(dataReturn);
						mensagem = response.msg;
						id_key = response.id_key;
					} catch (e) {
						mensagem = 'Houve um problema com nosso servidor, tente novamente.';
					}

					MSCbtnEnviarCompartilharChecklist.removeAttr("disabled");
					MSCbtnEnviarCompartilharChecklist.html("&nbsp;&nbsp;Enviar&nbsp;&nbsp;");
					swal({
							position: 'top-right',
							type: 'success',
							title: 'Sucesso',
							text: mensagem,
							showConfirmButton: false,
							timer: 1500
					})
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
					});

					MSCbtnEnviarCompartilharChecklist.removeAttr("disabled");
					MSCbtnEnviarCompartilharChecklist.html("&nbsp;&nbsp;Enviar&nbsp;&nbsp;");

				});
		}
	}
	else
	{
		swal({
				position: 'top-right',
				title: 'Ops, tivemos um problema',
				text: 'Um email deve ser selecionado.',
				type: 'warning',
				showConfirmButton: false,
				timer: 1500
		});
	}
});
// > Submit do formulário compartilhar checklist ***************************************************************

//Iniciar mapa posicionamento
function initMapPosGeo() {
	$('#MPGmapa').html('<div class="text-center"><BR><BR><img src="../img/Preloader_10.gif"><BR><h3>Carregando...</h3><BR><BR></div>');
	//Resgata registros
	$.ajax({
			 url     : WEBSITE+'json/geolocation/load_tecnicos_geofences.php',
			 method  : 'POST'
	}).success(function(dataReturn) {
		dataReturn = JSON.parse(dataReturn);
		var map;
		var mm = 0;
		//Geofences / OS
		$.each(dataReturn.geofences, function(i, e) {
			Xlat = parseFloat(e.Llat);
			Xlongi = parseFloat(e.Llongi);
			
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('MPGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			//if(e.estado == 'on')
			if(e.fecha_finalizada != '0000-00-00')
				Xicon = 'https://icons.iconarchive.com/icons/custom-icon-design/pretty-office-8/24/Accept-icon.png';
			else
				Xicon = 'http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_os_pend.png';
			
			var marker = new google.maps.Marker({ 
				position: {lat: Xlat, lng: Xlongi},
				icon: e.icone,
				map: map
			});
			
			//Busca as informações do técnico
			var infowindow = new google.maps.InfoWindow({
				content: e.conteudo
			});

			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			
			mm = mm+1;
		});
		
		//Empresa / Customer
		$.each(dataReturn.empresa, function(i, e) {
			Xlat = parseFloat(e.lat);
			Xlongi = parseFloat(e.longi);
			
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('MPGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				icon: 'http://carlos-ti.com/cw3/osmapSYS/painel2.0/images/icon_customer.png',
				map: map
			});

			//Busca as informações do técnico
			var infowindow = new google.maps.InfoWindow({
				content: "Sede da empresa."
			});
			
			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});			
						
			mm = mm+1;
		});
		
		//Usuários / TécnicosR
		$.each(dataReturn.veiculos, function(i, e) {
			Xlat = parseFloat(e.lat);
			Xlongi = parseFloat(e.longi);

			var Xicon = {
			    url: e.icon, // url
			    scaledSize: new google.maps.Size(30, 30), // scaled size
			    origin: new google.maps.Point(0,0), // origin
			    anchor: new google.maps.Point(0, 0) // anchor
			};
			
			if(mm == 0)
			{
				map = new google.maps.Map(document.getElementById('MPGmapa'), {
					zoom              : 14,
					center            : {lat: Xlat, lng: Xlongi},
					mapTypeId: google.maps.MapTypeId.ROADMAP
				});
			}
			
			//Procurando o endereço com as coordenadas
			/*
			NÃO DEU CERTO ATÉ O MOMENTO - ERRO RETORNADO
			{
				"error_message" : "This API project is not authorized to use this API.",
				"results" : [],
				"status" : "REQUEST_DENIED"
			}
			*/

			/*
			Xendereco = "";
			console.log("Buscando coordenadas: "+Xlat+","+Xlongi);
			if(!isNaN(Xlat))
			{
				$.ajax({
					url     : 'https://maps.googleapis.com/maps/api/geocode/json?latlng='+Xlat+","+Xlongi+"&key=AIzaSyDMOPJ-ZKJ5DoUmNdnNWpsFgrkM1x_Zozw",
					data    : {},
					method  : 'GET'
				}).success(function(dataReturn) {
					if(dataReturn.status == 'OK') {
						console.log("Retorno mapa");
						console.log(dataReturn);
						temp = dataReturn.results[0].geometry.location;
						Xendereco = "";
						console.log("Pegou endereço");
					}
				});
			}
			*/
			
			var marker = new google.maps.Marker({
				position: {lat: Xlat, lng: Xlongi},
				// label: e.Unome,
				icon : Xicon,
				map: map
			});
			
			//Busca as informações do técnico
			var infowindow = new google.maps.InfoWindow({
				content: e.conteudo
			});

			//Associa a informação com a posição do mapa
			marker.addListener('click', function() {
				infowindow.open(map, marker);
			});
			mm = mm+1;
		});
		
		$('#ModalMapaPosGeo').modal('show');

	}).fail(function(dataReturn) {

		 try {
				 response = JSON.parse(dataReturn.responseText);
				 mensagem = response.msg;
		 } catch(e) {
				 mensagem = 'Houve um problema com nosso servidor, tente novamente.';
		 }

		 swal({
					position: 'top-right',
					title: 'Ops, tivemos um problema',
					text: mensagem,
					type: 'warning',
					showConfirmButton: false,
					timer: 1500
			});
			$('#MPGmapa').html('<div class="text-center"><BR><BR>'+mensagem+'<BR><BR></div>');
	});
 }
// Fim mapa geolocalização
//******************* FIM FUNÇÕES GEOLOCALIZAÇÃO *************/


function enviar_whatsapp(Xid_key_servidor,Xnumero_origem,Xnumero_destino,Xmensagem)
{

		$.ajax({
				url     : WEBSITE+'json/variados/enviar_mensagem_whatsapp.php',
				data    : {
							    'id_key_servidor' : Xid_key_servidor,
							    'numero_destino' : Xnumero_destino,
							    'numero_origem' : Xnumero_origem,
							    'mensagem' : Xmensagem
							  },
				method  : 'POST'
		}).success(function(dataReturn) {
			try 
			{
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} 
			catch(e)
			{
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			console.log("Enviado com sucesso..."+Xid_key_servidor+" - "+Xnumero_destino);

			/*
			swal({
					position: 'top-right',
					type: 'success',
					title: 'Deslogado com sucesso!',
					text: "Você será redirecionado em 5 segundos.",
					showConfirmButton: false,
					timer: 1500
			})
			*/
			
		});

}

function enviar_whatsapp_teste(Xid_key_servidor,Xnumero_origem,Xnumero_destino,Xmensagem)
{

    // alert(Xnumero_origem);
	swal({
		title: "Digite o numero para teste:",
		text: "Lembre-se de colocar codigo do pais (55)",
		type: "input",
		inputType: "text",
		inputValue: Xnumero_destino,
		showCancelButton: true,
		closeOnConfirm: false,
		showLoaderOnConfirm: true,
		animation: "slide-from-top",
		inputPlaceholder: "55"
	},
	function(inputValue){
	
		if (inputValue === false) return false;

		$.ajax({
				url     : WEBSITE+'json/variados/enviar_mensagem_whatsapp.php',
				data    : {
							    'id_key_servidor' : Xid_key_servidor,
							    'numero_destino' : inputValue,
							    'numero_origem' : Xnumero_origem,
							    'mensagem' : Xmensagem
							  },
				method  : 'POST'
		}).success(function(dataReturn) {
			try 
			{
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} 
			catch(e)
			{
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			console.log("Enviado com sucesso..."+Xid_key_servidor+" - "+Xnumero_destino);
			
			swal.close();

		});
		
	});

}


function desconectar_whatsapp(Xid_key_servidor,Xnumero_telefone)
{

        alert("Aqui..."+Xid_key_servidor+" - "+Xnumero_telefone);
        
		$.ajax({
				url     : WEBSITE+'json/variados/desconectar_whatsapp.php',
				data    : {
							    'id_key_servidor' : Xid_key_servidor,
							    'numero_telefone' : Xnumero_telefone
							  },
				method  : 'POST'
		}).success(function(dataReturn) {
			try 
			{
				response = JSON.parse(dataReturn);
				mensagem = response.msg;
			} 
			catch(e)
			{
				mensagem = 'Houve um problema com nosso servidor, tente novamente.';
			}
			
			console.log("Enviado com sucesso..."+Xid_key_servidor+" - "+Xnumero_telefone);

			/*
			swal({
					position: 'top-right',
					type: 'success',
					title: 'Deslogado com sucesso!',
					text: "Você será redirecionado em 5 segundos.",
					showConfirmButton: false,
					timer: 1500
			})
			*/
			
		});

}

function copyToClipboard(element) {
    // Verifica se a API Clipboard está disponível e o contexto é seguro (HTTPS ou localhost)
    text=$('#'+element).val();
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text)
            .then(() => {
                alert('Texto copiado com sucesso!');
                console.log('Texto copiado via Clipboard API: ' + text);
            })
            .catch(err => {
                console.error('Erro ao copiar com Clipboard API: ', err);
                fallbackCopy(text);
            });
    } else {
        // Fallback para ambientes sem Clipboard API ou contexto não seguro
        fallbackCopy(text);
    }
}

function fallbackCopy(text) {
    // Cria um elemento textarea temporário
    var textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed'; // Evita rolagem ou interferência no layout
    textarea.style.opacity = '0'; // Torna invisível
    document.body.appendChild(textarea);
    
    // Seleciona o texto
    textarea.select();
    textarea.setSelectionRange(0, textarea.value.length); // Suporte para dispositivos móveis
    
    try {
        var success = document.execCommand('copy');
        if (success) {
            alert('Texto copiado com sucesso!');
            console.log('Texto copiado via execCommand: ' + text);
        } else {
            alert('Falha ao copiar. Por favor, copie manualmente: ' + text);
            console.error('Falha ao executar document.execCommand("copy")');
        }
    } catch (err) {
        alert('Falha ao copiar. Por favor, copie manualmente: ' + text);
        console.error('Erro no fallback de cópia: ', err);
    }
    
    // Remove o textarea do DOM
    document.body.removeChild(textarea);
}

// Exemplo de uso com um botão
document.addEventListener('DOMContentLoaded', function() {
    var copyButton = document.getElementById('copyButton');
    if (copyButton) {
        copyButton.addEventListener('click', function() {
            var textToCopy = 'https://exemplo.com/questionario'; // Substitua pelo texto desejado
            copyToClipboard(textToCopy);
        });
    }
});