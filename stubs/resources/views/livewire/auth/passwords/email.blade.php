<x-auth-card title="Reset password">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form wire:submit.prevent="sendResetPasswordLink">

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

        <div class="mb-0">
            <div class="d-flex justify-content-end">
                <x-button>
                    {{ __('Login') }}
                </x-button>
            </div>
        </div>
    </form>

</x-auth-card>

