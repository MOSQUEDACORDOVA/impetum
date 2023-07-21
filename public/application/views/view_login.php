<div id="form">
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-md-8">
            <div id="userform">
                <div class="tab-content">

                    <div class="tab-pane fade active in" id="login">
                        <div style="width:100%;text-align:center;"><img src="<?php echo base_url();?>site-img/logo.svg" style="max-width:80%;margin:auto;"></div>
                        <div id="login">
                            <div class="form-group" style="color:#000;">
                                Introduzca sus credenciales de acceso
                            </div>
                            <div class="form-group">
                                <label>Correo electrónico<span class="req">*</span> </label>
                                <input type="email" class="form-control" id="email" required data-validation-required-message="Por favor introduzca su correo electrónico" autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <label> Password<span class="req">*</span> </label>
                                <input type="password" class="form-control" id="pass" autocomplete="off">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="mrgn-30-top">
                                <button id="login_go" class="btn btn-larger btn-success" style="font-family:'Questrial';border-radius: 4px !important;width:100%;font-weight:bold;" /> LOGIN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
