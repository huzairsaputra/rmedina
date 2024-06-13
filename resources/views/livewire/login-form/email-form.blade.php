<form method="POST" action="{{ route('login') }}" class="user">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="form-group">
        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Password') }}" required>
    </div>

    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ __('Login') }}
        </button>
    </div>

    <hr>

    {{--<div class="form-group">
        <button type="button" class="btn btn-github btn-user btn-block">
            <i class="fab fa-github fa-fw"></i> {{ __('Login with GitHub') }}
        </button>
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-twitter btn-user btn-block">
            <i class="fab fa-twitter fa-fw"></i> {{ __('Login with Twitter') }}
        </button>
    </div>

    <div class="form-group">
        <button type="button" class="btn btn-facebook btn-user btn-block">
            <i class="fab fa-facebook-f fa-fw"></i> {{ __('Login with Facebook') }}
        </button>
    </div>--}}
</form>
