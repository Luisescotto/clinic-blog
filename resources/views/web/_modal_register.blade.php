<div class="modal" id="quick_view_register">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body rounded-3">
                <div class="login">
                    <div class="login-container-wrapper clearfix rounded">
                      <ul class="clearfix">
                        <li class="first logo active" data-tab="login">         
                            Crear cuenta     
                        </li>
                      </ul>
                      
                            
                            {!! Form::open(['route' => 'register', 'method' => 'POST', 'class' => 'form-horizontal login-form']) !!}
                                @csrf
                                <div class="form-group relative">
                                  <input class="form-control input-lg" id="name" name="name" placeholder="Nombre" required type="text"> <i class="fa fa-user"></i>
                                </div>

                                <div class="form-group relative">
                                  <input class="form-control input-lg" id="surname" name="surname" placeholder="Apellido" required type="text"> <i class="fa fa-user"></i>
                                </div>

                                <div class="form-group relative">
                                  <input class="form-control input-lg" id="email" name="email" placeholder="Correo Electrónico" required type="email"> <i class="fa fa-envelope"></i>
                                </div>

                                <div class="form-group relative">
                                  <input class="form-control input-lg" id="password" name="password" placeholder="Contraseña" required type="password"> <i class="fa fa-lock"></i>
                                </div>

                                <div class="form-group relative">
                                  <input class="form-control input-lg" id="password_confirm" placeholder="Repetir contraseña" required type="password"> <i class="fa fa-lock"></i>
                                </div>

                                <div class="form-group">
                                  <button class="btn btn-success btn-lg btn-block" type="submit">Registrar</button>
                                </div>
                              {!! Form::close() !!}

                                <hr>
                                <div class="text-center">
                                    ¿Ya tienes una cuenta? </> <a href="#" data-toggle="modal" data-target="#quick_view_login" data-dismiss="modal">Inicia sesión</a>
                                </div>
                            </form>

                       
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>