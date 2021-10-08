@extends('layouts.app')

@section('estilos')
<link rel="stylesheet" type="text/css" href="/layout/js/form/sky-forms.css">
@endsection


@section('content')


<div class="section_holder27" style="background-image: radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%);">
    <div class="container">
        <div class="login_form" style="">
            <form method="POST" action="{{ route('login') }}" id="sky-form" class="sky-form">
                @csrf
                <header>Iniciar Sesión</header>

                <fieldset>
                    <section>
                        <div class="row">
                            <label class="label col col-4">Correo </label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-user"></i>
                                    <input type="email" name="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <label class="label col col-4">Contraseña </label>
                            <div class="col col-8">
                                <label class="input">
                                    <i class="icon-append icon-lock"></i>
                                    <input type="password" name="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>
                                @if (Route::has('password.request'))
                                <div class="note">
                                    <a href="{{ route('password.request') }}" class="modal-opener">¿ Olvidaste tu contraseña ?</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </section>

                    <section>
                        <div class="row">
                            <div class="col col-4"></div>
                            <div class="col col-8">
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><i></i>Mantener la sesión iniciada
                                </label>
                            </div>
                        </div>
                    </section>

                </fieldset>
                <footer>
                    <div class="fright" style="text-align: center; padding:0 30% 0 0;">
                        <button type="submit" class="button eight">Iniciar Sesión</button>
                    </div>
                </footer>
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>


@endsection
