<div class="modal" id="quick_view_login">
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
                            Iniciar sesión      
                        </li>
                        
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="login">
                            {{-- <form action="{{ route('login') }}" method="POST"> --}}
                            {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal login-form']) !!}

                            <div class="form-group relative">
                              <input class="form-control input-lg" id="email" name="email" placeholder="Correo electrónico" required type="email"> <i class="fa fa-envelope"></i>
                            </div>
                            <div class="form-group relative">
                              <input class="form-control input-lg" id="password" name="password" placeholder="Contraseña" required type="password"> <i class="fa fa-lock"></i>
                            </div>
                            <div class="form-group">
                              <button class="btn btn-success btn-lg btn-block" type="submit">Iniciar sesión</button>
                            </div>
                            {!! Form::close() !!}
                          <hr/>
                            <div class="text-center">
                              <label><a href="{{route('password.request')}}" class="forget-pwd">¿Olvidaste tu contraseña?</a></label>
                              <hr>
                              ¿No tienes una cuenta? </> <a href="#" id="modal_register" data-toggle="modal" data-target="#quick_view_register" data-dismiss="modal">Regístrate</a>
                            </div>
                        </div>

                      </div>
                    </div>
              </div>
            </div>
        </div>
    </div>
</div>