@props(['title'])

@php
    $setTitleSet = isset($subTitle);
@endphp

<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-5 my-5">
            <div class="d-flex justify-content-center mb-3">
                <a href="/">
                    <x-application-logo width="82"/>
                </a>
            </div>

            <h2 class="text-center fw-bold @unless ($setTitleSet) mb-3 @endif">
                {{ $title }}
            </h2>

            @if ($setTitleSet)
                <div>
                    {{ $subTitle }}
                </div>
            @endif

            <div class="card shadow-sm px-3">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
