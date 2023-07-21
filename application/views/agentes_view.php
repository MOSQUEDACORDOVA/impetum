<!-- BOTON PARA AGREGAR -->
<div class="fixed-action-btn">
    <a id="alta-agente" class="btn-floating btn-large light-blue">
        <i class="large material-icons">add</i>
    </a>
</div>
<!-- BOTON -->

<h3 style="font-family: 'Maven Pro';">Agentes</h3>

<div class="col s12" id="container-agentes">
    <?php echo $agentes; ?>
</div>


<div id="modal-agente" class="modal">
    <div class="modal-content">
        <h3>Información del Agente</h3>
        <div class="row">
            <form class="col s12 pretty-form" id="form-agente" data-href="admin/insertar_agente">
                <fieldset>
                    <input type="hidden" name="id" id="id" />
                    <div class="row">
                        <div class="file-field input-field col s7">
                            <div class="btn light-blue">
                                <span>IMÁGEN DE PERFIL</span>
                                <input type="file" name="imagen" id="imagen" />
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Selecciona una imagen..." />
                            </div>
                        </div>
                        <div class="col s4 offset-s1" style="max-height:150px;max-width:200px;display:hidden;">
                            <img id="preview" />
                        </div>
                    </div>

                    <div class="input-field col s6">
                        <input id="nombre" name="nombre" type="text">
                        <label for="nombre">Nombre *</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <input id="ubicacion" name="ubicacion" type="text">
                        <label for="ubicacion">Ubicación</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <input id="email" name="email" type="text">
                        <label for="email">Email</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <input id="telefono" name="telefono" type="text">
                        <label for="telefono">Teléfono</label>
                    </div>
                    
                    <div class="input-field col s6">
                        <input id="ordenamiento" name="ordenamiento" type="text">
                        <label for="ordenamiento">Ordenamiento (Alfabético)</label>
                    </div>
                    
                    <div class="col s12 center-align" id="btn-insert">
                        <button class="btn waves-effect waves-light light-blue" type="submit" id="enviar-auto" style="margin-top: 20px;" href="admin/insertar_agente">Enviar
                            <i class="material-icons right">send</i>
                        </button>
                    </div>

                </fieldset>
            </form>
    </div>
</div>

<script>
    $( document ).ready(function(){
        
        
        $('.modal').modal();
        
        var formAgente = $('form-agente')[0];
        
        //forma
        $('#form-agente').ajaxForm({
            url: 'admin/insertar_agente',
            type: 'POST',
            dataType: 'json',
            success:function(data){
                var icon = (data.success) ?  'success' : 'error';
                var title = (data.success) ? 'Éxito' : 'Error';
                swal({type: icon, text: data.msg, title: title, timer: '2500'});
                cargarAgentes();
                if(data.success == true)
                    $('#modal-agente').modal('close');
            },
            beforeSubmit: function(arr, $form, options){
                options.url = $form.data('href');
            }
        });

        //Evento boton
        $('#alta-agente').click(function(e){
            e.preventDefault();
            $('#form-agente').data('href', 'admin/insertar_agente');
            $('#modal-agente').modal('open');
            $("#modal-agente").scrollTop(0);
            clearForm(formAgente);
            $('#form-agente #preview').hide();

        });



    }); //END READY

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

    function cargarAgentes(){
        $.ajax({
            url: 'admin/get_agentes/1',
            cache: false,
            success:function(data){
                $('#container-agentes').empty();
                $('#container-agentes').html(data.html);
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

    $("#form-agente #imagen").change(function() {
        $('#preview').show();
        readURL(this);
    });

    function eliminarAgente(id){
        swal({
            title: '¿Está seguro que desea eliminar este agente?',
            text: "Una vez borrado, no podrá revertise",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, lo quiero borrar!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: 'admin/eliminar_agente',
                    cache: false,
                    type: 'POST',
                    dataType: 'json',
                    data: {id: id},
                    success: function(data){
                        var type = (data.success) ? 'success' : 'error';
                        $('div[data-id="' + id + '"]').remove();
                        swal('Info',data.msg,type);
                    }
                })
            }
        })
    }

    function modificarAgente(id){
        clearForm($('#form-agente')[0]);
        $.ajax({
            url: 'admin/get_agente',
            cache: false,
            type: 'POST',
            dataType: 'json',
            data: {id: id},
            success: function(data){
                if(data.success == true){
                    $('#form-agente').data('href', 'admin/modificar_agente');
                    $('#modal-agente').modal('open');
                    $("#modal-agente").animate({ scrollTop: 0 }, "fast");
                    //$('select').material_select();
                    var agente = data.agente;
                    for(var key in agente){
                        $('#form-agente [name="' + key + '"]').val(agente[key]).trigger('change');
                    }
                    Materialize.updateTextFields();
                    $('#preview').attr('src', 'imagenes_agente/' + agente.imagen_portada);
                    $('#preview').show();

                }else{
                    swal({type: 'error', text: 'Ocurrió un error, intenta más tarde', title: 'Error'});
                }
            }
        });
    }

</script>
