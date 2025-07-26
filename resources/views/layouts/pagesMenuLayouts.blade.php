<div>

    @auth('users')
        <div class="d-block text-center bg-light pt-5 pb-3">
            <img src="{{ url('/images/avatar/' . auth('users')->user()->avatar) }}" alt=""
                class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                style="width: 64px; height: 64px;">
            <h6 class="fw-bold mb-1">{{ auth('users')->user()->username }}</h6>
            <small class="text-muted">{{ auth('users')->user()->email }}</small>
        </div>
        <hr class="soft bg-light">
    @else
        <div class="d-block text-center bg-light p-4">
            <div class="rounded-circle bg-purple d-inline-flex align-items-center justify-content-center mb-3"
                style="width: 64px; height: 64px;">
                <i class="fas fa-user text-white fa-2x"></i>
            </div>
            <h6 class="fw-bold mb-1">Selamat Datang!</h6>
            <small class="text-muted">Masuk untuk mengakses applikasi</small>
        </div>
        <div class="d-flex gap-2 mb-3">
            <a href="{{ route('signup') }}" class="flex-fill btn btn-outline-purple">Daftar</a>
            <a href="{{ route('login') }}" class="flex-fill btn btn-purple">Masuk</a>
        </div>
        <hr class="soft bg-light">
    @endauth


    <nav class="nav flex-column" id="navAccordion">
        <a class="nav-link px-0 link-dark" href="{{ route('index') }}">
            <i class="fas fa-home fa-sm fa-fw" style="width: 28px"></i>
            <span class="fw-bold">Beranda</span>
        </a>
        <a class="nav-link px-0 link-dark" href="{{ route('product') }}">
            <i class="fas fa-boxes fa-sm fa-fw" style="width: 28px"></i>
            <span class="fw-bold">Produk</span>
        </a>
        <a class="nav-link px-0 link-dark" href="{{route('order')}}">
            <i class="fas fa-shopping-bag fa-sm fa-fw" style="width: 28px"></i>
            <span class="fw-bold">Keranjang Belanja</span>
        </a>
        <a class="nav-link px-0 link-dark" href="{{route('about')}}">
            <i class="fas fa-id-card fa-sm fa-fw" style="width: 28px"></i>
            <span class="fw-bold">Tentang Kami</span>
        </a>
    </nav>


    @auth('users')
        <hr class="soft bg-light">
        <nav class="nav flex-column" id="navAccordion">
            <a class="nav-link px-0 link-dark" href="#account" data-bs-toggle="collapse" data-bs-target="#account">
                <i class="fas fa-user fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Account</span>
            </a>
            <div class="accordion-collapse collapse" id="account" data-bs-parent="#navAccordion">
                <a style="padding-left: 2rem"
                    class="nav-link @if (Route::currentRouteName() == 'user.profile') link-primary @else link-dark @endif"
                    href="{{ route('user.profile') }}">Profile</a>
                <a style="padding-left: 2rem"
                    class="nav-link @if (Route::currentRouteName() == 'user.address') link-primary @else link-dark @endif"
                    href="{{ route('user.address') }}">Address</a>
                <a style="padding-left: 2rem"
                    class="nav-link @if (Route::currentRouteName() == 'admin.dashboard') link-primary @else link-dark @endif"
                    href="#">Payment Card</a>
                <a style="padding-left: 2rem"
                    class="nav-link @if (Route::currentRouteName() == 'admin.dashboard') link-primary @else link-dark @endif"
                    href="#">Ubah Password</a>
                <a style="padding-left: 2rem"
                    class="nav-link @if (Route::currentRouteName() == 'admin.dashboard') link-primary @else link-dark @endif"
                    href="#">Privasi</a>
            </div>
            <a class="nav-link px-0 link-dark" href="{{ route('user.orders') }}">
                <i class="fas fa-shopping-basket fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Pesanan Saya</span>
            </a>
            <hr class="soft">
            <a class="nav-link px-0 link-dark" href="#">
                <i class="fas fa-envelope fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Pesan</span>
            </a>
            <a class="nav-link px-0 link-dark" href="#">
                <i class="fas fa-heart fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Kesukaan Saya</span>
            </a>
            <a class="nav-link px-0 link-dark" href="#">
                <i class="fas fa-bell fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Notifikasi</span>
            </a>
            <hr class="soft">
            <a class="nav-link px-0 link-dark" href="#">
                <i class="fas fa-cog fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Setting</span>
            </a>
            <a class="nav-link px-0 link-dark LogOut" href="#">
                <i class="fas fa-sign-out-alt fa-sm fa-fw" style="width: 28px"></i>
                <span class="fw-bold">Logout</span>
            </a>
        </nav>
    @endauth

</div>
