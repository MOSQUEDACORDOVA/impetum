<html lang="es">
	<head>
		<!-- ========== PAGE TITLE ========== -->
		<title>IMPETUM | <?=$titulo;?></title>
		<!-- ========== META TAGS ========== -->
		<meta charset="utf-8" />
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<meta name="format-detection" content="telephone=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<!-- Latest compiled and minified CSS -->
		<link rel="icon" type="image/png" href="<?php echo base_url();?>site-img/favicon_impetum.png">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/hamburgers.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
		<!-- Latest Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha256-2Pjr1OlpZMY6qesJM68t2v39t+lMLvxwpa8QlRjJroA=" crossorigin="anonymous"></script>

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Questrial:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Muli:400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,500,600,700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500&display=swap" rel="stylesheet">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-200263270-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-200263270-1');
		</script>

	</head>

	<body>
		<div id="header">
			<div id="content-head">
				<a href="<?php echo base_url();?>inicio"><img src="<?php echo base_url();?>site-img/logo_head.svg" id="logo"></a>
				<span class="visible-xs" id="menu" style="font-family: 'Raleway';font-size: 11px;color:#FFF;position: absolute;right:60px;top:1px;cursor: pointer;"></span>
				<div class="hamburger hamburger--minus right-position abrir visible-xs">
					<div class="hamburger-box">
				      <div class="hamburger-inner"></div>
				    </div>
				</div>
				<ul id="menu-init" class="hidden-xs">
				  <li><a href="<?php echo base_url('propiedades');?>" class="font-menu">PROPIEDADES</a></li>
				  <li><a href="<?php echo base_url('desarrollos');?>" class="font-menu">DESARROLLOS</a></li>
				  <li><a href="<?php echo base_url('impetum');?>" class="font-menu">IMPETUM</a></li>
				  <li><a href="<?php echo base_url('agentes');?>" class="font-menu">AGENTES</a></li>
				  <li><a href="<?php echo base_url('inversionistas');?>" class="font-menu">INVERSIONISTAS</a></li>
				  <li class="hidden-sm"><a href="<?php echo base_url('contacto');?>" class="font-menu">CONTACTO</a></li>
				</ul>  
			</div>
		</div>
		<!-- OVERLAY MENU STARTS -->
		<!-- The overlay -->
		<div id="myNav" class="overlay">
			<!-- Overlay content -->
			<div class="overlay-content visible-xs">
		    	<a href="<?php echo base_url('propiedades');?>">PROPIEDADES</a>
				<a href="<?php echo base_url('desarrollos');?>">DESARROLLOS</a>
				<a href="<?php echo base_url('impetum');?>">IMPETUM</a>
				<a href="<?php echo base_url('agentes');?>">AGENTES</a>
				<a href="<?php echo base_url('inversionistas');?>">INVERSIONISTAS</a>
				<a href="<?php echo base_url('contacto');?>">CONTACTO</a>
				<div style="width:100%;height:50px;"></div>
				<span style="font-size: 18px !important;color:#929292 !important;font-family: 'Questrial';">E-mail</span><br>
				<a href="mailto:info@impetum.mx" style="font-size: 18px !important;color:#000 !important;font-family: 'Questrial';text-transform: lowercase !important;">info@impetum.mx</a>
				<div style="width:100%;height:20px;"></div>
				<span style="font-size: 18px !important;color:#929292 !important;font-family: 'Questrial';">Teléfono</span><br>
				<a href="tel:5585250647" style="font-size: 18px !important;color:#000 !important;font-family: 'Questrial';text-transform: lowercase !important;"><font color="#d92741">+</font>52 (55) 55-8525-0647 & 55-3058-9119</a>
				<div style="width:100%;height:40px;"></div>
				<a href="https://www.instagram.com/impetum.mx/" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/instagram.svg');?>" width="30"></a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/impetum.com.mx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/facebook.svg');?>" width="30"></a>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/ImpetumMx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/twitter.svg');?>" width="30"></a>
				<div style="width:100%;height:30px;"></div>
				<a href="<?php echo base_url('privacidad');?>" style="color:rgb(160, 160, 160) !important;font-size: 14px !important;font-family: 'Questrial' !important;text-transform: none !important;">Aviso de Privacidad.</a>
				<div style="width:100%;height:80px;"></div>
			</div>
		</div>
		
		<div id="dinamycContent">
			<!-- ========== CONTENIDO ANIDADO DINAMICO ========== -->
		    <?php $this->load->view($vista_contenido); ?>
		</div>
		
		<div id="footer-general">
			<a href="<?php echo base_url();?>inicio"><img src="<?php echo base_url();?>site-img/logo_footer.svg" id="logo-footer"></a>
			
			<div class="links hidden-xs" style="margin-top:60px;">
				<a href="<?php echo base_url('propiedades');?>">PROPIEDADES</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('desarrollos');?>">DESARROLLOS</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('impetum');?>">QUIÉNES SOMOS</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/impetum.com.mx" target="_blank">FACEBOOK</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/impetum.mx/" target="_blank">INSTAGRAM</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/ImpetumMx" target="_blank">TWITTER</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank">NEWSLETTER&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('privacidad');?>">AVISO DE PRIVACIDAD</a>
			</div>
			<div class="links-menu-footer visible-xs" style="margin-top:60px;line-height:16px;">
				<a href="<?php echo base_url('propiedades');?>">PROPIEDADES</a><br><br>
				<a href="<?php echo base_url('desarrollos');?>">DESARROLLOS</a><br><br>
				<a href="<?php echo base_url('impetum');?>">QUIÉNES SOMOS</a><br><br>
				<a href="https://www.facebook.com/impetum.com.mx" target="_blank">FACEBOOK</a><br><br>
				<a href="https://www.instagram.com/impetum.mx/" target="_blank">INSTAGRAM</a><br><br>
				<a href="https://twitter.com/ImpetumMx" target="_blank">TWITTER</a><br><br>
				<a href="#" target="_blank">NEWSLETTER<br><br>
				<a href="<?php echo base_url('privacidad');?>">AVISO DE PRIVACIDAD</a>
			</div>
			<div style="width: 100%;height: 60px;"></div>
			<img onclick="up()" src="<?php echo base_url('site-img/up-arrow.svg');?>" style="width: 32px;cursor: pointer;">	
			<br><br>
			<span onclick="up()" style="cursor:pointer;font-family: 'Muli';font-size: 11px;color: white;">volver arriba</span>
			<div style="width: 100%;height: 40px;"></div>
			<div style="background: rgb(217, 39, 65);height: 4px;width: 100%;position: absolute;bottom: 0px;"></div>

			<!--Jquery-->
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
			<!--Floating WhatsApp css-->
			<link rel="stylesheet" href="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.css">
			<!--Floating WhatsApp javascript-->
			<script type="text/javascript" src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/floating-wpp.min.js"></script>
			<script>
				$(function() {
				$('#WAButton').floatingWhatsApp({
					phone: '+525624033930', //WhatsApp Business phone number International format-
					//Get it with Toky at https://toky.co/en/features/whatsapp.
					headerTitle: '¡Habla con nuestros agentes en WhatsApp!', //Popup Title
					popupMessage: 'Hola, necesito más información.', //Popup Message
					showPopup: false, //Enables popup display
					buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', //Button Image
					size:"50px",
					//headerColor: 'crimson', //Custom header color
					//backgroundColor: 'crimson', //Custom background button color
					position: "right"    
				});
				});
			</script>
			<!--Div where the WhatsApp will be rendered-->
			<div id="WAButton"></div>
		</div>
			<div id="modalPropiedad" class="modal fade" role="dialog" aria-hidden="false">
  <div class="modal-dialog">

	<!-- Modal content Propiedades-->
	<div class="modal-content">
		  <span class="close-modal-1" data-dismiss="modal">×</span>
		  <div class="modal-body" style="text-align:center;">
			<div style="width:100%;height:35px;"></div>
			<span id="titulo-propiedad" class="nombre-propiedad-modal" style="font-family:'Raleway';font-size:14px;font-weight: 500">ENQUIRE</span>
			<div style="width:100%;height:30px;"></div>
			<input id="id-propiedad-modal" style="display:none;">
			<input class="input-modal-room" id="name_p" style="color:rgb(0,0,0);text-align:left;" placeholder="Nombre">
			<div style="width:100%;height:30px;"></div>
			<input class="input-modal-room" id="email_p" style="color:rgb(0,0,0);text-align:left;" placeholder="Email">
			<div style="width:100%;height:30px;"></div>
			<input class="input-modal-room" id="phone_p" style="color:rgb(0,0,0);text-align:left;" placeholder="Teléfono">
			<div style="width:100%;height:30px;"></div>
			<textarea class="input-modal-room" id="mensaje_p" style="color:rgb(0,0,0);text-align:left;height:145px;" placeholder="Mensaje"></textarea>
			<div style="width:100%;height:15px;"></div>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked="true" disabled="disabled" style="position:relative;top:3px; ">&nbsp;&nbsp;<span style="color:rgb(96,96,96);font-size:11px;font-family:'Questrial';">Acepto los términos de uso y </span></label> <a href="<?php echo base_url('privacidad');?>" style="color:rgb(87, 101, 161);;text-decoration: none;font-size:11px;font-family:'Questrial';"> aviso de privacidad.</a>
			</div>
			<div style="width:100%;height:15px;"></div>
			<button class="boton-enter-room btn" id="enviar-propiedad">ENVIAR</button>
			<div style="width:100%;height:25px;"></div>
		  </div>
		</div>
	
	  </div>
	</div>
	
	
	<div id="modalDesarrollo" class="modal fade" role="dialog" aria-hidden="false">
  <div class="modal-dialog">

	<!-- Modal content Propiedades-->
	<div class="modal-content">
		  <span class="close-modal-1" data-dismiss="modal">×</span>
		  <div class="modal-body" style="text-align:center;">
			<div style="width:100%;height:35px;"></div>
			<span id="titulo-desarrollo" class="nombre-desarrollo-modal" style="font-family:'Raleway';font-size:14px;font-weight: 500">ENQUIRE</span>
			<div style="width:100%;height:30px;"></div>
			<input id="id-desarrollo-modal" style="display:none;">
			<input class="input-modal-room" id="name_d" style="color:rgb(0,0,0);text-align:left;" placeholder="Nombre">
			<div style="width:100%;height:30px;"></div>
			<input class="input-modal-room" id="email_d" style="color:rgb(0,0,0);text-align:left;" placeholder="Email">
			<div style="width:100%;height:30px;"></div>
			<input class="input-modal-room" id="phone_d" style="color:rgb(0,0,0);text-align:left;" placeholder="Teléfono">
			<div style="width:100%;height:30px;"></div>
			<textarea class="input-modal-room" id="mensaje_d" style="color:rgb(0,0,0);text-align:left;height:145px;" placeholder="Mensaje"></textarea>
			<div style="width:100%;height:15px;"></div>
			<div class="checkbox">
				<label><input type="checkbox" value="" checked="true" disabled="disabled" style="position:relative;top:3px; ">&nbsp;&nbsp;<span style="color:rgb(96,96,96);font-size:11px;font-family:'Questrial';">Acepto los términos de uso y </span></label> <a href="<?php echo base_url('privacidad');?>" style="color:rgb(87, 101, 161);;text-decoration: none;font-size:11px;font-family:'Questrial';"> aviso de privacidad.</a>
			</div>
			<div style="width:100%;height:15px;"></div>
			<button class="boton-enter-room btn" id="enviar-desarrollo">ENVIAR</button>
			<div style="width:100%;height:25px;"></div>
		  </div>
		</div>
	
	  </div>
	</div>
		
	</body>
	<!-- ========== SCRIPTS GENERALES ========== -->
	<script src="<?php echo base_url();?>js/main.js"></script>
	<script src="<?php echo base_url();?>js/scripts.js"></script>
	<script>
		var $document = $(document),
		    $element = $('#header'),
		    $menu = $('#menu'),
		    $otro = $('.hamburger-inner'),
		    className = 'hasScrolled';
		    otraClase = 'ham2';
		    claseMenu = 'menu-2';
		
		$document.scroll(function() {
		  if ($document.scrollTop() >= 10) {
		    // user scrolled 50 pixels or more;
		    // do stuff
		    $element.addClass(className);
		    $otro.addClass(otraClase);
		    $menu.addClass(claseMenu);
		    $('#logo').attr("src", "<?php echo base_url('site-img/logo_head_black.svg');?>");
		  } else {
		    $element.removeClass(className);
		    $otro.removeClass(otraClase);
		    $menu.removeClass(claseMenu);
		    $('#logo').attr("src", "<?php echo base_url('site-img/logo_head.svg');?>");
		  }
		});

		$( ".hamburger" ).click(function() {
			$("#menu").toggleClass("hi");
		});
		$( "#menu" ).click(function() {
			$(this).toggleClass("hi");
			if ($('.hamburger').hasClass("cerrar")) {
				$('#myNav').css('height','0%');
				$('.hamburger').removeClass('cerrar');
				$('.hamburger').addClass('abrir');
				$('.hamburger').removeClass('is-active');
			}else{
				$('#myNav').css('height','100%');
				$('.hamburger').removeClass('abrir');
				$('.hamburger').addClass('is-active');
				$('.hamburger').addClass('cerrar');
			}
		});
		$("#enviar_inicio").click(function(){
	var nombre = $("#nombre").val();
	var correo = $("#correo").val();
	var celular = $("#celular").val();
	var mensaje = $("textarea#mensaje").val();

	if ($("#nombre").val() == ''){
		 	alert('Necesita proporcionar su nombre completo');
			return false;
		 }
	if ($("#correo").val() == ''){
		 	alert('Necesita proporcionar un correo electrónico');
			return false;
		 }
	if($("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1) {
            		alert('Proporcione un correo electrónico válido');
			return false;

        		}
    if ($("textarea#mensaje").val() == ''){
		 	alert('Necesita proporcionar un mensaje');
			return false;
		 }
		 
		 $.ajax({url:"<?php echo base_url();?>inicio/formulario",type:'POST',data:{nombre:nombre,correo:correo,celular:celular,mensaje:mensaje},success:function(result){

	 		if(result==1){
		 		$('.inputForm').val('');
	 			alert('Su mensaje ha sido enviado, en breve le contactaremos');
			}

		}});
	});
	
	$("#enviar_modal").click(function(){
	var nombre = $("#nombre_modal").val();
	var correo = $("#correo_modal").val();
	var celular = $("#celular_modal").val();
	var mensaje = $("textarea#mensaje_modal").val();

	if ($("#nombre_modal").val() == ''){
		 	alert('Necesita proporcionar su nombre completo');
			return false;
		 }
	if ($("#correo_modal").val() == ''){
		 	alert('Necesita proporcionar un correo electrónico');
			return false;
		 }
	if($("#correo_modal").val().indexOf('@', 0) == -1 || $("#correo_modal").val().indexOf('.', 0) == -1) {
            		alert('Proporcione un correo electrónico válido');
			return false;

        		}
    if ($("textarea#mensaje_modal").val() == ''){
		 	alert('Necesita proporcionar un mensaje');
			return false;
		 }
		 
		 $.ajax({url:"<?php echo base_url();?>inicio/formulario",type:'POST',data:{nombre:nombre,correo:correo,celular:celular,mensaje:mensaje},success:function(result){

	 		if(result==1){
		 		$('.inputForm').val('');
	 			alert('Su mensaje ha sido enviado, en breve le contactaremos');
			}

		}});
	});
	
	$( "#enviar-propiedad" ).click(function() {
		var email = $("#email_p").val();
		var name = $("#name_p").val();
		var phone = $("#phone_p").val();
		var mensaje = $("textarea#mensaje_p").val();
		var id = $("#id-propiedad-modal").val();
		if ($("#name_p").val() == ''){
		 	alert('Necesita proporcionar su nombre completo');
			return false;
		}
		if ($("#email_p").val() == ''){
		 	alert('Necesita proporcionar su correo electrónico');
			return false;
		}
		if($("#email_p").val().indexOf('@', 0) == -1 || $("#email_p").val().indexOf('.', 0) == -1) {
			alert('Dirección de correo electrónico inválida');
			return false;
		}
		$.ajax({
			url:"<?php echo base_url('propiedades/enquire');?>",
			type:'POST',
			data:{email:email,name:name,phone:phone,mensaje:mensaje,id:id},
			success:function(result){
				if(result.success){
					alert('¡Su mensaje ha sido enviado con éxito!');
					$('#modalPropiedad').modal('toggle');
				}
			}
		});
	});
	
	$( "#enviar-desarrollo" ).click(function() {
		var email = $("#email_d").val();
		var name = $("#name_d").val();
		var phone = $("#phone_d").val();
		var mensaje = $("textarea#mensaje_d").val();
		var id = $("#id-desarrollo-modal").val();
		if ($("#name_d").val() == ''){
		 	alert('Necesita proporcionar su nombre completo');
			return false;
		}
		if ($("#email_d").val() == ''){
		 	alert('Necesita proporcionar su correo electrónico');
			return false;
		}
		if($("#email_d").val().indexOf('@', 0) == -1 || $("#email_d").val().indexOf('.', 0) == -1) {
			alert('Dirección de correo electrónico inválida');
			return false;
		}
		$.ajax({
			url:"<?php echo base_url('desarrollos/enquire');?>",
			type:'POST',
			data:{email:email,name:name,phone:phone,mensaje:mensaje,id:id},
			success:function(result){
				if(result.success){
					alert('¡Su mensaje ha sido enviado con éxito!');
					$('#modalDesarrollo').modal('toggle');
				}
			}
		});
	});
	</script>
	</html>
