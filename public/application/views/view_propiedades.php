<div class="hidden-xs" style="width: 100%;height: 85px;"></div>
<div class="visible-xs" style="width: 100%;height: 72px;"></div>
<div class="contenedorPropiedades">
	<div class="formatoTitulosImpetum" style="padding-top:35px;padding-bottom: 55px;font-size: 16px;text-align: left;">
		<hr class="redRule" style="width: 40px;">&nbsp;&nbsp;&nbsp;&nbsp;Propiedades
	<span class="buscadorRight"><input type="text" class="input-custom form-control" id="buscador" placeholder="Buscar" style="border: none !important;"> <span class="lupa">&#xF002;</span></span>
	  	
	</div>
	<div id="ver-filtros-m" class="filtros visible-xs">
		<img src="<?php echo base_url('site-img/filter.svg');?>" width="16" style="position:relative;top:3px;">&nbsp;&nbsp;&nbsp;<span>VER FILTROS</span>
	</div>
	<div id="filtros-desktop" class="filtros hidden-xs">
		FILTRAR POR:&nbsp;&nbsp;&nbsp;&nbsp;<span id="todas" onclick="filtros('todas')">VER TODAS</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<span id="venta" onclick="filtros('venta')">EN VENTA</span>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<span id="renta" onclick="filtros('renta')">EN RENTA</span>
		
		<div class="div-filtros" style="float: right;position: relative;top:-10px;">
			<select id="filtro-estado" class="form-control" style="width: 160px;display: inline;" onchange="filtro_select()">
				<option value="">Ver por estado</option>
				<option value="Aguascalientes">Aguascalientes</option>
			    <option value="Baja California">Baja California</option>
			    <option value="Baja California Sur">Baja California Sur</option>
			    <option value="Campeche">Campeche</option>
			    <option value="Chiapas">Chiapas</option>
			    <option value="Chihuahua">Chihuahua</option>
			    <option value="CDMX">Ciudad de México</option>
			    <option value="Coahuila">Coahuila</option>
			    <option value="Colima">Colima</option>
			    <option value="Durango">Durango</option>
			    <option value="Estado de México">Estado de México</option>
			    <option value="Guanajuato">Guanajuato</option>
			    <option value="Guerrero">Guerrero</option>
			    <option value="Hidalgo">Hidalgo</option>
			    <option value="Jalisco">Jalisco</option>
			    <option value="Michoacán">Michoacán</option>
			    <option value="Morelos">Morelos</option>
			    <option value="Nayarit">Nayarit</option>
			    <option value="Nuevo León">Nuevo León</option>
			    <option value="Oaxaca">Oaxaca</option>
			    <option value="Puebla">Puebla</option>
			    <option value="Querétaro">Querétaro</option>
			    <option value="Quintana Roo">Quintana Roo</option>
			    <option value="San Luis Potosí">San Luis Potosí</option>
			    <option value="Sinaloa">Sinaloa</option>
			    <option value="Sonora">Sonora</option>
			    <option value="Tabasco">Tabasco</option>
			    <option value="Tamaulipas">Tamaulipas</option>
			    <option value="Tlaxcala">Tlaxcala</option>
			    <option value="Veracruz">Veracruz</option>
				<option value="Yucatán">Yucatán</option>
			    <option value="Zacatecas">Zacatecas</option>
			</select>
			&nbsp;&nbsp;
			<select id="filtro-precio" class="form-control" style="width: 160px;display: inline;" onchange="filtro_select()">
				<option value="">Ordenar por</option>
				<option value="1">Precio menor</option>
			    <option value="2">Precio mayor</option>
			</select>
		</div>
	</div>
	
</div>	 

<div class="contenedorPropiedades">
	<div class="row"  id="propiedades">
		
	</div>
</div>
<div class="hidden-xs" style="width: 100%;height: 220px;"></div>
<div class="visible-xs" style="width: 100%;height: 110px;"></div>   
    
<script>
	var tipo;
	// A $( document ).ready() block.
	$( document ).ready(function() {
		$('#todas').click();
		$.ajax({
			url:"propiedades/show_propiedades",
			type:'POST',
			success:function(result){
	            $("#propiedades").html(result);
	        }
	    });
	    
	    $('#modalPropiedad').on('show.bs.modal', function (event) {
		  var titulo = $(event.relatedTarget).data('titulo');
		  var id = $(event.relatedTarget).data('id');
		  console.log(123);
		  $('#titulo-propiedad').text(titulo);
		  $('#id-propiedad-modal').val(id);
		});
	});
	
	$("#buscador").on('keyup', function (e) {
        if ($("#buscador").val() == '') {
	    	$.ajax({
				url:"propiedades/show_propiedades",
				type:'POST',
				success:function(result){
		            $("#propiedades").html(result);
		        }
		    });
	    }else{
            $.ajax({
                url: 'propiedades/busqueda_propiedades',
                cache: false,
                type: 'POST',
                data: {search: $(this).val()},
                success:function(data){
                    $('#propiedades').html(data);
                }
            })
        }
    });
	
	function filtros(filtro){
		$("#filtro-estado").val($("#filtro-estado option:first").val());
		$("#filtro-precio").val($("#filtro-precio option:first").val());
		$('.filtros span').removeClass('filtro-activo');
		$('#'+filtro).addClass('filtro-activo');
		
		switch(filtro) {
		  case 'todas':
		    // code block
		    $.ajax({
				url:"propiedades/show_propiedades",
				type:'POST',
				success:function(result){
		            $("#propiedades").html(result);
		        }
		    });
		    tipo = filtro;
		    break;
		  case 'venta':
		    // code block
		    $.ajax({
				url:"propiedades/show_propiedades_filtro",
				data:{tipo:'4 or tipo = 1 or tipo = 5'},
				type:'POST',
				success:function(result){
		            $("#propiedades").html(result);
		        }
		    });
		    tipo = 4;
		    break;
		  case 'renta':
		    // code block
		    $.ajax({
				url:"propiedades/show_propiedades_filtro",
				type:'POST',
				data:{tipo:'3 or tipo = 5'},
				success:function(result){
		            $("#propiedades").html(result);
		        }
		    });
		    tipo = 3;
		    break;
		  default:
		    // code block
		}
		
		
	}
	
	function filtro_select(){
		var estado = $('#filtro-estado').val();
		var precio = $('#filtro-precio').val();
		$.ajax({
			url:"propiedades/show_propiedades_filtros",
			type:'POST',
			data:{tipo:tipo,estado:estado,precio:precio},
			success:function(result){
	            $("#propiedades").html(result);
	        }
	    });
	}
	
	$( "#ver-filtros-m" ).click(function() {
		var texto = $("#ver-filtros-m span").text() == 'VER FILTROS' ? "OCULTAR FILTROS" : "VER FILTROS";
		$("#ver-filtros-m span").text(texto);
		$('#filtros-desktop').toggleClass('hidden-xs');
	});


	
	$(".modalPropiedadButtom").on('click', function (e) {
			console.log(123);
	});
</script>