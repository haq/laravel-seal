<x-auth-card>

    <x-slot name="logo">
        <a href="/">
            <x-application-logo width="82"/>
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

        <div class="mb-3">
            <div class="form-check">
                <x-label for="remember" :value="__('Remember Me')" class="form-check-label"/>
                <x-checkbox id="remember" wire:model.lazy="remember"/>
            </div>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end align-items-baseline">
                @if (Route::has('password.request'))
                    <a class="text-muted me-3" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button>
                    {{ __('Login') }}
                </x-button>
            </div>
        </div>
    </form>

</x-auth-card>
