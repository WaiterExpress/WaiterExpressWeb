<div class="container">
   <div class="row vertical-offset-100">
      <div class="col-md-9 col-md-offset-2">
        <center>
            <img src="<?php echo IMG; ?>logo.png" width="90%" alt="logo">
        </center>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Iniciar Sesi&oacute;n</h3>
            </div>
            <div class="panel-body">
                <form method="post" role="form">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Nombre de Usuario" name="usuario" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Contrase&ntilde;a" name="clave" type="password">
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