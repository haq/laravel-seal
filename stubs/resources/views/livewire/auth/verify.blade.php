<x-auth-card title="Verify your email address">

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <x-slot name="subTitle">
        Or
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            sign out
        </a>
    </x-slot>

    <p class="mb-3">
        {{ __('Before proceeding, please check your email for a verification link.') }}
    </p>

    {{ __('If you did not receive the email') }},
    <form class="d-inline" wire:submit.prevent="resend">
        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
            {{ __('click here to request another') }}
        </button>.
    </form>

</x-auth-card>
