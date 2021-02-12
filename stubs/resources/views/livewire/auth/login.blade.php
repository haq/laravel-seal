<x-auth-card title="Sign in to your account">

    <x-slot name="subTitle">
        Or
        <a href="{{ route('register') }}" class="text-muted">
            create a new account
        </a>
    </x-slot>

    <form wire:submit.prevent="login">

        <div class="mb-3">
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email"
                     type="email"
                     wire:model.lazy="email"
                     autocomplete="email"
                     required
                     autofocus/>

            <x-input-error for="email"/>
        </div>

        <div class="mb-3">
            <x-label for="password" :value="__('Password')"/>

            <x-input id="password"
                     type="password"
                     wire:model.lazy="password"
                     autocomplete="current-password"
                     required/>
        </div>

        <div class="row mb-3">
            <div class="col-auto">
                <div class="form-check">
                    <x-label for="remember" :value="__('Remember Me')" class="form-check-label"/>
                    <x-checkbox id="remember" wire:model.lazy="remember"/>
                </div>
            </div>

            @if (Route::has('password.request'))
                <div class="col-auto ms-auto align-items-baseline">
                    <a class="text-muted" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
        </div>

        <div class="mb-2">
            <x-auth-button>
                {{ __('Login') }}
            </x-auth-button>
        </div>
    </form>

</x-auth-card>
