<div>

    <div class="py-5">

        <div class="container mb-5">
            <div class="ratio ratio-21x4">
                <img src="{{ url('/images/pages/product/banner/printend.jpg') }}" alt="banner-product"
                    class="img-fluid object-fit rounded">
            </div>
        </div>

        <div class="container mb-5">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div>
                    <h3 class="fw-bold mb-0">Produk Terlaris</h3>
                    <p class="mb-0">Buruan belanja produk terbaik di laundrymu</p>
                </div>
                <a href="#" class="link-primary">Lihat Detail <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-2 product">
                @foreach ($bestSeller as $index => $item)
                    <div class="col">
                        <div class="card">
                            <img src="/images/product/{{ $item->images }}" alt=""
                                class="card-img-top ratio ratio-1x1"
                                style="object-fit: cover; object-position: center;">
                            <div class="card-body p-2">
                                <p class="product-title">{{ $item->title }}</p>
                                <p class="text-danger mb-2">Rp {{ number_format($item->price, 0, ',', '.') }}
                                </p>
                                <a href="#" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="container">
            <div class="row g-4">

                <div class="col-12 col-md-3 col-lg-2">
                    <div class="d-flex gap-2 align-items-center">
                        <i class="fas fa-bars fa-sm fa-fw"></i>
                        <span>Kategori</span>
                    </div>
                    <hr class="soft">
                    <nav class="nav flex-column">
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </nav>
                </div>

                <div class="col-12 col-md-9 col-lg-10">
                    <div
                        class="d-flex gap-2 py-2 px-3 rounded align-items-center justify-content-between mb-4 bg-gray-220">
                        <div class="">
                            <select name="filter" id="filter" class="form-select">
                                <option value="price-desc">Harga : Tinggi ke Rendah</option>
                                <option value="price-asc">Harga : Rendah ke Tinggi</option>
                            </select>
                        </div>
                        <div>
                            <div class="position-relative">
                                <input type="text" class="form-control pe-5" placeholder="Search...">
                                <button class="btn border-0 position-absolute top-0 end-0 px-3" type="button"
                                    id="button-addon2">
                                    <i class="fas fa-search fa-sm fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-2 product">
                        @foreach ($commerce as $index => $item)
                            <div class="col">
                                <div class="card">
                                    <img src="/images/product/{{ $item->images }}" alt=""
                                        class="card-img-top ratio ratio-1x1"
                                        style="object-fit: cover; object-position: center;">
                                    <div class="card-body p-2">
                                        <p class="product-title">{{ $item->title }}</p>
                                        <p class="text-danger mb-2">Rp {{ number_format($item->price, 0, ',', '.') }}
                                        </p>
                                        <a href="#" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>



    </div>


    <div class="pt-5 pb-4 py-md-5 rounded-top-12 bg-white" wire:ignore>
        <div class="container pt-2 pb-5">
            <div class="d-block mb-5">
                <h2 class="fw-bold mb-0">Produk Laundry</h2>
                <p class="mb-0">Lorem ipsum sint excepturi architecto
                    voluptatibus praesentium unde voluptas animi.</p>
            </div>

            {{-- <div class="d-block d-md-none"> --}}
            <div id="owl-one" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage d-flex">

                        @foreach ($laundry as $index => $item)
                            <div class="owl-item d-flex align-self-stretch">
                                <div class="card product-card">
                                    <img src="{{ url('/images/product/' . $item->images) }}" alt="{{ $item->images }}"
                                        class="ratio ratio-4x3 img-fluid"
                                        style="object-fit: cover; object-position: center;">

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
                                                    <span class="fw-bold fs-1">{{ number_format($item->price) }}</span>
                                                    <span class="fs-4 mb-1">/Kg</span>
                                                </div>
                                            @else
                                                <div class="d-flex align-items-end" style="padding-top: 2rem">
                                                    <span class="fs-4 mb-1">Rp.</span>
                                                    <span class="fw-bold fs-1">{{ number_format($item->price) }}</span>
                                                    <span class="fs-4 mb-1">/Kg</span>
                                                </div>
                                            @endif
                                        </div>
                                        <input type="text" name="product_id" class="d-none"
                                            value="{{ $item->product_id }}">
                                        <button type="button" wire:click='orderL({{ $item->product_id }})'
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

</div>


@push('scripts')
    <script>
        $('#owl-one').owlCarousel({
            // margin: 24,
            merge: true,
            autoWidth: true,
            dots: false,
            responsive: {
                0: {
                    loop: true,
                    margin: 18,
                    center: true,
                },
                768: {
                    margin: 24,
                },
            }
        });

        var owl = $('#owl-two');
        owl.owlCarousel({
            items: 1,
            loop: false,
            margin: 24,
            dots: false,
            autowidth: true,
            responsive: {
                480: {
                    items: 2
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 4,
                },

            }
        })
        $('.customNextBtn').click(function() {
            owl.trigger('next.owl.carousel');
        })
        $('.customPrevBtn').click(function() {
            owl.trigger('prev.owl.carousel', [300]);
        })
    </script>
@endpush
