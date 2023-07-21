<!-- Photoswipe CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/default-skin/default-skin.min.css">
<!-- PhotoSwipe JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.1/photoswipe-ui-default.min.js"></script>

<div class="hidden-xs" style="width: 100%;height: 85px;"></div>
<div class="visible-xs" style="width: 100%;height: 72px;"></div>
<div class="contenedorPropiedades">
	<div class="formatoTitulosImpetum" style="padding-top:35px;padding-bottom: 0px;font-size: 16px;text-align: left;">
		<hr class="redRule" style="width: 40px;">&nbsp;&nbsp;&nbsp;&nbsp;<?=$nombre_propiedad;?>
		<span class="hidden-xs" style="float: right;top:17px;position: relative;"><span class="estado_propiedad"><?=$estatus;?>&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('site-img/'.$icono.'');?>" style="width: 22px;position: relative;top:5px;"></span></span>
	</div>
	<div class="hidden-xs" style="width: 100%;height: 20px;"></div>
	<div class="visible-xs" style="width: 100%;height: 30px;"></div>
	<span class="precio_detalle">PRECIO:</span>&nbsp;&nbsp;&nbsp;<span class="precio_detalle_cantidad"><?=$precio;?></span><span class="visible-xs" style="float:right;"><a href="javascript:history.go(-1)"><img src="<?php echo base_url('site-img/logout.png');?>" style="width: 16px;position: relative;top:0px;"></a></span>
	<div style="width: 100%;height: 20px;"></div>
	<span class="precio_detalle"><?=$ubicacion;?></span> <span class="hidden-xs" style="float:right;position: relative;top:-10px;"><a href="javascript:history.go(-1)" class="precio_detalle" style="color: rgb(132,132,132);text-decoration: none;">volver&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('site-img/logout.png');?>" style="width: 16px;position: relative;top:3px;"></a></span>
	<div style="width: 100%;height: 35px;"></div>

	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
			<div style="position: relative;">
				<img class="abrir-galeria" src="<?=base_url('imagenes_propiedad/'.$id.'/'.$portada.'');?>" style="width: 100%;cursor: pointer;">
				<button id="gallery-1" class="btn video-360 hidden-xs abrir-galeria" style="color:rgb(217, 39, 65)!important;position: absolute;bottom: 5;right: 25;"><img src="<?=base_url('site-img/camera-back.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;FOTOS</button>
			</div>
			<div class="visible-xs" style="width: 100%;height: 25px;"></div>
			<button class="btn solicitar-informes visible-xs" data-toggle="modal" data-target="#modalPropiedad" data-titulo="<?=$nombre_propiedad;?>" data-id="<?=$id;?>">SOLICITAR INFORMES</button>
			<div class="hidden-xs" style="width: 100%;height: 40px;"></div>
			<div class="textos-generales-propiedad hidden-xs">
				<?=$informacion_secundaria;?>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
			<button class="btn solicitar-informes hidden-xs" data-toggle="modal" data-target="#modalPropiedad" data-titulo="<?=$nombre_propiedad;?>" data-id="<?=$id;?>">SOLICITAR INFORMES</button>
			<div style="width: 100%;height: 20px;"></div>
			<div class="textos-detalle-propiedad">
				<?=$informacion;?>
			</div>
			<div class="visible-xs" style="width: 100%;height:40px;"></div>
			<button class="btn video-360 visible-xs abrir-galeria" style="color:rgb(217, 39, 65)!important;"><img src="<?=base_url('site-img/camera-back.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;FOTOS</button>
			<div class="visible-xs" style="width: 100%;height: 30px;"></div>
			<a href="<?=$url_video;?>" target="_blank" class="btn video-360 visible-xs videos-links"><img src="<?=base_url('site-img/video.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;VIDEO</a>
			<div class="visible-xs videos-links" style="width: 100%;height: 30px;"></div>
			<a href="<?=$url_pdf;?>" target="_blank" class="btn video-360 visible-xs pdf-links"><img src="<?=base_url('site-img/pdf.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;PDF</a>
			<div class="visible-xs pdf-links" style="width: 100%;height: 30px;"></div>
			<a href="<?=$url_maps;?>" target="_blank" class="btn video-360 visible-xs map-links"><img src="<?=base_url('site-img/map-location.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;MAPA</a>
			<div class="visible-xs map-links" style="width: 100%;height: 30px;"></div>
			<a href="<?=$url_360;?>" target="_blank" class="btn video-360 visible-xs tres-links"><img src="<?=base_url('site-img/360.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;360°</a>
			<div class="visible-xs" style="width: 100%;height: 40px;"></div>
			<div class="textos-generales-propiedad visible-xs">
				<?=$informacion_secundaria;?>
			</div>
			<div class="visible-xs" style="width: 100%;height: 40px;"></div>
			<div style="width: 100%;height: 20px;"></div>
			<button class="btn solicitar-informes visible-xs" data-toggle="modal" data-target="#modalPropiedad" data-titulo="<?=$nombre_propiedad;?>" data-id="<?=$id;?>">SOLICITAR INFORMES</button>
			<a href="<?=$url_video;?>" target="_blank" class="btn video-360 hidden-xs videos-links"><img src="<?=base_url('site-img/video.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;VIDEO</a><span class="videos-links">&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="<?=$url_pdf;?>" target="_blank" class="btn video-360 hidden-xs pdf-links"><img src="<?=base_url('site-img/pdf.svg');?>" width="22" style="position:relative;top:5px;"><span class="pdf-links">&nbsp;&nbsp;&nbsp;&nbsp;</span>PDF</a><span class="tres-links">&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="<?=$url_360;?>" target="_blank" class="btn video-360 hidden-xs tres-links"><img src="<?=base_url('site-img/360.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;360°</a><span class="map-links">&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="<?=$url_maps;?>" target="_blank" class="btn video-360 hidden-xs map-links"><img src="<?=base_url('site-img/map-location.svg');?>" width="22" style="position:relative;top:5px;">&nbsp;&nbsp;&nbsp;MAPA</a>
			<div class="hidden-xs" style="width: 100%;height: 70px;"></div>
			<div class="visible-xs" style="width: 100%;height: 40px;"></div>
			<hr class="redRule" style="width: 40px;position: relative;top:12px;">&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-family: 'Questrial';font-size: 14px;color:rgb(149, 149, 149); font-weight: normal;position: relative;top:-5px;">Síguenos en redes sociales</span>&nbsp;&nbsp;&nbsp;<a href="https://www.instagram.com/impetum.mx/" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/instagram.svg');?>" width="22"></a>&nbsp;&nbsp;&nbsp;<a href="https://www.facebook.com/impetum.com.mx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/facebook.svg');?>" width="22"></a>&nbsp;&nbsp;&nbsp;<a href="https://twitter.com/ImpetumMx" target="_blank" style="display: inline;"><img src="<?php echo base_url('site-img/twitter.svg');?>" width="22"></a>
		</div>
	</div>
</div>	 

<div class="hidden-xs" style="width: 100%;height: 220px;"></div>
<div class="visible-xs" style="width: 100%;height: 110px;"></div>   

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <div class="pswp__container">
            <!-- don't modify these 3 pswp__item elements, data is added later on -->
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>
<script>
		// A $( document ).ready() block.
	$( document ).ready(function() {
		var video = '<?=$url_video;?>';
		var tres = '<?=$url_360;?>';
		var pdf = '<?=$url_pdf;?>';
		var map = '<?=$url_maps;?>';
		
		if(video == ''){
			$('.videos-links').remove();
		}
		
		if(tres == ''){
			$('.tres-links').remove();
		}
		
		if(pdf == ''){
			$('.pdf-links').remove();
		}
		
		if(map == ''){
			$('.map-links').remove();
		}
		$('#modalPropiedad').on('show.bs.modal', function (event) {
		  var titulo = $(event.relatedTarget).data('titulo');
		  var id = $(event.relatedTarget).data('id');
		  $('#titulo-propiedad').text(titulo);
		  $('#id-propiedad-modal').val(id);
		});
		
	    $( ".abrir-galeria" ).click(function() {
		    
		    $.ajax({
				url:"<?php echo base_url().'propiedades/get_propiedades'; ?>",
				type:'POST',
				data:{id:<?php echo $id;?>},
				success:function(result){
					console.log(result.propiedades);
				
					var openPhotoSwipe = function() {
					    var pswpElement = document.querySelectorAll('.pswp')[0];
					
					    // build items array
					    var items = 
					        result.propiedades
					    ;
					    
					    // define options (if needed)
					    var options = {
					             // history & focus options are disabled on CodePen        
					        history: false,
					        focus: false,
					
					        showAnimationDuration: 0,
					        hideAnimationDuration: 0,
					        
					        shareButtons: [
							    {id:'facebook', label:'Share on Facebook', url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'},
							    {id:'twitter', label:'Tweet', url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
							    {id:'pinterest', label:'Pin it', url:'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'},
							    {id:'download', label:'Download image', url:'{{raw_image_url}}', download:true}
							]
					        
					    };
					    
					    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
					    gallery.init();
					};
				
					openPhotoSwipe();
			    }
		    });
	    
		    
	    });
		
	});
	
	
	
</script>