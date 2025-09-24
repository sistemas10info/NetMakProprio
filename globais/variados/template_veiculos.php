	<!-- TEMPLATE 01 -->
	 <div class="row form-group template_1 templates" <?=((@$vei3['template']<>"1") ? "style='display:none;'" : "")?>>
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

     <div class="row form-group template_1 templates" <?=((@$vei3['template']<>"1") ? "style='display:none;'" : "")?>>
     
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
			   <option value='4 a 5 metros' <? if (@$vei3['cap_elevacao']=="4 a 5 metros") echo "selected ";?>>4 a 5 metros</option>
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


	<!-- TEMPLATE P pa carregadeira -->
	 <div class="row form-group template_P templates" <?=((@$vei3['template']<>"P") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_P" name="motor_P">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_P" name="potencia_hp_P">
			   <option value='até 100 HP' <? if (@$vei3['potencia_hp']=="até 100 HP") echo "selected ";?>>até 100 HP</option>
			   <option value='101 a 200 HP' <? if (@$vei3['potencia_hp']=="101 a 200 HP") echo "selected ";?>>101 a 200 HP</option>
			   <option value='acima de 200 HP' <? if (@$vei3['potencia_hp']=="acima de 200 HP") echo "selected ";?>>acima de 200 HP</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_P templates" <?=((@$vei3['template']<>"P") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Capacidade da caçamba</label><BR> 
			<select class="form-control f12" id="capacidade_cacamba_P" name="capacidade_cacamba_P">
			   <option value='até 1,5 m³' <? if (@$vei3['capacidade_cacamba']=="até 1,5 m³") echo "selected ";?>>até 1,5 m³</option>
			   <option value='1,6 a 3 m³' <? if (@$vei3['capacidade_cacamba']=="1,6 a 3 m³") echo "selected ";?>>1,6 a 3 m³</option>
			   <option value='acima de 3 m' <? if (@$vei3['capacidade_cacamba']=="acima de 3 m") echo "selected ";?>>acima de 3 m</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_P" name="peso_operacional_P">
			   <option value='até 10 t' <? if (@$vei3['peso_operacional']=="até 10 t") echo "selected ";?>>até 10 t</option>
			   <option value='10 a 20 t' <? if (@$vei3['peso_operacional']=="10 a 20 t") echo "selected ";?>>10 a 20 t</option>
			   <option value='acima de 20 t' <? if (@$vei3['peso_operacional']=="acima de 20 t") echo "selected ";?>>acima de 20 t</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE P pa carregadeira -->

	<!-- TEMPLATE R retro escavadeira -->
	 <div class="row form-group template_R templates" <?=((@$vei3['template']<>"R") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_R" name="motor_R">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_R" name="potencia_hp_R">
			   <option value='até 100 HP' <? if (@$vei3['potencia_hp']=="até 100 HP") echo "selected ";?>>até 100 HP</option>
			   <option value='101 a 150 HP' <? if (@$vei3['potencia_hp']=="101 a 150 HP") echo "selected ";?>>101 a 200 HP</option>
			   <option value='acima de 150 HP' <? if (@$vei3['potencia_hp']=="acima de 150 HP") echo "selected ";?>>acima de 200 HP</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_R templates" <?=((@$vei3['template']<>"R") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Capacidade da caçamba</label><BR> 
			<select class="form-control f12" id="capacidade_cacamba_R" name="capacidade_cacamba_R">
			   <option value='até 0,2 m³' <? if (@$vei3['capacidade_cacamba']=="até 0,2 m³") echo "selected ";?>>até 0,2 m³</option>
			   <option value='0,21 a 0,3 m³' <? if (@$vei3['capacidade_cacamba']=="0,21 a 0,3 m³") echo "selected ";?>>0,21 a 0,3 m³</option>
			   <option value='acima de 0,3 m³' <? if (@$vei3['capacidade_cacamba']=="acima de 0,3 m³") echo "selected ";?>>acima de 0,3 m³</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Profundidade máxima de escavação</label><BR>
			<select class="form-control f12" id="profundidade_escavacao_R" name="profundidade_escavacao_R">
			   <option value='até 4 m' <? if (@$vei3['profundidade_escavacao']=="até 4 m") echo "selected ";?>>até 4 m</option>
			   <option value='4,1 a 5,5 m' <? if (@$vei3['profundidade_escavacao']=="4,1 a 5,5 m") echo "selected ";?>>4,1 a 5,5 m</option>
			   <option value='acima de 5,5 m' <? if (@$vei3['profundidade_escavacao']=="acima de 5,5 m") echo "selected ";?>>acima de 5,5 m</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE R retro escavadeira-->

	<!-- TEMPLATE E Escavadeira Hidráulica / Mini -->
	 <div class="row form-group template_E templates" <?=((@$vei3['template']<>"E") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_E" name="motor_E">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_E" name="peso_operacional_E">
			   <option value='até 6 t' <? if (@$vei3['peso_operacional']=="até 6 t") echo "selected ";?>>até 6 t</option>
			   <option value='6,1 a 20 t' <? if (@$vei3['peso_operacional']=="6,1 a 20 t") echo "selected ";?>>6,1 a 20 t</option>
			   <option value='acima de 20 t' <? if (@$vei3['peso_operacional']=="acima de 20 t") echo "selected ";?>>acima de 20 t</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_E templates" <?=((@$vei3['template']<>"E") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Capacidade da caçamba</label><BR> 
			<select class="form-control f12" id="capacidade_cacamba_E" name="capacidade_cacamba_E">
			   <option value='até 0,4 m³' <? if (@$vei3['capacidade_cacamba']=="até 0,4 m³") echo "selected ";?>>até 0,4 m³</option>
			   <option value='0,41 a 1 m³' <? if (@$vei3['capacidade_cacamba']=="0,41 a 1 m³") echo "selected ";?>>0,41 a 1 m³</option>
			   <option value='acima de 1 m³' <? if (@$vei3['capacidade_cacamba']=="acima de 1 m³") echo "selected ";?>>acima de 1 m³</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Profundidade máxima de escavação</label><BR>
			<select class="form-control f12" id="profundidade_escavacao_E" name="profundidade_escavacao_E">
			   <option value='até 4 m' <? if (@$vei3['profundidade_escavacao']=="até 4 m") echo "selected ";?>>até 4 m</option>
			   <option value='4,1 a 6 m' <? if (@$vei3['profundidade_escavacao']=="4,1 a 6 m") echo "selected ";?>>4,1 a 6 m</option>
			   <option value='acima de 6 m' <? if (@$vei3['profundidade_escavacao']=="acima de 6 m") echo "selected ";?>>acima de 6 m</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE E Escavadeira Hidráulica / Mini-->

	<!-- TEMPLATE M Motoniveladora -->
	 <div class="row form-group template_M templates" <?=((@$vei3['template']<>"M") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_M" name="motor_M">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_M" name="peso_operacional_M">
			   <option value='até 10 t' <? if (@$vei3['peso_operacional']=="até 10 t") echo "selected ";?>>até 10 t</option>
			   <option value='10,1 a 15 t' <? if (@$vei3['peso_operacional']=="10,1 a 15 t") echo "selected ";?>>10,1 a 15 t</option>
			   <option value='acima de 15 t' <? if (@$vei3['peso_operacional']=="acima de 15 t") echo "selected ";?>>acima de 15 t</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_M templates" <?=((@$vei3['template']<>"M") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_M" name="potencia_hp_M">
			   <option value='até 120 HP' <? if (@$vei3['potencia_hp']=="até 120 HP") echo "selected ";?>>até 120 HP</option>
			   <option value='121 a 180 HP' <? if (@$vei3['potencia_hp']=="121 a 180 HP") echo "selected ";?>>121 a 180 HP</option>
			   <option value='acima de 180 HP' <? if (@$vei3['potencia_hp']=="acima de 180 HP") echo "selected ";?>>acima de 180 HP</option>
			</select>
		</div>		

		<div class="col-md-6">
			<label class="control-label text-right f12" >Largura da lâmina</label><BR>
			<select class="form-control f12" id="largura_lamina_M" name="largura_lamina_M">
			   <option value='até 3 m' <? if (@$vei3['largura_lamina']=="até 3 m") echo "selected ";?>>até 3 m</option>
			   <option value='3,1 a 4 m' <? if (@$vei3['largura_lamina']=="3,1 a 4 m") echo "selected ";?>>3,1 a 4 m</option>
			   <option value='acima de 4 m' <? if (@$vei3['largura_lamina']=="acima de 4 m") echo "selected ";?>>acima de 4 m</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE M Motoniveladora -->

	<!-- TEMPLATE RC Rolo compactador-->
	 <div class="row form-group template_RC templates" <?=((@$vei3['template']<>"RC") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_RC" name="motor_RC">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_RC" name="peso_operacional_RC">
			   <option value='até 8 t' <? if (@$vei3['peso_operacional']=="até 8 t") echo "selected ";?>>até 8 t</option>
			   <option value='8,1 a 12 t' <? if (@$vei3['peso_operacional']=="8,1 a 12 t") echo "selected ";?>>8,1 a 12 t</option>
			   <option value='acima de 12 t' <? if (@$vei3['peso_operacional']=="acima de 12 t") echo "selected ";?>>acima de 12 t</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_RC templates" <?=((@$vei3['template']<>"RC") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Tipo de rolo</label><BR>
			<select class="form-control f12" id="tipo_rolo_RC" name="tipo_rolo_RC">
			   <option value='liso' <? if (@$vei3['tipo_rolo']=="liso") echo "selected ";?>>liso</option>
			   <option value='pé de carneiro' <? if (@$vei3['tipo_rolo']=="pé de carneiro") echo "selected ";?>>pé de carneiro</option>
			   <option value='vibratório' <? if (@$vei3['tipo_rolo']=="vibratório") echo "selected ";?>>vibratório</option>
			   <option value='duplo' <? if (@$vei3['tipo_rolo']=="duplo") echo "selected ";?>>duplo</option>
			</select>
		</div>		

		<div class="col-md-6">
			<label class="control-label text-right f12" >Largura do tambor</label><BR>
			<select class="form-control f12" id="largura_tambor_RC" name="largura_tambor_RC">
			   <option value='até 1,5 m' <? if (@$vei3['largura_tambor']=="até 1,5 m") echo "selected ";?>>até 1,5 m</option>
			   <option value='1,51 a 2,2 m' <? if (@$vei3['largura_tambor']=="1,51 a 2,2 m") echo "selected ";?>>1,51 a 2,2 m</option>
			   <option value='acima de 2,2 m' <? if (@$vei3['largura_tambor']=="acima de 2,2 m") echo "selected ";?>>acima de 2,2 m</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE RC Rolo compactador -->

	<!-- TEMPLATE T Trator de esteira-->
	 <div class="row form-group template_T templates" <?=((@$vei3['template']<>"T") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_T" name="motor_T">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_T" name="peso_operacional_T">
			   <option value='até 10 t' <? if (@$vei3['peso_operacional']=="até 10 t") echo "selected ";?>>até 10 t</option>
			   <option value='10,1 a 20 t ' <? if (@$vei3['peso_operacional']=="10,1 a 20 t ") echo "selected ";?>>10,1 a 20 t</option>
			   <option value='acima de 20 t' <? if (@$vei3['peso_operacional']=="acima de 20 t") echo "selected ";?>>acima de 20 t</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_T templates" <?=((@$vei3['template']<>"T") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_T" name="potencia_hp_T">
			   <option value='até 120 HP' <? if (@$vei3['potencia_hp']=="até 120 HP") echo "selected ";?>>até 120 HP</option>
			   <option value='121 a 200 HP' <? if (@$vei3['potencia_hp']=="121 a 200 HP") echo "selected ";?>>121 a 200 HP</option>
			   <option value='acima de 200 HP' <? if (@$vei3['potencia_hp']=="acima de 200 HP") echo "selected ";?>>acima de 200 HP</option>
			</select>
		</div>		

		<div class="col-md-6">
			<label class="control-label text-right f12" >Largura da lâmina</label><BR>
			<select class="form-control f12" id="largura_lamina_T" name="largura_lamina_T">
			   <option value='até 3 m' <? if (@$vei3['largura_lamina']=="até 3 m") echo "selected ";?>>até 3 m</option>
			   <option value='3,1 a 4 m' <? if (@$vei3['largura_lamina']=="3,1 a 4 m") echo "selected ";?>>3,1 a 4 m</option>
			   <option value='acima de 4 m' <? if (@$vei3['largura_lamina']=="acima de 4 m") echo "selected ";?>>acima de 4 m</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE T Trator de esteira -->

	<!-- TEMPLATE C Caminhão Basculante-->
	 <div class="row form-group template_C templates" <?=((@$vei3['template']<>"C") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_C" name="motor_C">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_C" name="potencia_hp_C">
			   <option value='até 200 HP' <? if (@$vei3['potencia_hp']=="até 200 HP") echo "selected ";?>>até 200 HP</option>
			   <option value='201 a 300 HP' <? if (@$vei3['potencia_hp']=="201 a 300 HP") echo "selected ";?>>201 a 300 HP</option>
			   <option value='acima de 300 HP' <? if (@$vei3['potencia_hp']=="acima de 300 HP") echo "selected ";?>>acima de 300 HP</option>
			</select>
		</div>		
     </div>

     <div class="row form-group template_C templates" <?=((@$vei3['template']<>"C") ? "style='display:none;'" : "")?>>

		<div class="col-md-6">
			<label class="control-label text-right f12" >Capacidade da carga</label><BR> 
			<select class="form-control f12" id="capacidade_carga_C" name="capacidade_carga_C">
			   <option value='até 10 t' <? if (@$vei3['capacidade_carga']=="até 10 t") echo "selected ";?>>até 10 t</option>
			   <option value='10,1 a 20 t' <? if (@$vei3['capacidade_carga']=="10,1 a 20 t") echo "selected ";?>>10,1 a 20 t</option>
			   <option value='acima de 20 t' <? if (@$vei3['capacidade_carga']=="acima de 20 t") echo "selected ";?>>acima de 20 t</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Volume da caçamba</label><BR>
			<select class="form-control f12" id="volume_cacamba_C" name="volume_cacamba_C">
			   <option value='até 10 m³' <? if (@$vei3['volume_cacamba']=="até 10 m³") echo "selected ";?>>até 10 m³</option>
			   <option value='10,1 a 20 m³' <? if (@$vei3['volume_cacamba']=="10,1 a 20 m³") echo "selected ";?>>10,1 a 20 m³</option>
			   <option value='acima de 20 m³' <? if (@$vei3['volume_cacamba']=="acima de 20 m³") echo "selected ";?>>acima de 20 m³</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE C Caminhão Basculante-->

