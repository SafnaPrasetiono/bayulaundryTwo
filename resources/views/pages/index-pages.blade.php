@push('style')
    
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


    <div class="pt-5 pb-4 py-md-5 rounded-top-12 bg-white" wire:ignore>
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
                                    <div class="product-card-image ratio ratio-4x3"
                                        style="background-image: url('/images/product/{{ $item->images }}')"></div>
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
                                        <button type="button" wire:click='order({{ $item->product_id }})' class="btn btn-outline-primary btn-lg w-100 mb-4">Pilih paket</button>
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

    <div class="py-5" style="background-color: rgb(240, 240, 240)">
        <div class="container">
            <div class="text-center py-3">
                <h1>Buruan Daftar Laundryku</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum quod eum reprehenderit, rerum ullam
                    culpa
                    hic ab placeat natus consectetur voluptates excepturi</p>
                <button class="btn btn-outline-primary btn-lg px-5">DAFTAR</button>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container mb-3">
            <div class="d-block mb-4">
                <h2 class="fw-bold mb-0">Produk Laundrymu</h2>
                <p class="mb-0">Laundrymu juga menyedikan produk laundry loh, yuk berbelanja produk sekarang</p>
            </div>
            <div class="row g-3 row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xxl-6">
                @foreach ($commerce as $index => $item)
                <div class="col">
                    <div class="card">
                        <img src="/images/product/{{$item->images}}" alt="" class="card-img-top ratio ratio-1x1" style="object-fit: cover; object-position: center;">
                        <div class="card-body p-2">
                            <p class="product-title">{{ $item->title }}</p>
                            <p class="text-danger">Rp {{number_format($item->price, 0, ',', '.')}}</p>
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

    <div class="py-5" style="background-color: rgb(240, 240, 240)">
        <div class="container pb-3">
            <div class="title-partner mb-4">
                <h5 class="fw-bold">Partner Laundryku</h5>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia at dicta enim quasi.</p>
            </div>
            <div class="row g-4">
                @for ($x = 0; $x < 8; $x++)
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="alert alert-secondary mb-0" role="alert">
                            A simple secondary alert—check it out!
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="py-5" wire:ignore>
        <div class="container py-4">
            <div class="title-testimony text-center mb-4">
                <h5 class="fw-bold">User Testimonial</h5>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia at dicta enim quasi.</p>
            </div>
            <div id="owl-two" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        @for ($i = 0; $i < 8; $i++)
                            <div class="owl-item">
                                <div class="card">
                                    <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                        <img class="rounded-circle mb-2"
                                            src="https://i.pinimg.com/736x/cb/4d/99/cb4d9904f620667d89ed35924d99909a.jpg"
                                            alt="profile" style="width: 46px; height: 46px">
                                        <p class="fw-bold mb-0">YourName</p>
                                        <div class="d-block">
                                            @for ($x = 0; $x < 5; $x++)
                                                <i class="fas fa-star fa-sm fa-fw text-warning"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="card-body pt-2 pb-4">
                                        <p class="card-text text-center">Lorem ipsum dolor sit amet consectetur
                                            adipisicing
                                            elit. Facere, officiis in, iusto illo, neque ipsa sed quisquam laborum
                                            expedita
                                            fuga delectus et esse autem vero harum ratione suscipit voluptatibus
                                            deserunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endfor
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
    <script src="{{url('/assets/dist/js/pages/home.js')}}"></script>
@endpush
