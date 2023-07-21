<div class="hidden-xs" style="width: 100%;height: 85px;"></div>
<div class="visible-xs" style="width: 100%;height: 72px;"></div>
<div class="contenedorPropiedades">
	<div class="formatoTitulosImpetum" style="padding-top:35px;padding-bottom: 55px;font-size: 16px;text-align: left;">
		<hr class="redRule" style="width: 40px;">&nbsp;&nbsp;&nbsp;&nbsp;Agentes
		<span class="buscadorRight"><input type="text" class="input-custom form-control" id="buscador" placeholder="Buscar" style="border: none !important;"> <span class="lupa">&#xF002;</span></span>
	</div>
	<div id="agentes">
		
	</div>
</div>	 
<div class="hidden-xs" style="width: 100%;height: 220px;"></div>
<div class="visible-xs" style="width: 100%;height: 110px;"></div>   
<div style="width:100%;text-align:center;padding-left: 20px;padding-right: 20px;">
	<span class="trabajaConNostros">Trabaja con nosotros</span>
	<div style="width: 100%;height: 30px;"></div>
	<div class="trabajaTexto">
		Para información sobre oportunidades laborales, por favor envía tu CV<br> así como una carta de interés a la dirección:
	</div>
	<div style="width: 100%;height: 30px;"></div>
	<a href="mailto:info@impetum.mx" style="font-weight: normal;font-size: 16px;color: black;" class="trabajaConNostros">info@impetum.mx</a>
	<div style="width: 100%;height: 50px;"></div>
	<a href="<?php echo base_url('privacidad');?>" style="font-family: 'Questrial';font-size: 13px;color: rgb(160, 160, 160);">Aviso de Privacidad</a>
</div>  
<div class="hidden-xs" style="width: 100%;height: 220px;"></div>
<div class="visible-xs" style="width: 100%;height: 110px;"></div>        
<script>
	// A $( document ).ready() block.
	$( document ).ready(function() {
		$.ajax({
			url:"agentes/show_agentes",
			type:'POST',
			success:function(result){
	            $("#agentes").html(result);
	        }
	    });
	});
	
	$("#buscador").on('keyup', function (e) {
        if ($("#buscador").val() == '') {
	    	$.ajax({
				url:"agentes/show_agentes",
				type:'POST',
				success:function(result){
		            $("#agentes").html(result);
		        }
		    });
	    }else{
            $.ajax({
                url: 'agentes/busqueda_agentes',
                cache: false,
                type: 'POST',
                data: {search: $(this).val()},
                success:function(data){
                    $('#agentes').html(data);
                }
            })
        }
    });
	
	
</script>