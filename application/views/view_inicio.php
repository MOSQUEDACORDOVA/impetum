<div id="homeImage" style="text-align: center;">
	<!-- IMAGEN HOME DESKTOP -->
	<img class="hidden-xs" src="<?php echo base_url('site-img/Home.jpg');?>" style="width: 100%;" draggable="false">
	<img class="visible-xs" src="<?php echo base_url('site-img/Home_mov.jpg');?>" style="width: 100%;" draggable="false">
	<div class="tituloPrincipalHome">
		Mas de 20 años de<br class="visible-xs"> experiencia<br class="hidden-xs">
		inmobiliaria<br class="visible-xs"> en México
		<div style="width: 100%;height:35px;"></div>
		<a href="<?php echo base_url('propiedades');?>" class="btn" id="verPropiedades" style="line-height: 32px;">BUSCAR PROPIEDADES</a><div class="visible-xs" style="width: 100%;height: 30px;"></div><span class="hidden-xs">&nbsp;&nbsp;</span><a href="<?php echo base_url('desarrollos');?>" class="btn" style="line-height: 32px;" id="verDesarrollos">VER DESARROLLOS </a>
	</div>
</div>
<div class="formatoTitulosImpetum" style="padding-top:70px;padding-bottom: 50px;">
	<hr class="redRule">&nbsp;&nbsp;&nbsp;&nbsp;Propiedades&nbsp;&nbsp;&nbsp;&nbsp;<hr class="redRule">
</div>
<div class="contenedorPropiedades">
	<div class="row"  id="propiedades">
		
	</div>
	<div style="width: 100%;height: 10px;"></div>
	<a href="<?php echo base_url('propiedades');?>" style="text-decoration: none;"><button class="btn verTodas">VER TODAS LAS PROPIEDADES</button></a>
</div>
<div style="width: 100%;height: 40px;"></div>
<div class="formatoTitulosImpetum" style="padding-top:70px;padding-bottom: 50px;">
	<hr class="redRule">&nbsp;&nbsp;&nbsp;&nbsp;Desarrollos&nbsp;&nbsp;&nbsp;&nbsp;<hr class="redRule">
</div>
<div class="contenedorPropiedades">
	<div class="row"  id="desarrollos">
		
	</div>
	<div style="width: 100%;height: 10px;"></div>
	<a href="<?php echo base_url('desarrollos');?>" style="text-decoration: none;"><button class="btn verTodas">VER TODOS LOS DESARROLLOS</button></a>
</div>
<div style="width: 100%;height: 155px;"></div>
<script>
	// A $( document ).ready() block.
	$( document ).ready(function() {
		$.ajax({
			url:"inicio/show_propiedades",
			type:'POST',
			success:function(result){
	            $("#propiedades").html(result);
	        }
	    });
	    
	    $.ajax({
			url:"inicio/show_desarrollos",
			type:'POST',
			success:function(result){
	            $("#desarrollos").html(result);
	        }
	    });
	    
	    $('#modalDesarrollo').on('show.bs.modal', function (event) {
		  var titulo = $(event.relatedTarget).data('titulo');
		  var id = $(event.relatedTarget).data('id');
		  $('#titulo-desarrollo').text(titulo);
		  $('#id-desarrollo-modal').val(id);
		});
		
		$('#modalPropiedad').on('show.bs.modal', function (event) {
		  var titulo = $(event.relatedTarget).data('titulo');
		  var id = $(event.relatedTarget).data('id');
		  $('#titulo-propiedad').text(titulo);
		  $('#id-propiedad-modal').val(id);
		});
	});
	
	
	
</script>