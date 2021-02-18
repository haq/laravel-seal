<x-auth-card>

    <x-slot name="title">
        {{ __('Reset password') }}
    </x-slot>

    <form wire:submit.prevent="resetPassword">
        <div class="mb-3">
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email"
                     type="email"
                     wire:model.lazy="email"
                     autocomplete="email"
                     autofocus
                     required/>

            <x-input-error for="email"/>
        </div>

        <div class="mb-3">
            <x-label for="password" :value="__('Password')"/>

            <x-input id="password"
                     type="password"
                     wire:model.lazy="password"
                     autocomplete="new-password"
                     required/>

            <x-input-error for="password"/>
        </div>

        <div class="mb-4">
            <x-label for="password-confirm" :value="__('Confirm Password')"/>

            <x-input id="password-confirm"
                     type="password"
                     wire:model.lazy="passwordConfirmation"
                     autocomplete="new-password"
                     required/>
        </div>

        <div class="mb-2">
            <x-auth-button>
                {{ __('Reset password') }}
            </x-auth-button>
        </div>
    </form>

</x-auth-card>
