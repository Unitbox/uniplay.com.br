
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Fazer Login | Uniplay Arcades</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Uniplay Administrativo" name="description" />
        <meta content="Unitibox" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('template/assets/css/icons.min.css') }}"   rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
  </head>

    <body class="pb-0" data-layout-config='{"darkMode":false}'>
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center mt-0 font-weight-bold">Admin</h4>
                                    <p class="text-muted mb-4">Digite seu e-mail e senha para entrar.</p>
                                </div>

                                <form action="{{ route('admin.login.do') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Digite seu e-mail" value="{{ old('email') }}" required autofocus >
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  
                                    <div class="form-group">
                                           <label for="password">Senha</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Digite sua senha" required="">
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">Manter Conectado</label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i> Entrar </button>
                                    </div>
                                    <!-- social-->
                                </form>
                             
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

       
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="{{ asset('template/assets/js/vendor.min.js') }}"></script>
        <script src="{{ asset('template/assets/js/app.min.js') }}"></script>

    </body>

</html>