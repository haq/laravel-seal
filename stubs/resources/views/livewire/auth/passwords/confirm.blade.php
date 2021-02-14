<x-auth-card title="Confirm your password">

    <h6 class="mb-3 text-center">
        {{ __('Please confirm your password before continuing') }}
    </h6>

    <form wire:submit.prevent="confirm">
        <div class="mb-3">
            <x-label for="password" :value="__('Password')"/>

            <x-input id="password"
                     type="password"
                     wire:model.lazy="password"
                     autocomplete="current-password"
                     required/>

            <x-input-error for="password"/>
        </div>

        @if (Route::has('password.request'))
            <div class="mb-3">
                <a class="text-muted" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif

        <div class="mb-2">
            <x-auth-button>
                {{ __('Confirm password') }}
            </x-auth-button>
        </div>
    </form>

</x-auth-card>
