<x-auth-card title="Reset password">

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <x-slot name="subTitle">
        Or
        <a href="{{ route('login') }}" class="text-muted">
            sign in to your account
        </a>
    </x-slot>

    <form wire:submit.prevent="sendResetPasswordLink">

        <div class="mb-4">
            <x-label for="email" :value="__('Email')"/>

            <x-input id="email"
                     type="email"
                     wire:model.lazy="email"
                     autocomplete="email"
                     required
                     autofocus/>

            <x-input-error for="email"/>
        </div>

        <div class="mb-2">
            <x-auth-button>
                {{ __('Send password reset link') }}
            </x-auth-button>
        </div>
    </form>

</x-auth-card>
