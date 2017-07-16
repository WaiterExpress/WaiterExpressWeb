<div class="container">
            <form class="form-horizontal" role="form">
                <h2>Crear Usuarios</h2>
                <div class="form-group">
                    <label for="cedula" class="col-sm-3 control-label">N&uacute;mero de C&eacute;dula</label>
                    <div class="col-sm-9">
                        <input type="cedula" id="cedula" name="cedula" placeholder="N&uacute;mero de C&eacute;dula" class="form-control">
                        <span class="help-block">501230456, 704560385, 112330589</span>
                    </div>

                    <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombre" name="nombre" placeholder="Escriba el Nombre" class="form-control" autofocus>
                        <span class="help-block">Luis, Daniel, Emilio</span>
                    </div>
                    <label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
                    <div class="col-sm-9">
                        <input type="text" id="apellidos" name="apellidos" placeholder="Escriba los Apellidos" class="form-control" autofocus>
                        <span class="help-block">Rodriguez, Lopez, Cort&eacute;s</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefono" class="col-sm-3 control-label">N&uacute;mero de Tel&eacute;fono</label>
                    <div class="col-sm-9">
                        <input type="text" id="telefono" name="telefono" placeholder="N&uacute;mero de Tel&eacute;fono" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Direcci&oacute;n de Correo Electr&oacute;nico</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" name="email" placeholder="Direcci&oacute;n de Correo Electr&oacute;nico" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text" class="col-sm-3 control-label">Nombre de Usuario</label>
                    <div class="col-sm-9">
                        <input type="text" id="usuario" name="usuario" placeholder="Nombre de Usuario" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Contraseña</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name="pass" placeholder="Contraseña" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Rol de Usuario</label>
                    <div class="radio-waiter-group" id="radio-waiter-group" data-toggle="buttons">
                        <label class="btn btn-default radio-waiter">
                            <input type="radio" name="rol" id="option1" value="0" autocomplete="off">
                            <span class="radio-dot"></span>
                            <span class="radio-waiter-word">Administrador</span>
                        </label>

                        <label class="btn btn-default radio-waiter">
                            <input type="radio" name="rol" id="option2" value="1" autocomplete="off">
                            <span class="radio-dot"></span>
                            <span class="radio-waiter-word">Gerente Restaurante</span>
                        </label>

                        <label class="btn btn-default radio-waiter">
                            <input type="radio" name="rol" id="option3" value="2" autocomplete="off">
                            <span class="radio-dot"></span>
                            <span class="radio-waiter-word">Cocinero</span>
                        </label>

                        <label class="btn btn-default radio-waiter">
                            <input type="radio" name="rol" id="option4" value="3" autocomplete="off">
                            <span class="radio-dot"></span>
                            <span class="radio-waiter-word">Salonero</span>
                        </label>

                        <label class="btn btn-default radio-waiter">
                            <input type="radio" name="rol" id="option5" value="4" autocomplete="off">
                            <span class="radio-dot"></span>
                            <span class="radio-waiter-word">Cliente</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-waiter btn-block"><span class="im im-icon-Add-User"></span> Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->