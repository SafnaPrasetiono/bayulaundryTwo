@push('style')
    <style>
        .product-card {
            width: 25rem !important;
            overflow: hidden;
        }

        @media (max-width: 576px) {
            .product-card {
                width: 21rem !important;
            }
        }
    </style>
@endpush


<div>


    <div class="content-banners">
        <div class="d-none d-lg-block">
            @if ($banner)
                <div id="CExp" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach ($banner as $index => $item)
                            <button type="button" data-bs-target="#CExp" data-bs-slide-to="{{ $index }}"
                                class="active"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($banner as $index => $item)
                            <div class="carousel-item ratio ratio-21x9 @if ($index == 0) active @endif">
                                <img src="{{ $item->imagesPath . $item->imagesDesktop }}"
                                    alt="{{ $item->imagesDesktop }}" class="img-fluid"
                                    style="object-position: center; object-fit:cover;">

                                <div
                                    class="d-flex align-items-center @if ($item->textPosition == 'right') justify-content-end @elseif($item->textPosition == 'center') justify-content-center @endif">
                                    <div class="container">
                                        <div class="row">

                                            <div class="col-7">
                                                <div
                                                    class="mt-4 pe-4 @if ($item->textColor == 'light') text-light @endif @if ($item->textPosition == 'right') text-end @elseif($item->textPosition == 'center') text-center @endif">
                                                    <div class="mb-2 display-5 fw-bold">
                                                        {{ $item->title }}
                                                    </div>
                                                    <div class="mb-3 fs-3 fw-light w-75">
                                                        {{ $item->description }}
                                                    </div>
                                                    @if ($item->linked)
                                                        <a href="{{ $item->linked }}"
                                                            class="btn @if ($item->textColor == 'light') btn-outline-light @else btn-outline-dark @endif btn-lg px-4">{{ $item->linkedText }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExp" data-bs-slide="prev"
                        style="width: 5%!important">
                        <i class="fas fa-angle-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExp" data-bs-slide="next"
                        style="width: 5%!important">
                        <i class="fas fa-angle-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @else
                <div id="CExp" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#CExp" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#CExp" data-bs-slide-to="1"></button>
                    </div>
                    <div class="carousel-inner rounded overflow-hidden">
                        <div class="carousel-item active">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExp" data-bs-slide="prev">
                        <i class="fas fa-arrow-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExp" data-bs-slide="next">
                        <i class="fas fa-arrow-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @endif
        </div>

        <div class="d-lg-none">
            @if ($banner)
                <div id="CExpMobile" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($banner as $index => $item)
                            <div class="carousel-item ratio ratio-4x3 @if ($index == 0) active @endif">
                                <img src="{{ $item->imagesPath . $item->imagesMobile }}" alt="{{ $item->imagesMobile }}"
                                    class="img-fluid" style="object-position: center; object-fit:cover;">
                                <div class="d-flex align-items-end justify-content-center">
                                    <div
                                        class="text-center px-3 pb-4 @if ($item->textColor == 'light') text-light @endif">
                                        <h5 class="mb-2 fw-bold">
                                            {{ $item->title }}
                                        </h5>
                                        <p class="mb-0">
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExpMobile"
                        data-bs-slide="prev">
                        <i class="fas fa-angle-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExpMobile"
                        data-bs-slide="next">
                        <i class="fas fa-angle-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @else
                <div id="CExpMobile" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#CExpMobile" data-bs-slide-to="0"
                            class="active"></button>
                        <button type="button" data-bs-target="#CExpMobile" data-bs-slide-to="1"></button>
                    </div>
                    <div class="carousel-inner rounded overflow-hidden">
                        <div class="carousel-item active">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExpMobile"
                        data-bs-slide="prev">
                        <i class="fas fa-arrow-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExpMobile"
                        data-bs-slide="next">
                        <i class="fas fa-arrow-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @endif
        </div>
    </div>


    <div class="pt-5 pb-4 py-md-5" wire:ignore>
        <div class="container pt-2 pb-5">
            <div class="d-block mb-5">
                <h2 class="fw-bold mb-0">Pake Murah Laundry</h2>
                <p class="mb-0">Lorem ipsum sint excepturi architecto
                    voluptatibus praesentium unde voluptas animi.</p>
            </div>

            {{-- <div class="d-block d-md-none"> --}}
            <div id="owl-one" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">

                        @foreach ($product as $index => $item)
                            <div class="owl-item align-self-stretch">
                                <div class="card product-card">
                                    <div class="ratio ratio-4x3">
                                        <img src="/images/product/{{ $item->images }}" alt="{{ $item->images }}"
                                            width="100%" height="100vh"
                                            style="object-fit: cover; object-position: center;">
                                    </div>
                                    <div class="card-body py-4">
                                        <div class="card-titles mb-2">
                                            <h5 class="mb-0">{{ $item->title }}</h5>
                                            <p class="mb-0">{{ $item->description_short }}</p>
                                        </div>
                                        <div class="card-price mb-3">
                                            @if ($item->discount != null && strtotime(date('Y-m-d')) < strtotime($item->dateDiscountEnd))
                                                <div class="mb-2">
                                                    <span class="text-decoration-line-through">Rp.
                                                        {{ number_format($item->price_other) }}</span>
                                                    <span class="badge rounded-pill text-bg-primary">Diskon
                                                        {{ $item->discount }}%</span>
                                                </div>
                                                <div class="d-flex align-items-end">
                                                    <span class="fs-4 mb-1">Rp.</span>
                                                    <span
                                                        class="fw-bold fs-1">{{ number_format($item->price) }}</span>
                                                    <span class="fs-4 mb-1">/Kg</span>
                                                </div>
                                            @else
                                                <div class="d-flex align-items-end" style="padding-top: 2rem">
                                                    <span class="fs-4 mb-1">Rp.</span>
                                                    <span
                                                        class="fw-bold fs-1">{{ number_format($item->price) }}</span>
                                                    <span class="fs-4 mb-1">/Kg</span>
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" wire:click='order({{ $item->product_id }})'
                                            class="btn btn-outline-primary btn-lg w-100 mb-4">Pilih paket</button>
                                        <hr class="soft">
                                        <ul style="list-style: none" class="px-2">
                                            @foreach ($item->description_list as $items)
                                                <li class="d-flex mb-2">
                                                    <i class="fas fa-check text-success me-3" aria-hidden="true"></i>
                                                    <span class="mb-0">{{ $items }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-purple-gradient text-white py-5">
        <div class="container">
            <div class="d-block text-center py-5">
                <h1 class="display-5 fw-bold mb-3">
                    Bergabunglah dengan LaundryMu
                </h1>
                <p class="text-center px-lg-5 mb-md-4">Rasakan pengalaman laundry yang berbeda dengan pelayanan
                    profesional, cepat, dan berkualitas
                    tinggi. Kepuasan pelanggan adalah prioritas utama kami.</p>
                <a href="{{ route('signup') }}" class="btn btn-outline-light btn-lg px-5">
                    DAFTAR SEKARANG
                </a>
            </div>
        </div>
    </div>

    <div class="py-5 mb-3">
        <div class="container py-3 py-md-4">
            <div class="d-block mb-4">
                <h2 class="fw-bold mb-0">Produk Laundrymu</h2>
                <p class="mb-0">Laundrymu juga menyedikan produk laundry loh, yuk berbelanja produk sekarang</p>
            </div>
            <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xxl-6">
                @foreach ($commerce as $index => $item)
                    <div class="col">
                        <div class="card">
                            <img src="/images/product/{{ $item->images }}" alt=""
                                class="card-img-top ratio ratio-1x1"
                                style="object-fit: cover; object-position: center;">
                            <div class="card-body p-2">
                                <p class="product-title">{{ $item->title }}</p>
                                <p class="text-danger">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    {{-- <div class="py-5">
        <div class="container">
            <div class="row g-4 align-items-center justify-content-center mb-4">
                <div class="col-12 col-lg-6 order-2">
                    <div class="text-center text-lg-start">
                        <h1 class="">Mengapa Harus Laundry di Laundryku</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium libero quos nihil neque
                            illo
                            aliquid magnam similique eligendi non quibusdam, deleniti velit asperiores possimus,
                            voluptatem
                            illum laborum consectetur! Corrupti, atque!</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 order-lg-2">
                    <img class="ratio ratio-1x1" src="{{ url('/images/content/Laundry3.jpeg') }}" alt="paket1">
                </div>
            </div>
            <div class="row g-4 align-items-center justify-content-center mb-4">
                <div class="col-12 col-lg-6">
                    <img class="ratio ratio-1x1" src="{{ url('/images/content/Laundry4.jpg') }}" alt="paket1">
                </div>
                <div class="col-12 col-lg-6">
                    <div class="text-center text-lg-start">
                        <h1 class="">Kenali dahulu sebelum laundry pakaian</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium libero quos nihil neque
                            illo
                            aliquid magnam similique eligendi non quibusdam, deleniti velit asperiores possimus,
                            voluptatem
                            illum laborum consectetur! Corrupti, atque!</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="bg-gray py-5">
        <div class="container py-3 py-md-4">
            <div class="section-title mb-4">
                <h2 class="fw-bold">
                    Keunggulan Layanan Kami
                </h2>
                <p>Mengapa ribuan pelanggan mempercayai Rumah Cuci Si Mamak untuk kebutuhan laundry mereka setiap hari.
                </p>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-partner rounded p-4 text-center">
                        <i class="fas fa-shield-alt text-primary mb-2 fs-4"></i>
                        <div class="fw-bold">Garansi Kualitas</div>
                        <small class="text-muted">Jaminan kepuasan 100% atau uang kembali</small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card-partner rounded p-4 text-center">
                        <i class="fas fa-leaf text-primary mb-2 fs-4"></i>
                        <div class="fw-bold">Ramah Lingkungan</div>
                        <small class="text-muted">Deterjen eco-friendly dan proses hemat air</small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-partner rounded p-4 text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2 fs-4"></i>
                        <div class="fw-bold">Aplikasi Mobile</div>
                        <small class="text-muted">Pesan dan tracking mudah via smartphone</small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-partner rounded p-4 text-center">
                        <i class="fas fa-award text-primary mb-2 fs-4"></i>
                        <div class="fw-bold">Teknologi Modern</div>
                        <small class="text-muted">Mesin cuci premium dan teknik terdepan</small>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card-partner rounded p-4 text-center">
                        <i class="fas fa-users text-primary mb-2 fs-4"></i>
                        <div class="fw-bold">Tim Profesional</div>
                        <small class="text-muted">Staff berpengalaman dan terlatih</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5" wire:ignore>
        <div class="container py-4">
            <div class="title-testimony mb-4">
                <h2 class="fw-bold">Cara Transaksi LaundryMu</h2>
                <p>Proses laundry yang mudah dan praktis dalam 4 langkah sederhana.</p>
            </div>
            <div id="owl-two" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage d-flex selft-align-stretch">

                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-mobile-android-alt fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Pesan Online</h5>
                                    <p class="card-text mb-4">
                                        Pesan layanan laundry melalui website atau aplikasi mobile kami. Pilih paket
                                        yang sesuai kebutuhan Anda.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-store fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Menuju Toko</h5>
                                    <p class="card-text mb-4">
                                        Tim kami akan memproses sesuai layanan yang anda pilih ,datang ke lokasi
                                        yang sudah tertera untuk melanjutkan proses.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-recycle fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Proses Laundry</h5>
                                    <p class="card-text mb-4">
                                        Pakaian Anda akan diproses dengan teknologi modern dan deterjen
                                        berkualitas tinggi oleh tim profesional.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-analytics fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Tracking</h5>
                                    <p class="card-text mb-4">
                                        Anda dapat melihat setatus pemesanan laundry anda pada applikasi laundrymu
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-truck-container fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Pengantaran</h5>
                                    <p class="card-text mb-4">
                                        Pakaian bersih dan wangi akan diantarkan kembali ke alamat Anda dalam
                                        kondisi rapi dan siap pakai.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-item align-self-stretch">
                            <div class="card-how-item">
                                <div class="card-body text-center">
                                    <div class="card-how text-purple">
                                        <i class="fad fa-box-check fa-4x fa-fw"></i>
                                    </div>
                                    <h5 class="fw-bold mb-2">Selesai</h5>
                                    <p class="card-text mb-4">
                                        Pemesanan anda telah selesai dan dapat dilakukan pengecekan
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="owl-nav">
                    <div class="owl-prev customPrevBtn">prev</div>
                    <div class="owl-next customNextBtn">next</div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('scripts')
    <script src="{{ url('/assets/dist/js/pages/home.js') }}"></script>
@endpush
