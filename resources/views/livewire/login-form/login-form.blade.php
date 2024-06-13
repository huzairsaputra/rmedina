<div class="p-5">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ __('Login') }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger border-left-danger">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="user">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if(!$isValidEmail)
            <div class="form-group">
                <input type="email" class="form-control" wire:model.lazy="email" placeholder="{{ __('E-Mail Address') }}" required autofocus>
            </div>
        @else
            <div class="form-group">
                <input type="email" class="form-control" wire:model.lazy="email" placeholder="{{ __('E-Mail Address') }}" disabled>
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" wire:model.lazy="password" placeholder="{{ __('Password') }}">
            </div>
        @endif

        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input
                    type="checkbox"
                    class="custom-control-input"
                    wire:model="rememberMe"
                    id="remember">
                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ !$isValidEmail ? __('Berikutnya') : __('Login') }}
            </button>
        </div>

{{--        <hr>--}}

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

    <hr>

    @if (Route::has('password.request'))
        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">
                {{ __('Forgot Password?') }}
            </a>
        </div>
    @endif

    @if (Route::has('register'))
        <div class="text-center">
            <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
        </div>
    @endif
</div>

@push('scripts')
    <script> document.addEventListener('livewire:load', () => {
        Livewire.on('newfocus', () => {
            document.getElementById("password").focus();
        })
    }); </script>
@endpush
