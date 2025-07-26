<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laundrymu - {{ $title ?? '' }}</title>
    <link rel="stylesheet" href="{{ asset('/assets/app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/pages/index.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/OwlCarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/OwlCarousel/css/owl.theme.default.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    @stack('style')
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex border-0" href="{{ route('index') }}">
                <span class="text-purple">Laundry</span>
                <span class="text-dark">Mu</span>
            </a>
            <a class="btn position-relative link-dark d-lg-none ms-auto" href="{{ route('order') }}">
                <i class="fas fa-shopping-cart fa-sm fa-fw" aria-hidden="true"></i>
                @if (session('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 mt-1 translate-middle badge rounded-pill bg-danger">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
            <botton class="btn d-lg-none">
                <i class="fas fa-search fa-sm fa-fw"></i>
            </botton>
            <button class="btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#slider">
                <i class="fas fa-bars fa-sm fa-fw"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav gap-2 align-items-stretch ms-lg-auto">
                    <li class="nav-item align-self-lg-center">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item align-self-lg-center">
                        <a class="nav-link" href="{{ route('product') }}">Product</a>
                    </li>
                    <li class="nav-item align-self-lg-center">
                        <a class="nav-link" href="{{ route('about') }}">Aboutme</a>
                    </li>
                    <li class="nav-item align-self-lg-center d-none d-lg-inline-block">
                        <a class="nav-link position-relative link-dark" href="{{ route('order') }}">
                            <i class="far fa-shopping-basket" aria-hidden="true"></i>
                            @if (session('cart') && count(session('cart')) > 0)
                                <span
                                    class="position-absolute top-0 start-100 mt-1 translate-middle badge rounded-pill bg-danger">
                                    {{ count(session('cart')) }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item align-self-lg-center d-none d-lg-inline-block">
                        <a class="nav-link link-dark" href="#">
                            <i class="far fa-search"></i>
                        </a>
                    </li>
                    @auth('users')
                        <li class="nav-item align-self-lg-center">
                            <a href="{{ route('user.profile') }}" class="nav-link link-dark">
                                <img class="tmp-image-nav"
                                    src="{{ url('/images/avatar/' . auth('users')->user()->avatar) }}" alt="user">
                            </a>
                        </li>
                    @else
                         <li class="nav-item d-inline d-lg-none align-self-lg-center">
                            <a class="nav-link" href="{{ route('signup') }}">Daftar</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline align-self-lg-center">
                            <a class="btn rounded-pill btn-outline-purple" style="width: 120px"
                                href="{{ route('signup') }}">Daftar</a>
                        </li>
                        <li class="nav-item d-inline d-lg-none align-self-lg-center">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline align-self-lg-center">
                            <a class="btn rounded-pill btn-purple" style="width: 120px"
                                href="{{ route('login') }}">Masuk</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <main>
        {{ $slot }}
    </main>

    <footer class="footer-gradient py-5">
        <div class="py-2">
            <div class="container">
                <div class="row g-4 mb-5 align-items-stretch align-self-stretch">
                    <div class="col-12 col-md-7">
                        <div class="footer-section me-0">
                            <h4 class="fw-bold">About Me</h4>
                            <p>Selamat datang di layanan laundry kami! Kami berdedikasi memberikan layanan cuci terbaik,
                                cepat, dan bersih. Dengan tenaga profesional dan peralatan modern, kami memastikan
                                pakaian Anda terawat sempurna. Kepuasan pelanggan adalah prioritas kami. Terima kasih
                                telah mempercayakan kebutuhan laundry Anda kepada kami. Kami siap melayani Anda!</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="row g-4">
                            <div class="col-12 col-md-6">
                                <div class="footer-section">
                                    <p class="fw-bold">About Website</p>
                                    <ul class="nav flex-column">
                                        <a class="nav-link footer-link" href="{{ route('privacy') }}">Privasi</a>
                                        <a class="nav-link footer-link" href="{{ route('about') }}">About Me</a>
                                        <a class="nav-link footer-link" href="{{ route('howpayment') }}">Cara
                                            Pemesanan</a>
                                        <a class="nav-link footer-link" href="{{ route('termcondition') }}">Syart &
                                            Ketentuan</a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="footer-section">
                                    <p class="fw-bold">Member Part</p>
                                    <ul class="nav flex-column">
                                        <a class="nav-link footer-link" href="#">Masuk</a>
                                        <a class="nav-link footer-link" href="#">Daftar</a>
                                        <a class="nav-link footer-link" href="#">Join
                                            Instagram</a>
                                        <a class="nav-link footer-link" href="#">Join
                                            Facebook</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-section-bottom">
                    <div
                        class="d-flex flex-column-reverse flex-md-row justify-content-center justify-content-md-between align-items-center">
                        <span class="footer-copyright mb-0 py-2">
                            <i class="fas fa-copyright me-2"></i>Copyrights ©2025 Website Laundry
                        </span>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link link-light" href="https://github.com/kobayyy1" title="github">
                                    <i class="fab fa-github"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light"
                                    href="https://www.instagram.com/_bayuady_?igsh=eTNqZThwMW5yZjQ="
                                    title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-light"
                                    href="https://wa.me/+628557584375/?text=Hallo%20Admin%20Laundry" title="WhatsApp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="slider" style="max-width: 19rem">
        <div class="position-relative overflow-y-auto">
            <button type="button" class="btn position-absolute m-2" data-bs-dismiss="offcanvas">
                <i class="fas fa-times fa-lg fa-fw"></i>
            </button>
            <div class="offcanvas-body">
                @include('layouts.pagesMenuLayouts')
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/library/js/alert.js') }}"></script>
    <script src="{{ asset('/assets/library/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/library/js/popper.js') }}"></script>
    <script src="{{ asset('/assets/dist/js/pages/index.js') }}"></script>
    <script src="{{ asset('/assets/app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/OwlCarousel/owl.carousel.min.js') }}"></script>
    @stack('scripts')
    @livewireScripts

</body>

</html>
