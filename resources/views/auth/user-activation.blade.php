<div>
    <div class="position-relative" style="width: 100%; height: 100vh;">
        <div class="position-absolute top-50 start-50 translate-middle">
            @if ($alert === 1)
                <div class="text-center text-success">
                    <i class="far fa-user-circle fa-5x"></i>
                    <p class="mb-0 fw-bold fs-5">SUCCESS!</p>
                    <p class="mb-0 text-secondary">Selamat aktivasi akun laundrymu anda berhasil</p>
                    <a http-equiv="refresh" href="{{ route('index') }}" class="link-primary text-underline-none">LOGIN</a>
                    <meta http-equiv="refresh" content="10;url={{ route('index') }}">
                </div>
            @elseif($alert === 2)
                <div class="text-center text-warning">
                    <i class="far fa-user-circle fa-5x"></i>
                    <p class="mb-0 fw-bold fs-5">SUCCESS!</p>
                    <p class="mb-0 text-secondary">Oops maaf aktivasi akun anda tidak berhasil</p>
                    <a http-equiv="refresh" href="{{ route('index') }}"
                        class="link-primary text-underline-none">LOGIN</a>
                    <meta http-equiv="refresh" content="10;url={{ route('index') }}">
                </div>
            @elseif($alert === 0)
                <div class="text-center text-danger">
                    <i class="far fa-user-circle fa-5x"></i>
                    <p class="mb-0 fw-bold fs-5">FAILED!</p>
                    <p class="mb-0 text-secondary">Oops maaf aktivasi akun anda tidak berhasil</p>
                    <a http-equiv="refresh" href="{{ route('index') }}"
                        class="link-primary text-underline-none">LOGIN</a>
                    <meta http-equiv="refresh" content="10;url={{ route('index') }}">
                </div>
            @endif
        </div>
    </div>
</div>
