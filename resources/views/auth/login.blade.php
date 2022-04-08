@extends('layouts.app')
@section('content')

<section class="content-main mt-80 mb-80">
    <div class="card mx-auto card-login">
        <div class="card-body">
            <h4 class="card-title mb-4">{{ __('Sing In') }}</h4>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <input id="email" type="email" placeholder="Username or email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- form-group// -->
                <div class="mb-3">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <!-- form-group// -->
                <div class="mb-3">
                    @if (Route::has('password.request'))
                        <a class="float-end font-sm text-muted" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                    {{--  <a href="#" class="float-end font-sm text-muted">Forgot password?</a>  --}}
                    <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </span>
                    </label>
                </div>
                <!-- form-group form-check .// -->
                <div class="mb-4">
                <button type="submit" class="btn btn-primary w-100">
                    {{ __('Login') }}
                </button>
                </div>
                <!-- form-group// -->
            </form>
            </div>
            @guest

            @if (Route::has('register'))
            {{--  <li class="nav-item">  --}}
            <p class="text-center mb-4">Don't have account? <a href="{{ route('register') }}">{{ __('Register') }}</a></p>

            {{--  </li>  --}}
            @endif
            @endguest

        </div>
    </div>
</section>
<footer class="main-footer text-center">
    <p class="font-xs">
        <script>
            document.write(new Date().getFullYear());
        </script>
        ©, KLIKDIGITAL INDONESIA
    </p>
</footer>
@endsection

        <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
    </body>
</html>

