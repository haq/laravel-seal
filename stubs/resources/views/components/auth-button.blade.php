<div class="d-grid gap-2">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-dark']) }}>
        {{ $slot }}
    </button>
</div>
