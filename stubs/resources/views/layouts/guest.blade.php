@extends('layouts.base')

@section('body')
    <main class="d-flex justify-content-center align-items-center">
        {{ $slot }}
    </main>
@endsection
