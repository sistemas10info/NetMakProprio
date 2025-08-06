var handleCalendarDemo = function () {
	 "use strict";
   
    $('#calendar').fullCalendar({
				allDay 			 		 : true,
				displayEventTime : false,
				events 		 			 : datasCelndario,
				editable   			 : true,
        eventLimit 			 : true,
				eventClick: function(calEvent, jsEvent, view) {
						$('[name=dataEdit]').val(calEvent.infos.dia+'/'+calEvent.infos.mes+'/'+calEvent.infos.ano);
						
						$('[name=celular_pEdit]').val(calEvent.infos.infoUnidade.celular_p);
						$('[name=email_pEdit]').val(calEvent.infos.infoUnidade.email_p);
					
						$('[name=id_keyEdit]').val(calEvent.infos.id_key);
						$('[name=unidadeEdit]').val(calEvent.infos.unidade);
						$('[name=nome_eventoEdit]').val(calEvent.infos.nome_evento);
						$('[name=obsEdit]').val(calEvent.infos.obs);
					
						$('#modal-exibe-calendar').modal('show');
				},
				eventDrop: function(event, delta, revertFunc) {
					
					$.ajax({
						data : {
							'novaData'  : event.start.format(),
							'id_key'    : event.id
						},
						url     : 'http://s101.sistemas10.com/cw2/sindicopro_web/admin/sindicopro_web/ajax/php-reservas/put-data-reserva.php',
						method  : 'POST',
						success : function(data) {

								try {
										returnData = JSON.parse(data); // Converte retorno  para JSON
									
										if(!returnData.head)
											alert(returnData.response);
									
										console.log(returnData);
								} catch(error) {
										console.log(data);
								}

						}
					}).fail(function (jqXHR, textStatus) {
							console.log('erro ajax');
					});
					
				},
				dayClick: function(date, jsEvent, view) {
					
					var dataAtual   = new Date();
					
					var ddAtual   = dataAtual.getDate();
					var mmAtual   = dataAtual.getMonth()+1;
					var yyyyAtual = dataAtual.getFullYear();
					
					var dataClicada = new Date(date.format('YYYY-MM-D'));
					
					var ddClicada   = dataClicada.getDate();
					var mmClicada   = dataClicada.getMonth()+1;
					var yyyyClicada = dataClicada.getFullYear();
					
					if(dataAtual.getTime() >= dataClicada.getTime())
					{
						$('#modal-alerta-calendar').modal('show');
						$('#msg').html('Você só pode selecionar uma data que ainda não tenha ocorrido!');
						return false;
					}
					$.ajax({
						data : {
							'fecha_d'  		: date.format('YYYY-MM-D'),
							'codigo_int' 	: $('[name=codigo_int]').val(),
							'condominio' 	: $('[name=condominio]').val(), 
							'id_key_area' : $('[name=id_key_area]').val(),
							'horario' 		: $('[name=horario]').val()
						},
						url     : 'http://s101.sistemas10.com/cw2/sindicopro_web/admin/sindicopro_web/ajax/php-reservas/get-event-with-date.php',
						method  : 'POST',
						success : function(data) {		
								
								var dataJson = JSON.parse(data); // Converte retorno  para JSON
								
								try {
									
										if(dataJson.reserva.id == '--')
										{
											$('#modal-alerta-calendar').modal('show');
											$('#msg').html('Este dia está bloqueado!');	
										}
										else if(dataJson.head) 
										{
											// existe uma reserva neste dia
											
											$('[name=celular_pEdit]').val(dataJson.reserva.infos.infoUnidade.celular_p);
											$('[name=email_pEdit]').val(dataJson.reserva.infos.infoUnidade.email_p);
											
											$('[name=dataEdit]').val(dataJson.reserva.infos.dia+'/'+dataJson.reserva.infos.mes+'/'+dataJson.reserva.infos.ano);
											$('[name=id_keyEdit]').val(dataJson.reserva.infos.id_key);
											$('[name=unidadeEdit]').val(dataJson.reserva.infos.unidade);
											$('[name=nome_eventoEdit]').val(dataJson.reserva.infos.nome_evento);
											$('[name=obsEdit]').val(dataJson.reserva.infos.obs);

											$('#modal-exibe-calendar').modal('show');
											
										}	 else {
											// nao existe reserva neste dia
											
											$('#modal-date-calendar').find('[name=data]').val(date.format('D/MM/YYYY'));
											$('#modal-date-calendar').modal('show');
											
										}
									
								} catch(error) {
										console.log(error);
								}

						}
					}).fail(function (jqXHR, textStatus) {
							console.log('erro ajax');
					});
					
				}
    });
};

var Calendar = function () {
	"use strict";
    return {
        //main function
        init: function () {
					handleCalendarDemo();
        }
    };
}();