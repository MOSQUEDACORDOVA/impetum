<img class="hidden-xs" src="<?php echo base_url('site-img/Inversionistas.jpg');?>" style="width: 100%;margin-top: 85px;">
<img class="visible-xs" src="<?php echo base_url('site-img/Inversionistas_mov.jpg');?>" style="width: 100%;margin-top: 72px;">
<div class="formatoTitulosImpetum" style="padding-bottom: 50px;">
	<hr class="redRule">&nbsp;&nbsp;&nbsp;&nbsp;Inversionistas&nbsp;&nbsp;&nbsp;&nbsp;<hr class="redRule">
</div>
<div style="width: 100%;text-align: center;">
	<span class="subtituloImpetum" style="font-weight: normal;font-size: 16px;">Una inversión ahora es<br class="visible-xs"> un legado en el futuro.</span>
</div>
<div style="width: 100%;height: 50px;"></div>
<div class="contenedorTextos">
	<div class="textosGenericos">
		Nuestra amplia experiencia y profesionalismo es la mejor opción para crear valor a su patrimoniodolor, los bienes raíces pueden ofrecer una forma lucrativa y confiable de obtener ganancias sustanciales tanto a corto como a largo plazo, nuestros desarrollos pueden complementar su cartera con beneficios únicos y diversificación.<br><br>

Contamos con bienes inmuebles residenciales que consisten en viviendas unifamiliares, viviendas multifamiliares, departamentos y condominios. Bienes raíces comerciales que se clasifican como oficinas, locales comerciales, oficinas comerciales, restaurantes y grandes edificios.<br><br>

Al igual que con la propiedad de cualquier patrimonio, la propiedad inmobiliaria le da al inversor la capacidad de ganar dinero con la venta de ese patrimonio. La apreciación, o aumento en el valor de una propiedad a lo largo del tiempo, representa la ganancia potencial disponible para un inversionista cuando se vende esa propiedad.
	</div>
	<!--<div class="hidden-xs" style="width: 100%;height:120px;"></div>
	<div class="visible-xs" style="width: 100%;height:60px;"></div>
	<div style="width: 100%;text-align: left;">
		<span class="miniTitulo">Proyectos concluidos</span>
	</div>
	<div style="width: 100%;height:55px;"></div>
	<div class="textosGenericos columnas">
		• Insurgentes Sur 540, Roma Sur<br>
		• Altadena 126, Nápoles<br>
		• Quebrada 216, Narvarte<br>
		• Empresa 60, Escandón<br>
		• Villas Avandaro, Valle de Bravo<br>
		• Bahía de las Palmas 171, Anzures<br>
		• Eugenia 829, Del Valle<br>
		• Yautepec 140, Condesa<br>
		• Patriotismo 497, San Pedro de los Pinos<br>
		• Suiza 38, Portales<br>
		• Insurgentes Sur 540, Roma Sur<br>
		• Altadena 126, Nápoles<br>
		• Quebrada 216, Narvarte<br>
		• Empresa 60, Escandón<br>
		• Villas Avandaro, Valle de Bravo<br>
		• Bahía de las Palmas 171, Anzures<br>
		• Eugenia 829, Del Valle<br>
		• Yautepec 140, Condesa<br>
		• Patriotismo 497, San Pedro de los Pinos<br>
		• Suiza 38, Portales
	</div>-->
	<div class="hidden-xs" style="width: 100%;height:120px;"></div>
	<div class="visible-xs" style="width: 100%;height:60px;"></div>
	<div class="textosGenericos" style="text-align: center;">
		<span class="tituloFormularios">Contáctanos para más información</span>
	</div>
	<div style="width: 100%;height: 20px;"></div>
	<div style="max-width: 340px;margin: auto;text-align: center;padding:0px 30px;">
		<input type="text" class="inputForm form-control" placeholder="Nombre" id="name_contacto">
		<input type="text" class="inputForm form-control" placeholder="Su email" id="email_contacto">
		<input type="text" class="inputForm form-control" placeholder="Teléfono (opcional)" id="phone_contacto">
		<textarea class="inputForm form-control" placeholder="Su mensaje" style="height: 120px;" id="mensaje_contacto"></textarea>
		<div style="width: 100%;text-align: center;margin-top:30px;">
			<div class="form-group" style="font-size:12px;text-align: center;">
				<div class="" style="font-family:'Questrial';font-size: 11px;font-weight: normal;color:rgb(121, 121, 121);">
				  <label><input type="checkbox" value="" checked="true" style="position:relative;top:3px;">&nbsp;&nbsp;<span>Acepto los términos de uso y</span></label> <a href="<?php echo base_url('privacidad');?>" style="color:#2a4767;text-decoration: none;">aviso de privacidad</a>
				</div>
			</div>
			<div style="width: 100%;height: 20px;"></div>
			<button id="enviar_contacto" class="btn" style="background:rgb(5, 0, 23);border-radius:0px;width: 100%;height:36px;color: #FFF;font-family: 'Questrial';font-size: 13px;font-weight: normal;">ENVIAR</button>
		</div>
	</div>
	
	<div class="hidden-xs" style="width: 100%;height:170px;"></div>
	<div class="visible-xs" style="width: 100%;height:80px;"></div>
</div>

<script>
	$( "#enviar_contacto" ).click(function() {
		var email = $("#email_contacto").val();
		var name = $("#name_contacto").val();
		var phone = $("#phone_contacto").val();
		var mensaje = $("textarea#mensaje_contacto").val();
		if ($("#name_contacto").val() == ''){
		 	alert('Proporcione su nombre completo');
			return false;
		}
		if ($("#email_contacto").val() == ''){
		 	alert('Proporcione su correco electrónico');
			return false;
		}
		if($("#email_contacto").val().indexOf('@', 0) == -1 || $("#email_contacto").val().indexOf('.', 0) == -1) {
			alert('Correo electrónico inválido');
			return false;
		}
		$.ajax({
			url:'contacto/mail',
			type:'POST',
			data:{email:email,name:name,phone:phone,mensaje:mensaje},
			success:function(result){
				if(result.success){
					alert('¡Su mensaje ha sido enviado con éxito!');
					$("#email_contacto").val('');
					$("#name_contacto").val('');
					$("#phone_contacto").val('');
					$("textarea#mensaje_contacto").val('');
				}
			}
		});
	});
</script>