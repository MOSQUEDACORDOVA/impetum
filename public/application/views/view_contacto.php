<img class="hidden-xs" src="<?php echo base_url('site-img/Contacto.jpg');?>" style="width: 100%;margin-top: 85px;">
<img class="visible-xs" src="<?php echo base_url('site-img/Contacto_mov.jpg');?>" style="width: 100%;margin-top: 72px;">
<div class="formatoTitulosImpetum" style="padding-bottom: 50px;">
	<hr class="redRule">&nbsp;&nbsp;&nbsp;&nbsp;Contacto&nbsp;&nbsp;&nbsp;&nbsp;<hr class="redRule">
</div>
<div style="width: 100%;text-align: center;">
	<span class="subtituloImpetum" style="font-size: 16px;">Para obtener ayuda o cualquier consulta<br class="visible-xs"> por favor utilice el siguiente formulario.</span>
</div>
<div class="contenedorTextos">
	<div style="width: 100%;height: 20px;"></div>
	<div style="max-width: 340px;margin: auto;text-align: center;padding:0px 30px;">
		<input type="text" class="inputForm form-control" placeholder="Nombre" id="name_contacto" name="name">
		<input type="text" class="inputForm form-control" placeholder="Su email" id="email_contacto" name="email">
		<input type="text" class="inputForm form-control" placeholder="Teléfono (opcional)" id="phone_contacto" name="phone">
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
	<div style="width: 100%;height: 80px;"></div>
	<hr style="width:100%;background: gray;">
	<div style="width: 100%;height: 80px;"></div>
	<div style="width: 100%;text-align: center;">
		<span style="font-size: 16px !important;color:#929292 !important;font-family: 'Questrial';">E-mail</span><br><br>
				<a href="mailto:info@impetum.mx" style="font-size: 16px !important;color:#000 !important;font-family: 'Questrial';text-transform: lowercase !important;">info@impetum.mx</a>
				<div style="width:100%;height:40px;"></div>
				<span style="font-size: 16px !important;color:#929292 !important;font-family: 'Questrial';">Teléfono</span><br><br>
				<a href="tel:5585250647" style="font-size: 16px !important;color:#000 !important;font-family: 'Questrial';text-transform: lowercase !important;"><font color="#d92741">+</font>52 (55) 55-8525-0647 & 55-3058-9119</a>
				<div style="width:100%;height:60px;"></div>
				<img src="<?php echo base_url('site-img/mail.svg');?>" width="22"><br><br>
				<a class="hover_black" href="#" target="_blank" style="font-family: 'Questrial';font-size: 13px;color:rgb(121, 121, 121);">Suscríbete a nuestro newsletter.</a>
				<div style="width:100%;height:40px;"></div>
				<img src="<?php echo base_url('site-img/lock.svg');?>" width="15"><br><br>
				<a class="hover_black" href="<?php echo base_url('privacidad');?>" style="font-family: 'Questrial';font-size: 13px;color:rgb(121, 121, 121);">Aviso de privacidad.</a>
				<div style="width:100%;height:60px;"></div>
				<a href="https://www.instagram.com/impetum.mx/" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/instagram.svg');?>" width="22"></a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/impetum.com.mx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/facebook.svg');?>" width="22"></a>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/ImpetumMx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/twitter.svg');?>" width="22"></a>
				<div style="width:100%;height:100px;"></div>
				<span style="font-family: 'Questrial';font-size: 13px;color:rgb(160, 160, 160);line-height: 28px;">© IMPETUM INMOBILIARIA<br class="visible-xs"><span class="hidden-xs">&nbsp;&nbsp;│&nbsp;&nbsp;</span>Todos los derechos reservados.</span>
				
	</div>
	<div style="width: 100%;height:100px;"></div>
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