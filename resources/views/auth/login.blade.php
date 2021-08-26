@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/estilos.css') }}" rel="stylesheet">
<body>
                    <form method="POST" class="form-login" action="{{ route('login') }}">
                    <h5>Formulario Login</h5>
                        @csrf

                        <div class="form-group row">
                           
                            <div class="col-md-12">
                                <input id="user" type="txt" class="controls @error('usuario') is-invalid @enderror" name="usuario" value="{{ old('usuario') }}" required autocomplete="usuario" placeholder="Ingresa tu usuario" autofocus>

                                @error('usuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                            <div class="col-md-12">
                                <input id="password" type="password" class="controls @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Ingresa tu contraseña">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="buttons">
                            Ingresar
                        </button>

                        @if (Route::has('password.request'))
                            <p><a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a></p>
                        @endif

                        <!----- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> ----->
                           
                    </form>
</body>
@endsection
