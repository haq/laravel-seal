<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-lg-5 my-5">
            <div class="d-flex justify-content-center mb-3">
                {{ $logo }}
            </div>

            <div class="card shadow-sm px-3">
                <div class="card-body">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
