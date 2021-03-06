<x-auth-card>

    <x-slot name="title">
        {{ __('Create a new account') }}
    </x-slot>

    <x-slot name="subTitle">
        Or
        <a href="{{ route('login') }}" class="text-muted">
            sign in to your account
        </a>
    </x-slot>

    <form wire:submit.prevent="register">
        <div class="mb-3">
            <x-label for="name" :value="__('Name')"/>

            <x-input id="name"
                     type="text"
                     wire:model.lazy="name"
                     autocomplete="name"
                     required
                     autofocus/>

            <x-input-error for="email"/>
        </div>

        <div class="mb-3">
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email"
                     type="email"
                     wire:model.lazy="email"
                     autocomplete="email"
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
                {{ __('Register') }}
            </x-auth-button>
        </div>
    </form>

</x-auth-card>
