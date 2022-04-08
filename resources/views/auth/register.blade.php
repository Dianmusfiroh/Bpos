@extends('layouts.app')
{{--  @section  --}}
<section class="content-main mt-80 mb-80">
    <div class="card mx-auto card-login">
<div class="card-body">
    <h4 class="card-title mb-4">Create an Account</h4>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label text-md-end">{{ __('Name') }}</label>

                <input id="name" type="text" placeholder="Your Name"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-md-end">{{ __('Email Address') }}</label>

                <input id="email" placeholder="{{ __('Your Email Address') }}"type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <div class="row gx-2">
                <div class="col-4"><input readonly class="form-control" value="+62" type="text" /></div>
                <div class="col-8"><input class="form-control" name="no_hp" placeholder="Phone" type="number" /></div>
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>

                <input id="password" placeholder="{{ __('Enter your password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="mb-3">
            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}"class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
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
{{--  @endsection  --}}
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.fullscreen.min.js"></script>
    <!-- Main Script -->
    <script src="assets/js/main.js?v=1.0" type="text/javascript"></script>
</body>
</html>
