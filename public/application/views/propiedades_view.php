<div class="col s12 m6">
<h3 style="font-family: 'Maven Pro';">Propiedades</h3>
</div>
<div class="input-field col s12 m6">
    <i class="material-icons prefix">search</i>
    <input id="search" name="search" type="text" >
    <label for="search">Buscar (Solamente por Nombre de propiedad)</label>
</div>
<div class="fixed-action-btn">
    <a id="alta-propiedad" class="btn-floating btn-large light-blue">
        <i class="large material-icons">add</i>
    </a>
</div>
<div class="col s12">
    <ul class="collection" id="catalogo-propiedades">
        <?php echo $propiedades; ?>
    </ul>
</div>

<div class="col s12" id="container-busqueda" style="display:none">
    <a class="waves-effect waves-light btn" id="regresar"><i class="material-icons left">arrow_back</i>Regresar</a>
    <ul class="collection" id="busqueda-autos">
    </ul>
</div>

<div id="modal-propiedad" class="modal">
    <div class="modal-content">
        <h3>Información de la propiedad</h3>
        <div class="row">
            <form class="col s12 pretty-form" id="form-propiedad" data-href="admin/insertar_propiedad">
                <fieldset>
                <input type="hidden" name="id" id="id" />
                <div class="row valign-wrapper">
                    <div class="file-field input-field col s7">
                        <div class="btn light-blue">
                            <span>IMAGEN (900 x 600 px)</span>
                            <input type="file" name="imagen" id="imagen" />
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Selecciona una imagen..." />
                        </div>
                    </div>
                    <div class="col s4 offset-s1" style="max-height:150px;">
                        <img id="preview" />
                    </div>
                </div>
                    <div class="input-field col s6">
                        <input id="nombre_propiedad" name="nombre_propiedad" type="text">
                        <label for="nombre_propiedad">Nombre propiedad *</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="tipo">
	                        <option value="" selected="selected">Escoger una opcion...</option>
	                        <option value="0">No Disponible</option>
	                        <option value="1">Preventa</option>
	                        <option value="2">Vendido</option>
	                        <option value="3">En Renta</option>
	                        <option value="4">En Venta</option>
	                        <option value="5">En Renta & Venta</option>
                        </select>
                        <label for="marca">Tipo de propiedad *</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="ubicacion" name="ubicacion" type="text">
                        <label for="ubicacion">Ubicación *</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="precio" name="precio" type="text">
                        <label for="precio">Precio Ej: $2,000,000 MN</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="precio_filtro" name="precio_filtro" type="text">
                        <label for="precio_filtro">Precio (Para filtrar sin $ y sin comas)</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="url_pdf" name="url_pdf" type="text">
                        <label for="url_pdf">Url PDF</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="url_video" name="url_video" type="text">
                        <label for="url_video">Url Video</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="url_360" name="url_360" type="text">
                        <label for="url_360">Url 360</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="url_maps" name="url_maps" type="text">
                        <label for="url_maps">Url Google Maps</label>
                    </div>
                    <div class="input-field col s6">
                        <select name="estado">
                            <option value="" selected="selected">Seleccione estado...</option>
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
                        <label for="disponibilidad">Estado Ubicación (filtro)</label>
                    </div>
                    <div class="input-field col s12">
	                    <h6 style="    color: #9e9e9e;">Descripción intro</h6>
                        <textarea id="descripcion_intro" name="descripcion_intro"  />

                    </div>
                    <div class="input-field col s12">
	                    <h6 style="    color: #9e9e9e;">Información</h6>
                        <textarea id="informacion" name="informacion"  />

                    </div>
                    <div class="input-field col s12">
	                    <h6 style="    color: #9e9e9e;">Información secundaria</h6>
                        <textarea id="informacion_secundaria" name="informacion_secundaria"  />

                    </div>
                    <div class="col s12 center-align" id="btn-insert">
                        <button class="btn waves-effect waves-light light-blue" type="submit" id="enviar-propiedad" href="admin/insertar_propiedad" style="margin-top: 20px;">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                <!-- </div> -->
            </fieldset>
            </form>
        </div>
    </div>
</div>

<div id="modal-imagenes" class="modal">
    <div class="modal-content">
        <h3>Galería de la Propiedad</h3>
        <div class="row">
            <form id="form-galeria">
                <input type="hidden" id="id_propiedad" name="id_propiedad" />
                <div class="file-field input-field col s8">
                    <div class="btn light-blue">
                        <span>IMAGENES</span>
                        <input type="file" name="galeria[]" id="galeria" multiple />
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Seleccionar más imagenes..." />
                    </div>
                </div>
                <div class="col s4">
                    <button class="btn-large waves-effect waves-light light-green" type="submit" href="admin/insertar_propiedad">Subir
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="row" id="imagen-progress" style="display:none">
            <div class="custom-progress col s6 offset-s3">
                <div class="bar"></div>
                <div class="percent">0%</div>
            </div>
        </div>
        <div class="row">
            <ul class="list-inline col s12" id="list-galeria">
            </ul>
        </div>
    </div>
</div>

<script>
    var auto;
    var edES, edEN, sortablePropiedades, sortableGaleria;

    $( document ).ready(function(){
	    tinyMCE.remove();
        $('.modal').modal();
        //Descripción intro
        tinymce.init({ selector:'#descripcion_intro',invalid_elements: "span",extended_valid_elements : "span[!class]",plugins: [
            "code", "charmap", "link", "image"
            ],
            toolbar: [
                "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | charmap code"
            ] });
        //Información
        tinymce.init({ selector:'#informacion',invalid_elements: "span",extended_valid_elements : "span[!class]",plugins: [
            "code", "charmap", "link", "image"
            ],
            toolbar: [
                "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | charmap code"
            ] });
        //Información secundaria
        tinymce.init({ selector:'#informacion_secundaria',invalid_elements: "span",extended_valid_elements : "span[!class]",plugins: [
            "code", "charmap", "link", "image"
            ],
            toolbar: [
                "undo redo | styleselect | bold italic | link image | alignleft aligncenter alignright | charmap code"
            ] });
            
            
        var formAuto = $('form-propiedad')[0];

		var el = document.getElementById('catalogo-propiedades');
        var opts = {
            draggable: ".custom-item",
            group: "name",
            onEnd: function(evt){
                itemEl = evt.item;  // dragged HTMLElement
                var posOld = evt.oldIndex+1;
                var posNew = evt.newIndex+1;
                if(posOld != posNew){
                    var order = sortablePropiedades.toArray();
                    order = JSON.stringify(order);
                    $.ajax({
                        url: 'admin/actualizar_prioridad_propiedad',
                        data: {posiciones: order},
                        type: 'POST',
                        cache: false,
                        success:function(data){
                            if(data.success == false){
                                swal({type: 'error', text: 'No se pudo actualizar la prioridad',
                                title: 'Error', timer: '2500'})
                            }
                        }
                    });
                }
            }
        };
		
		sortablePropiedades = Sortable.create(el, opts);
		

		
		var el = document.getElementById('list-galeria');
        var opts = {
            draggable: ".item",
            group: "name",
            filter: '.js-remove',
            onEnd: function(evt){
                itemEl = evt.item;  // dragged HTMLElement
                var posOld = evt.oldIndex+1;
                var posNew = evt.newIndex+1;
                if(posOld != posNew){
                    var order = sortableGaleria.toArray();
                    order = JSON.stringify(order);
                    $.ajax({
                        url: 'admin/actualizar_prioridad_imagen',
                        data: {posiciones: order},
                        type: 'POST',
                        cache: false,
                        success:function(data){
                            if(data.success == false){
                                swal({type: 'error', text: 'No se pudo actualizar la prioridad',
                                title: 'Error', timer: '2500'})
                            }
                        }
                    });
                }
            },
            onFilter: function (evt) {
                var el = sortableGaleria.closest(evt.item); // get dragged item
                var idImagen = el.dataset.id_imagen;
                el && el.parentNode.removeChild(el);
                $.ajax({
                    url: 'admin/eliminar_foto',
                    type: 'POST',
                    data: {id_imagen: idImagen},
                    cache: false,
                    success:function(data){

                    }
                });
            }
        };
		
		sortableGaleria = Sortable.create(el, opts);

        $('#form-propiedad').ajaxForm({
            url: 'admin/insertar_propiedad',
            type: 'POST',
            dataType: 'json',
            success:function(data){
                var icon = (data.success) ?  'success' : 'error';
                var title = (data.success) ? 'Éxito' : 'Error';
                swal({type: icon, text: data.msg, title: title, timer: '2500'});
                cargarCatalogo();
                if(data.success == true)
                    $('#modal-propiedad').modal('close');
            },
            beforeSubmit: function(arr, $form, options){
                options.url = $form.data('href');
            }
        });
        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('#form-galeria').ajaxForm({
            url: 'admin/subir_galeria',
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                $('imagen-progress').show();
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal)
                percent.html(percentVal);
            },
            success:function(data){
                var icon = (data.success) ?  'success' : 'error';
                var title = (data.success) ? 'Éxito' : 'Error';
                var texto = '';
                for(var i in data.imagenes){
                    var exito = (data.imagenes[i].success) ? 'Bien' : 'ERROR';
                    texto += data.imagenes[i].imagen + ':' + exito + ' ' + data.imagenes[i].error + '\r\n';
                }
                swal({type: icon, text: texto, title: title}).then( (result) => {
                    var idAuto = $('#form-galeria #id_propiedad').val()
                    getGaleria(idAuto);
                    clearForm($('#form-galeria'));
                });
            },
            complete: function(data){
                $('imagen-progress').hide();
            }
        });

        $('#alta-propiedad').click(function(e){
            e.preventDefault();
            $('#form-propiedad').data('href', 'admin/insertar_propiedad');
            $('#modal-propiedad').modal('open');
            $("#modal-propiedad").scrollTop(0);
            clearForm(formAuto);
            $('select').material_select();
            $('#preview').hide();
            tinymce.get('descripcion_intro').setContent('');
            tinymce.get('informacion').setContent('');
            tinymce.get('informacion_secundaria').setContent('');
        });

        $("#search").on('keyup', function (e) {
            if (e.keyCode == 13) {
                $.ajax({
                    url: 'admin/busqueda_propiedades',
                    cache: false,
                    type: 'POST',
                    data: {search: $(this).val()},
                    success:function(data){
                        if(data.success == true){
                            $('#catalogo-propiedades').css('display', 'none');
                            $('#container-busqueda').css('display', 'block');
                            $('#busqueda-autos').empty();
                            $('#busqueda-autos').html(data.html);
                        }else{
                            swal('Error', data.msg, 'error');
                        }
                    }
                })
            }
        });

        $('#regresar').click(function(e){
            e.preventDefault();
            $('#search').val('');
            $('#catalogo-propiedades').css('display', 'block');
            $('#container-busqueda').css('display', 'none');
        });



    }); //Document ready

    function clearForm(form) {
        $(':input', form).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase(); // normalize case
            if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number' || type== 'hidden')
                this.value = "";
            if (type == 'file'){
                this.value = null;
            }
            else if (type == 'checkbox' || type == 'radio'){
                $(this).prop('checked', false);
                $(this).removeAttr('checked');
            }
            else if (tag == 'select'){
                this.selectedIndex = -1;
                $(this).trigger('change');
            }
        });
    }

    function editarPropiedad(idPropiedad){
        $('#form-propiedad').data('href', 'admin/actualizar_propiedad');
        clearForm($('#form-propiedad')[0]);
        $.ajax({
            url: 'admin/get_propiedad',
            cache: false,
            type: 'POST',
            dataType: 'json',
            data: {id_propiedad: idPropiedad},
            success: function(data){
                if(data.success == true){
                    $('#form-propiedad').data('href', 'admin/actualizar_propiedad');
                    $('#modal-propiedad').modal('open');
                    $("#modal-propiedad").animate({ scrollTop: 0 }, "fast");
                    //$('select').material_select();
                    var propiedad = data.propiedad;
                    for(var key in propiedad){
                        $('#form-propiedad [name="' + key + '"]').val(propiedad[key]).trigger('change');
                    }
                    $('select').material_select();
                    Materialize.updateTextFields();
                    $('#preview').attr('src', 'imagenes_propiedad/' + propiedad.id + '/' + propiedad.imagen_portada);
                    $('#preview').show();
					tinymce.get('descripcion_intro').setContent(data.propiedad.descripcion_intro);
					tinymce.get('informacion').setContent(data.propiedad.informacion);
                    tinymce.get('informacion_secundaria').setContent(data.propiedad.informacion_secundaria);
                }else{
                    swal({type: 'error', text: 'Ocurrió un error, intenta más tarde', title: 'Error'});
                }
            }

        });
    }

    function cargarCatalogo(){
        $.ajax({
            url: 'admin/get_catalogo_propiedades/1',
            cache: false,
            success:function(data){
                $('#catalogo-propiedades').empty();
                $('#catalogo-propiedades').html(data.html);
            }
        })
    }

    function subirGaleria(idAuto){
        $('#modal-imagenes').modal('open');
        $('#galeria').val('');
        clearForm('#form-galeria');
        $('#form-galeria #id_propiedad').val(idAuto);
        getGaleria(idAuto);
    }

    function getGaleria(idAuto){
        $.ajax({
            url: 'admin/get_galeria_propiedad',
            cache: false,
            type: 'POST',
            dataType: 'json',
            data: {id_propiedad: idAuto},
            success: function(data){
                $('#list-galeria').html('');
                $('#list-galeria').html(data.html);
            }
        })
    }

    function eliminarPropiedad(idPropiedad){
        console.log();
        swal({
            title: '¿Está seguro que desea eliminar la propiedad?',
            text: "Una vez borrada, no podrá revertise",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, la quiero borrar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'admin/eliminar_propiedad',
                    cache: false,
                    type: 'POST',
                    dataType: 'json',
                    data: {id_propiedad: idPropiedad},
                    success: function(data){
                        var type = (data.success) ? 'success' : 'error';
                        $('li[data-id_propiedad="' + idPropiedad + '"]').remove();
                        swal('Info',data.msg,type);
                    }
                })
            }
        })

    }

    //Para leer la imagen y pintarla en el recuadro
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imagen").change(function() {
        $('#preview').show();
        readURL(this);
    });

</script>
