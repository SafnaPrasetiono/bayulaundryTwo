<div>
    <div class="container py-5">
        <div class="mb-4">
            <h2 class="">Keranjang</h2>
            <p>Berikut detail pemesanan produk anda</p>
        </div>


        @if (session('cart') || session('cartLaundry'))
            <div>
                <div class="row">

                    @if (session('cart'))
                        <div class="col-lg-8">
                            @foreach (session('cart') as $index => $item)
                                <div class="card mb-3 shadow-sm">
                                    <div class="row g-0 align-items-stretch">
                                        <div class="col-4 col-md-3">
                                            <div class="p-1">
                                                <img src="/images/product/{{ $item['images'] }}"
                                                    class="img-fluid rounded" alt="Produk">
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-9">
                                            <div class="flex flex-column py-3 px-2">
                                                <div class="mb-4">
                                                    <h5 class="card-title mb-1">{{ $item['title'] }}</h5>
                                                    @if ($item['discount'] != null && strtotime(date('Y-m-d')) < strtotime($item['dateDiscountEnd']))
                                                        <div class="mb-2">
                                                            <span class="text-decoration-line-through">
                                                                Rp. {{ number_format($item['discount_price']) }}
                                                            </span>
                                                            <span class="badge rounded-pill text-bg-primary">
                                                                Diskon {{ $item['discount'] }}%
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="d-flex gap-3 align-items-center">
                                                            <h5 class="fw-bold">
                                                                Rp. {{ number_format($item['price'], 0, ',', '.') }}
                                                                <small class="text-secondary">x
                                                                    {{ $item['qty'] }}</small>
                                                            </h5>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="d-flex position-absolute end-0 bottom-0 gap-2 m-3">
                                                    <div class="input-group input-group-sm" style="width: 130px">
                                                        <button class="btn btn-outline-secondary btn-sm" type="button"
                                                            id="button-addon1"
                                                            wire:click="plus({{ $item['product_id'] }})">
                                                            <i class="fas fa-plus fa-xs fa-fw"></i>
                                                        </button>
                                                        <input type="text" class="form-control text-center"
                                                            aria-describedby="button-addon1"
                                                            value="{{ $item['qty'] }}">
                                                        <button class="btn btn-outline-secondary btn-sm" type="button"
                                                            id="button-addon1"
                                                            wire:click="minus({{ $item['product_id'] }})">
                                                            <i class="fas fa-minus fa-xs fa-fw"></i>
                                                        </button>
                                                    </div>
                                                    <button class="btn btn-outline-danger btn-sm"
                                                        wire:click='removeCart({{ $item['product_id'] }})'>
                                                        <i class="fas fa-trash fa-sm fa-fw"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if (session('cartLaundry'))
                        <div class="col-lg-8">
                            @foreach (session('cartLaundry') as $index => $item)
                                <div class="d-flex gap-3 px-3 py-2 mb-3 border rounded shadow-sm position-relative align-items-center">
                                    <input class="form-check-input p-2" type="checkbox" value="{{$item['product_id']}}" id="defaultCheck1" wire:model.live='checkCartLaundry'>

                                    <div class="d-flex gap-2">
                                        <img src="/images/product/{{ $item['images'] }}" class="img-fluid"
                                            alt="Produk" width="120px" height="120px">

                                        <div class="">
                                            <h5 class="card-title mb-1">{{ $item['title'] }}</h5>
                                            @if ($item['discount'] != null && strtotime(date('Y-m-d')) < strtotime($item['dateDiscountEnd']))
                                                <div class="mb-2">
                                                    <span class="text-decoration-line-through">
                                                        Rp. {{ number_format($item['discount_price']) }}
                                                    </span>
                                                    <span class="badge rounded-pill text-bg-primary">
                                                        Diskon {{ $item['discount'] }}%
                                                    </span>
                                                </div>
                                            @else
                                                <div class="d-flex gap-3 align-items-center">
                                                    <h5 class="fw-bold">
                                                        Rp. {{ number_format($item['price'], 0, ',', '.') }}
                                                        <small class="text-secondary">x {{ $item['qty'] }}</small>
                                                    </h5>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="d-flex position-absolute end-0 bottom-0 gap-2 m-2">
                                            <div class="input-group input-group-sm" style="width: 130px">
                                                <button class="btn btn-outline-secondary btn-sm disabled" type="button"
                                                    id="button-addon1" wire:click="plusLaundry({{ $item['product_id'] }})">
                                                    <i class="fas fa-plus fa-xs fa-fw"></i>
                                                </button>
                                                <input type="text" class="form-control text-center"
                                                    aria-describedby="button-addon1" value="{{ $item['qty'] }}">
                                                <button class="btn btn-outline-secondary btn-sm disabled" type="button"
                                                    id="button-addon1" wire:click="minusLaundry({{ $item['product_id'] }})">
                                                    <i class="fas fa-minus fa-xs fa-fw"></i>
                                                </button>
                                            </div>
                                            <button class="btn btn-outline-danger btn-sm"
                                                wire:click='removeCartLaundry({{ $item['product_id'] }})'>
                                                <i class="fas fa-trash fa-sm fa-fw"></i>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @endif


                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="mb-0">Ringkasan Belanja</h5>
                            </div>
                            <div class="card-body">
                                <p class="d-flex justify-content-between">
                                    <span>Total Item</span>
                                    <span>{{ $items }}</span>
                                </p>
                                @if ($discount)
                                    <p class="d-flex justify-content-between">
                                        <span>Harga produk</span>
                                        <span>Rp. {{ number_format($discount_price, 0, ',', '.') }}</span>
                                    </p>
                                    <p class="d-flex justify-content-between text-danger">
                                        <span>Discount produk</span>
                                        <span>{{ $discount }}%</span>
                                    </p>
                                @endif
                                <hr class="soft">
                                <p class="d-flex justify-content-between fw-bold">
                                    <span>Total Harga</span>
                                    <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                                </p>
                                <hr>
                                <div class="d-grid">
                                    @if (count($checkCartLaundry) > 1)
                                    <a href="#" class="btn btn-success @disabled(count($checkCartLaundry) == 0)" wire:click="$dispatch('info', 'Laundry tidak bisa banyak!')">Order Sekarang</a>
                                    @else
                                    <a href="{{ route('checkout') }}" class="btn btn-success @disabled(count($checkCartLaundry) == 0)" >Order Sekarang</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="ratio ratio-21x9 border">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <i class="fas fa-shopping-basket fa-5x fa-fw"></i>
                    <p class="fw bold text-secondary fs-5">Belum ada belanjaan!</p>
                </div>
            </div>
        @endif
    </div>
</div>
