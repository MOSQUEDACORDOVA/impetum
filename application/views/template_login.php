<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta Tags-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="<?php echo $titulo;?> | ">
    <title>
        <?php echo $titulo;?> | IMPETUM</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/login/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
    <link href="<?php echo base_url();?>resources/bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
</head>

<body>

    <?php $this->load->view($vista_contenido); ?>

</body>
<script type="text/javascript" src="<?php echo base_url();?>resources/jquery-3.2.1.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resources/login/js/index.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resources/notify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>resources/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
<script type='text/javascript'>
    $(document).keypress(function(e) {
        if (e.which == 13) {
            $('#login_go').click();
        }
    });

    // Login data send via AJAX POST
    $('#login_go').click(function() {

        if ($("#email").val().length < 1) {
            $("#login_go").notify(
                "Introduce tu mail", {
                    position: "top-center",
                    className: "error"
                }
            );
            return false;
        }
        if ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            $("#login_go").notify(
                "Introduce un mail válido", {
                    position: "top-center",
                    className: "error"
                }
            );
            return false;
        }
        if ($("#pass").val().length < 1) {
            $("#login_go").notify(
                "Introduce tu password", {
                    position: "top-center",
                    className: "error"
                }
            );
            return false;
        }
        var email = $("#email").val();
        var password = $("#pass").val();
        $.ajax({
            url: 'login/login_check',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(result) {

                if (result == 1) {
                    $("#login_go").notify(
                        "Usuario y/o Password incorrectos", {
                            position: "top-center",
                            className: "error"
                        }
                    );
                } else {
                    window.location = '<?php echo base_url();?>admin'
                }

            }
        });
    });
</script>

</html>
