@props(['disabled' => false, 'id', 'errors'])

@if ($errors->has($id))
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control is-invalid']) !!}>
@else
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control']) !!}>
@endif
