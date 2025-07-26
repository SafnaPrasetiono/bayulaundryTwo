<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Laundrymu - {{ $title ?? '' }}</title>
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('/assets/app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/icons/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/admin/panel.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/library/css/textEditor.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/OwlCarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/OwlCarousel/css/owl.theme.default.min.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
                <button id="sliderButton" class="btn ms-auto" type="button">
                    <i class="fas fa-bars fa-lg fa-fw"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarID">
                    <div class="navbar-nav gap-2 ms-auto">
                        <a class="nav-link text-them-sec" aria-current="page" href="#">
                            <i class="fas fa-bell fa-lg fa-fw"></i>
                        </a>
                        <a class="nav-link text-them-sec" aria-current="page" href="#">
                            <i class="fas fa-envelope fa-lg fa-fw"></i>
                        </a>
                        <a class="nav-link text-them-sec" aria-current="page" href="#">
                            <i class="fas fa-user fa-lg fa-fw"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="slider shadow" id="sliderExample">
            <div class="slider-head">
                <div class="slider-profile-image mb-2"
                    style="background-image: url('/images/admins/{{ auth('admins')->user()->avatar }}')"></div>
                
                <div class="lh-1">
                    <p class="text-them fw-bold mb-0">LaundryMu</p>
                    <small class="text-them-sec">admin@gmail.com</small>
                </div>
            </div>
            <div class="slider-body">
                <div class="container">
                    <nav class="nav flex-column" id="slider-navbar">
                        <a class="nav-link slider-link" href="{{route('admin.dashboard')}}">
                            <i class="fas fa-home slider-icons"></i>Dashboard
                        </a>
                        <a class="nav-link slider-link" href="{{route('admin.profile')}}">
                            <i class="fas fa-user slider-icons"></i>Profile
                        </a>
                        <hr class="soft my-2">
                        <a class="nav-link slider-link" href="#">
                            <i class="fas fa-money-bill slider-icons"></i>Transaction
                        </a>
                        <a class="nav-link slider-link" href="{{route('admin.order')}}">
                            <i class="fas fa-shopping-bag slider-icons"></i>Orders
                        </a>
                        <a class="nav-link slider-link" href="{{ route('admin.payment.method') }}">
                            <i class="fas fa-money-check-alt slider-icons"></i>Payment Method
                        </a>
                        <hr class="soft my-2">
                        <a class="nav-link slider-link" href="#product" data-bs-toggle="collapse"
                            data-bs-target="#product">
                            <i class="fas fa-box-open slider-icons"></i>Product
                        </a>
                        <div class="accordion-collapse collapse" id="product" data-bs-parent="#slider-navbar">
                            <a class="nav-link slider-link ps-3" href="{{ route('admin.product.laundry') }}">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Laundry
                            </a>
                            <a class="nav-link slider-link ps-3" href="{{ route('admin.product.commerce') }}">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Commerce
                            </a>
                        </div>
                        <hr class="soft my-2">
                        <a class="nav-link slider-link" href="#account" data-bs-toggle="collapse"
                            data-bs-target="#account">
                            <i class="fas fa-users slider-icons"></i>Account
                        </a>
                        <div class="accordion-collapse collapse" id="account" data-bs-parent="#slider-navbar">
                            <a class="nav-link slider-link ps-3" href="{{route('admin.account')}}">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Admins
                            </a>
                            <a class="nav-link slider-link ps-3" href="#">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Costumer
                            </a>
                        </div>
                        <a class="nav-link slider-link" href="#page" data-bs-toggle="collapse"
                            data-bs-target="#page">
                            <i class="fas fa-presentation slider-icons"></i>Pages
                        </a>
                        <div class="accordion-collapse collapse" id="page" data-bs-parent="#slider-navbar">
                            <a class="nav-link slider-link ps-3" href="{{route('admin.pages.home')}}">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Home Pages
                            </a>
                        </div>
                        <a class="nav-link slider-link" href="#setting" data-bs-toggle="collapse"
                            data-bs-target="#setting">
                            <i class="fas fa-cog slider-icons"></i>Settings
                        </a>
                        <div class="accordion-collapse collapse" id="setting" data-bs-parent="#slider-navbar">
                            <a class="nav-link slider-link ps-3" href="#">
                                <i class="far fa-circle fa-sm fa-fw slider-icons"></i>Home Pages
                            </a>
                        </div>
                        <a class="nav-link slider-link" type="button" id="LogOut">
                            <i class="fas fa-sign-out slider-icons"></i>LogOut
                        </a>
                    </nav>
                </div>
            </div>
        </div>

        <div class="pages">
            {{ $slot }}
        </div>
    </div>




    <div id="logoutModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center pt-5 pb-3">
                        <i class="fas fa-sign-out-alt fa-5x fa-fw"></i>
                        <p>Anda yakin ingin keluar applikasi!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="#" class="btn btn-primary">Iya, keluar</a>
                </div>
            </div>
        </div>
    </div>


    <div class="sliderBackground" id="sliderBackground"></div>
    <script src="{{ asset('/assets/library/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/library/js/alert.js') }}"></script>
    <script src="{{ asset('/assets/library/js/popper.js') }}"></script>
    <script src="{{ asset('/assets/editor/ckeditor.js') }}"></script>
    <script src="{{ asset('/assets/app/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/dist/js/admin/panel.js') }}"></script>
    <script src="{{ asset('/assets/OwlCarousel/owl.carousel.min.js') }}"></script>
    @livewireScripts
</body>

</html>
