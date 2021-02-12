<x-auth-card>

    <x-slot name="logo">
        <a href="/">
            <x-application-logo width="82"/>
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

        <div class="mb-3">
            <x-label for="password-confirm" :value="__('Confirm Password')"/>

            <x-input id="password-confirm"
                     type="password"
                     wire:model.lazy="passwordConfirmation"
                     autocomplete="new-password"
                     required/>
        </div>

        <div class="mb-0">
            <div class="d-flex justify-content-end">
                <x-button>
                    {{ __('Register') }}
                </x-button>
            </div>
        </div>
    </form>

</x-auth-card>
