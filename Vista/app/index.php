<div class="container">
   <div class="row vertical-offset-100">
      <div class="col-md-9 col-md-offset-2">
        <center>
            <img src="<?php echo $url->Img('logo.png'); ?>" width="90%" alt="logo">
        </center>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title text-center">Iniciar Sesi&oacute;n</h2>
            </div>
            <div class="panel-body">
                <form id="loginForm" method="post" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Correo electr&oacute;nico" name="email" type="email">
                        </div>
                        <div class="form-group">
                            <input class="form-control clave" placeholder="Contrase&ntilde;a" name="clave" type="password">
                        </div>
                        <button class="btn btn-md btn-danger btn-block txt" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesi&oacute;n</button>
                    </fieldset>
                </form>
            </div>
        </div>
      </div>
   </div>
</div>
<footer class="footer">
   <div class="container">
      <p class="text-muted text-center">Todos los derechos reservados &copy; <?php echo date('Y').' '.APPNAME; ?></p>
   </div>
</footer>
 