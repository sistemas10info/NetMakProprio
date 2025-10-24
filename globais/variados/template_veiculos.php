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


	<!-- TEMPLATE TA Trator agrícola-->
	 <div class="row form-group template_TA templates" <?=((@$vei3['template']<>"TA") ? "style='display:none;'" : "")?>>
		<div class="col-md-4">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_TA" name="motor_TA">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-4">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_TA" name="potencia_hp_TA">
			   <option value='até 80 HP' <? if (@$vei3['potencia_hp']=="até 80 HP") echo "selected ";?>>até 80 HP</option>
			   <option value='de 81 a 150 HP' <? if (@$vei3['potencia_hp']=="de 81 a 150 HP") echo "selected ";?>>de 81 a 150 HP</option>
			   <option value='acima de 150 HP' <? if (@$vei3['potencia_hp']=="acima de 150 HP") echo "selected ";?>>acima de 150 HP</option>
			</select>
		</div>		

		<div class="col-md-4">
			<label class="control-label text-right f12" >Tração</label><BR>
			<select class="form-control f12" id="tracao_TA" name="tracao_TA">
			   <option value='4X2' <? if (@$vei3['tracao']=="4X2") echo "selected ";?>>4X2</option>
			   <option value='4X4' <? if (@$vei3['tracao']=="4X4") echo "selected ";?>>4X4</option>
			</select>
		</div>		

     </div>

     <div class="row form-group template_TA templates" <?=((@$vei3['template']<>"TA") ? "style='display:none;'" : "")?>>

		<div class="col-md-6">
			<label class="control-label text-right f12" >Peso operacional</label><BR> 
			<select class="form-control f12" id="peso_operacional_TA" name="peso_operacional_TA">
			   <option value='até 3 t' <? if (@$vei3['peso_operacional']=="até 3 t") echo "selected ";?>>até 3 t</option>
			   <option value='3,1 a 5 t' <? if (@$vei3['peso_operacional']=="3,1 a 5 t") echo "selected ";?>>3,1 a 5 t</option>
			   <option value='acima de 5 t' <? if (@$vei3['peso_operacional']=="acima de 5 t") echo "selected ";?>>acima de 5 t</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Transmissão</label><BR>
			<select class="form-control f12" id="transmissao_TA" name="transmissao_TA">
			   <option value='manual' <? if (@$vei3['transmissao']=="manual") echo "selected ";?>>manual</option>
			   <option value='automática' <? if (@$vei3['transmissao']=="automática³") echo "selected ";?>>automática</option>
			   <option value='hidrostática' <? if (@$vei3['transmissao']=="hidrostática") echo "selected ";?>>hidrostática</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE TA Trator agrícola-->

	<!-- TEMPLATE PU Pulverizador-->
	 <div class="row form-group template_PU templates" <?=((@$vei3['template']<>"PU") ? "style='display:none;'" : "")?>>
		<div class="col-md-4">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_PU" name="motor_PU">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrico' <? if (@$vei3['motor']=="Elétrico") echo "selected ";?>>Elétrico</option>
			</select>
		</div>									

		<div class="col-md-4">
			<label class="control-label text-right f12" >Capacidade do tanque</label><BR>
			<select class="form-control f12" id="capacidade_tanque_PU" name="capacidade_tanque_PU">
			   <option value='até 1.000 L' <? if (@$vei3['capacidade_tanque']=="até 1.000 L") echo "selected ";?>>até 1.000 L</option>
			   <option value='1.001 a 2.500 L' <? if (@$vei3['capacidade_tanque']=="1.001 a 2.500 L") echo "selected ";?>>1.001 a 2.500 L</option>
			   <option value='acima de 2.500 L' <? if (@$vei3['capacidade_tanque']=="acima de 2.500 L") echo "selected ";?>>acima de 2.500 L</option>
			</select>
		</div>		

		<div class="col-md-4">
			<label class="control-label text-right f12" >Largura da barra</label><BR>
			<select class="form-control f12" id="largura_barra_PU" name="largura_barra_PU">
			   <option value='até 18 m' <? if (@$vei3['largura_barra']=="até 18 m") echo "selected ";?>>até 18 m</option>
			   <option value='18,1 a 28 m' <? if (@$vei3['largura_barra']=="18,1 a 28 m") echo "selected ";?>>18,1 a 28 m</option>
			   <option value='acima de 28 m' <? if (@$vei3['largura_barra']=="acima de 28 m") echo "selected ";?>>acima de 28 m</option>
			</select>
		</div>		

     </div>

     <div class="row form-group template_PU templates" <?=((@$vei3['template']<>"PU") ? "style='display:none;'" : "")?>>

		<div class="col-md-6">
			<label class="control-label text-right f12" >Tipo propulsão</label><BR> 
			<select class="form-control f12" id="tipo_propulsao_PU" name="tipo_propulsao_PU">
			   <option value='autopropelido' <? if (@$vei3['tipo_propulsao']=="autopropelido") echo "selected ";?>>Autopropelido</option>
			   <option value='arrasto' <? if (@$vei3['tipo_propulsao']=="arrasto") echo "selected ";?>>Arrasto</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Sistema de controle</label><BR>
			<select class="form-control f12" id="sistema_controle_PU" name="sistema_controle_PU">
			   <option value='manual' <? if (@$vei3['sistema_controle']=="manual") echo "selected ";?>>manual</option>
			   <option value='eletrônico' <? if (@$vei3['sistema_controle']=="eletrônico") echo "selected ";?>>eletrônico</option>
			   <option value='automático' <? if (@$vei3['sistema_controle']=="automático") echo "selected ";?>>automático</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE PU Pulverizador-->

	<!-- TEMPLATE PL Plantadeira -->
	 <div class="row form-group template_PL templates" <?=((@$vei3['template']<>"PL") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Número de linhas</label><BR>
			<select class="form-control f12" id="numero_linhas_PL" name="numero_linhas_PL">
			   <option value='até 7' <? if (@$vei3['numero_linhas']=="até 7") echo "selected ";?>>até 7</option>
			   <option value='8 a 14' <? if (@$vei3['numero_linhas']=="8 a 14") echo "selected ";?>>8 a 14</option>
			   <option value='acima de 14' <? if (@$vei3['numero_linhas']=="acima de 14") echo "selected ";?>>acima de 14</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >espaçamento entre linhas</label><BR>
			<select class="form-control f12" id="espacamento_linhas_PL" name="espacamento_linhas_PL">
			   <option value='até 45 cm' <? if (@$vei3['espacamento_linhas']=="até 45 cm") echo "selected ";?>>até 45 cm</option>
			   <option value='46 a 60 cm' <? if (@$vei3['espacamento_linhas']=="46 a 60 cm") echo "selected ";?>>46 a 60 cm</option>
			   <option value='acima de 60 cm' <? if (@$vei3['espacamento_linhas']=="acima de 60 cm") echo "selected ";?>>acima de 60 cm</option>
			</select>
		</div>		

     </div>

     <div class="row form-group template_PL templates" <?=((@$vei3['template']<>"PL") ? "style='display:none;'" : "")?>>

		<div class="col-md-6">
			<label class="control-label text-right f12" >capacidade do reservatório</label><BR>
			<select class="form-control f12" id="capacidade_reservatorio_PL" name="capacidade_reservatorio_PL">
			   <option value='até 500 L' <? if (@$vei3['capacidade_reservatorio']=="até 500 L") echo "selected ";?>>até 500 L</option>
			   <option value='501 a 1.000 L' <? if (@$vei3['capacidade_reservatorio']=="501 a 1.000 L") echo "selected ";?>>501 a 1.000 L</option>
			   <option value='acima de 1.000 L' <? if (@$vei3['capacidade_reservatorio']=="acima de 1.000 L") echo "selected ";?>>acima de 1.000 L</option>
			</select>
		</div>		

		<div class="col-md-6">
			<label class="control-label text-right f12" >Tipo propulsão</label><BR> 
			<select class="form-control f12" id="tipo_propulsao_PL" name="peso_operacional_PL">
			   <option value='arrasto' <? if (@$vei3['tipo_propulsao']=="arrasto") echo "selected ";?>>Arrasto</option>
			   <option value='acoplamento' <? if (@$vei3['tipo_propulsao']=="acoplamento") echo "selected ";?>>acoplamento</option>
			   <option value='pneumática' <? if (@$vei3['tipo_propulsao']=="pneumática") echo "selected ";?>>pneumática</option>
			   <option value='mecânica' <? if (@$vei3['tipo_propulsao']=="mecânica") echo "selected ";?>>mecânica</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE PL Plantadeira -->
	 
	 <!-- TEMPLATE CO Colheitadera -->
	 <div class="row form-group template_CO templates" <?=((@$vei3['template']<>"CO") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Motorização</label><BR>
			<select class="form-control f12" id="motor_CO" name="motor_CO">
			   <option value='Diesel' <? if (@$vei3['motor']=="Diesel") echo "selected ";?>>Diesel</option>
			   <option value='Elétrica' <? if (@$vei3['motor']=="Elétrica") echo "selected ";?>>Elétrica</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Potência do motor</label><BR>
			<select class="form-control f12" id="potencia_hp_CO" name="potencia_hp_CO">
			   <option value='até 150 HP' <? if (@$vei3['potencia_hp']=="até 150 HP") echo "selected ";?>>até 150 HP</option>
			   <option value='151 a 300 HP' <? if (@$vei3['potencia_hp']=="151 a 300 HP") echo "selected ";?>>151 a 300 HP</option>
			   <option value='acima de 300 HP' <? if (@$vei3['potencia_hp']=="acima de 300 HP") echo "selected ";?>>acima de 300 HP</option>
			</select>
		</div>		

     </div>

     <div class="row form-group template_CO templates" <?=((@$vei3['template']<>"CO") ? "style='display:none;'" : "")?>>

		<div class="col-md-4">
			<label class="control-label text-right f12" >Largura da plataforma</label><BR>
			<select class="form-control f12" id="largura_plataforma_CO" name="largura_plataforma_CO">
			   <option value='até 3 m' <? if (@$vei3['largura_plataforma']=="até 3 m") echo "selected ";?>>até 3 m</option>
			   <option value='3,1 a 6 m' <? if (@$vei3['largura_plataforma']=="3,1 a 6 m") echo "selected ";?>>3,1 a 6 m</option>
			   <option value='acima de 6 m' <? if (@$vei3['largura_plataforma']=="acima de 6 m") echo "selected ";?>>acima de 6 m</option>
			</select>
		</div>									

		<div class="col-md-4">
			<label class="control-label text-right f12" >Capacidade do graneleiro</label><BR> 
			<select class="form-control f12" id="capacidade_granaleiro_CO" name="capacidade_granaleiro_CO">
			   <option value='até 4.000 L' <? if (@$vei3['capacidade_granaleiro']=="até 4.000 L") echo "selected ";?>>até 4.000 L</option>
			   <option value='4.001 a 8.000 L' <? if (@$vei3['capacidade_granaleiro']=="4.001 a 8.000 L") echo "selected ";?>>4.001 a 8.000 L</option>
			   <option value='acima de 8.000 L' <? if (@$vei3['capacidade_granaleiro']=="acima de 8.000 L") echo "selected ";?>>acima de 8.000 L</option>
			</select>
		</div>									

		<div class="col-md-4">
			<label class="control-label text-right f12" >Peso operacional</label><BR>
			<select class="form-control f12" id="peso_operacional_CO" name="peso_operacional_CO">
			   <option value='até 10 t' <? if (@$vei3['peso_operacional']=="até 10 t") echo "selected ";?>>até 10 t</option>
			   <option value='10 a 20 t' <? if (@$vei3['peso_operacional']=="10 a 20 t") echo "selected ";?>>10 a 20 t</option>
			   <option value='acima de 20 t' <? if (@$vei3['peso_operacional']=="acima de 20 t") echo "selected ";?>>acima de 20 t</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE PL Plantadeira -->


	 <!-- TEMPLATE AR Aradora/Niveladora -->
	 <div class="row form-group template_AR templates" <?=((@$vei3['template']<>"AR") ? "style='display:none;'" : "")?>>
		<div class="col-md-6">
			<label class="control-label text-right f12" >Largura de trabalho</label><BR>
			<select class="form-control f12" id="largura_trabalho_AR" name="largura_trabalho_AR">
			   <option value='até 2 m' <? if (@$vei3['largura_trabalho']=="até 2 m") echo "selected ";?>>até 2 m</option>
			   <option value='2,1 a 3 m' <? if (@$vei3['largura_trabalho']=="2,1 a 3 m") echo "selected ";?>>2,1 a 3 m</option>
			   <option value='acima de 3 m' <? if (@$vei3['largura_trabalho']=="acima de 3 m") echo "selected ";?>>acima de 3 m</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Número de discos</label><BR>
			<select class="form-control f12" id="numero_discos_AR" name="numero_discos_AR">
			   <option value='até 14' <? if (@$vei3['numero_discos']=="até 14") echo "selected ";?>>até 14</option>
			   <option value='15 a 24' <? if (@$vei3['numero_discos']=="15 a 24") echo "selected ";?>>15 a 24</option>
			   <option value='acima de 24' <? if (@$vei3['numero_discos']=="acima de 24") echo "selected ";?>>acima de 24</option>
			</select>
		</div>		

     </div>

     <div class="row form-group template_AR templates" <?=((@$vei3['template']<>"AR") ? "style='display:none;'" : "")?>>

		<div class="col-md-6">
			<label class="control-label text-right f12" >Diâmetro dos disco</label><BR>
			<select class="form-control f12" id="diametro_disco_AR" name="diametro_disco_AR">
			   <option value='até 22"' <? if (@$vei3['diametro_disco']=='até 22"') echo "selected ";?>>até 22"</option>
			   <option value='23" a 28' <? if (@$vei3['diametro_disco']=='23" a 28"') echo "selected ";?>>23" a 28"</option>
			   <option value='acima de 28"' <? if (@$vei3['diametro_disco']=='acima de 28"') echo "selected ";?>>acima de 28"</option>
			</select>
		</div>									

		<div class="col-md-6">
			<label class="control-label text-right f12" >Tipo maquina</label><BR> 
			<select class="form-control f12" id="tipo_maquina_AR" name="tipo_maquina_AR">
			   <option value='aradora' <? if (@$vei3['tipo_maquina']=="aradora") echo "selected ";?>>Aradora</option>
			   <option value='niveladora' <? if (@$vei3['tipo_maquina']=="niveladora") echo "selected ";?>>Niveladora</option>
			   <option value='hidráulica' <? if (@$vei3['tipo_maquina']=="hidráulica") echo "selected ";?>>Hidráulica</option>
			   <option value='fixa' <? if (@$vei3['tipo_maquina']=="fixa") echo "selected ";?>>Fixa</option>
			</select>
		</div>									

	 </div>
	 <!-- TEMPLATE PL Plantadeira -->


