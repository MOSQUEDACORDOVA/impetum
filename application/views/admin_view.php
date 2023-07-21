<html lang="es">
    <head>
	    <meta charset="utf-8" />
	    <link rel="icon" type="image/png" href="<?php echo base_url();?>dist/img/icon.png">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <title>Administrador | IMPETUM</title>
	    <!-- Google Fonts-->
		<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900|Montserrat:400,500,700|Muli:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert2@7.19.2/dist/sweetalert2.all.js"></script>
        <link rel="stylesheet" href="admin-dev/css/materialize.min.css">
        <link rel="stylesheet" href="admin-dev/css/admin.css">
        <script src="admin-dev/js/materialize.min.js"></script>
        <script src="admin-dev/js/jquery.form.min.js"></script>
        <script src="admin-dev/js/sortable.min.js"></script>
		<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=j7flxmz0e9bwzwn5rvrwplx5ozvmmkikqmrb39w3muuc515d"></script>

    </head>
    <body>
        <header>
            <nav class="grey darken-3">
                <div class="nav-wrapper" style="background: #c82325;">
                    <a href="#!" class="brand-logo" style="padding-left:15px;font-family: 'Muli';">Administrador</a>
                    <a class="white-text" href="login/logout" style="float:right;margin-right: 20px;">
                        <i class="material-icons small white-text">exit_to_app</i>
                    </a>
                    <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

                    <ul id="slide-out" class="side-nav fixed grey darken-3" style="font-family: 'Muli';">
                        <li>
                            <div class="logo-view">
                                <div class="background white valign-wrapper" style="height:130px">
                                    <img src="site-img/logo.svg" style="padding:10px" />
                                </div>
                            </div>
                        </li>
                        <li>
                            <a id="first" class="white-text" href="admin/propiedades">Propiedades
                                <i class="material-icons small white-text">home</i>
                            </a>
                        </li>
                        <li>
                            <a class="white-text" href="admin/desarrollos">Desarrollos
                                <i class="material-icons small white-text">house</i>
                            </a>
                        </li>
                        <li>
                            <a class="white-text" href="admin/agentes">Agentes
                                <i class="material-icons small white-text">contact_page</i>
                            </a>
                        </li>
                      

                    </ul>



                    <ul id="mobile-menu" class="side-nav grey darken-3">
                        <li>
                            <a class="white-text" href="admin/propiedades">Propiedades
                            <i class="material-icons small white-text">home</i></a>
                        </li>
                        <li>
                            <a class="white-text" href="admin/desarrollos">Desarrollos
                            <i class="material-icons small white-text">house</i></a>
                        </li>
                        <li>
                            <a class="white-text" href="admin/agentes">Agentes
                            <i class="material-icons small white-text">contact_page</i></a>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col s12" id="content"></div>
                </div>
            </div>
        </main>
    </body>

    <script>
    $(document).ready(function(){
        $(".button-collapse").sideNav({closeOnClick: true});
        $('#slide-out li a, #mobile-menu li a').click(function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                success:function(data){
                    $('#content').html(data);
                }
            })

        })
        $('#first').click();

    });
    </script>
</html>
