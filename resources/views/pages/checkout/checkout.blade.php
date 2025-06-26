<div>
    <div class="py-5">
        <div class="container">

            <div class="mb-4">
                <h2 class="">Checkout</h2>
                <p>Berikut detail pemesanan produk anda</p>
            </div>
            <hr class="soft">

            {{-- ADDRESS --}}
            @livewire('pages.checkout.address')

            {{-- PRODUCT --}}
            @if (session('cart'))
                <div class="d-block rounded border mb-5" id="address">
                    <div class="d-flex gap-2 align-items-center p-3">
                        <i class="fas fa-box fa-sm fa-fw"></i>
                        <h5 class="fw-bold m-0">Pesanan Produk</h5>
                    </div>
                    <hr class="soft my-0">
                    <div class="table-responsive d-none d-md-block p-3">
                        <table class="table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-truncate text-end">Harga Satuan</th>
                                    <th class="text-truncate text-end">Jumlah</th>
                                    <th class="text-truncate text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach (session('cart') as $item)
                                    <?php $total += $item['price'] * $item['qty']; ?>
                                    <tr class="">
                                        <td class="text-truncate w-50">
                                            <div class="d-flex align-items-center gap-2 ">
                                                <img src="/images/product/{{ $item['images'] }}"
                                                    alt="{{ $item['images'] }}" class="img-fluid rounded"
                                                    width="92px">
                                                <p class="text-truncate fs-5 m-0">{{ $item['title'] }}</p>
                                            </div>
                                        </td>
                                        <td class="text-truncate text-end">Rp. {{ number_format($item['price']) }}</td>
                                        <td class="text-truncate text-end">{{ $item['qty'] }}</td>
                                        <td class="text-truncate text-end">
                                            Rp. {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex gap-5 align-items-center justify-content-end">
                                            <small>Total Pesanan ({{ count(session('cart')) }} Produk):</small>
                                            <p class="fs-5 fw-bold mb-0 text-success">Rp.
                                                {{ number_format($total, 0, ',', '.') }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-block d-md-none p-3">

                        @foreach (session('cart') as $item)
                            <div class="cart d-flex mb-3 gap-2">
                                <img src="/images/product/{{ $item['images'] }}" alt="{{ $item['images'] }}"
                                    class="img-fluid rounded" width="92px">

                                <div class="d-flex flex-column flex-fill justify-content-start">
                                    <p class="text-truncate m-0">{{ $item['title'] }}</p>
                                    <small class="">
                                        <span class="mb-0">Rp. {{ number_format($item['price']) }}</span>
                                        <span class="ms-auto text-secondary">x{{ $item['qty'] }}</span>
                                    </small>
                                </div>
                            </div>
                        @endforeach

                        <hr class="soft">
                        <div class="d-flex gap-5 align-items-center justify-content-between">
                            <small>Total Pesanan ({{ count(session('cart')) }} Produk):</small>
                            <p class="fs-6 fw-bold mb-0 text-success">Rp.
                                {{ number_format($total, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @elseif (session('cartLaundry'))
                <div class="d-block rounded border mb-5" id="address">
                    <div class="d-flex gap-2 align-items-center p-3">
                        <i class="fas fa-box fa-sm fa-fw"></i>
                        <h5 class="fw-bold m-0">Pesanan Produk</h5>
                    </div>
                    <hr class="soft my-0">
                    <div class="table-responsive d-none d-md-block p-3">
                        <table class="table align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th class="text-truncate text-end">Harga Satuan</th>
                                    <th class="text-truncate text-end">Jumlah</th>
                                    <th class="text-truncate text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0; ?>
                                @foreach (session('cartLaundry') as $item)
                                    <?php $total += $item['price'] * $item['qty']; ?>
                                    <tr class="">
                                        <td class="text-truncate w-50">
                                            <div class="d-flex align-items-center gap-2 ">
                                                <img src="/images/product/{{ $item['images'] }}"
                                                    alt="{{ $item['images'] }}" class="img-fluid rounded"
                                                    width="120px">
                                                <p class="text-truncate fs-5 m-0">{{ $item['title'] }}</p>
                                            </div>
                                        </td>
                                        <td class="text-truncate text-end">Rp. {{ number_format($item['price']) }}</td>
                                        <td class="text-truncate text-end">{{ $item['qty'] }}</td>
                                        <td class="text-truncate text-end">
                                            Rp. {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex gap-5 align-items-center justify-content-end">
                                            <small>Total Pesanan ({{ count(session('cartLaundry')) }} Produk):</small>
                                            <p class="fs-5 fw-bold mb-0 text-success">Rp.
                                                {{ number_format($total, 0, ',', '.') }}</p>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="d-block d-md-none p-3">

                        @foreach (session('cartLaundry') as $item)
                            <div class="cart d-flex mb-3 gap-2">
                                <img src="/images/product/{{ $item['images'] }}" alt="{{ $item['images'] }}"
                                    class="img-fluid rounded" width="92px">

                                <div class="d-flex flex-column flex-fill justify-content-start">
                                    <p class="text-truncate m-0">{{ $item['title'] }}</p>
                                    <small class="">
                                        <span class="mb-0">Rp. {{ number_format($item['price']) }}</span>
                                        <span class="ms-auto text-secondary">x{{ $item['qty'] }}</span>
                                    </small>
                                </div>
                            </div>
                        @endforeach

                        <hr class="soft">
                        <div class="d-flex gap-5 align-items-center justify-content-between">
                            <small>Total Pesanan ({{ count(session('cartLaundry')) }} Produk):</small>
                            <p class="fs-6 fw-bold mb-0 text-success">Rp.
                                {{ number_format($total, 0, ',', '.') }}</p>
                        </div>

                    </div>
                </div>
            @endif

            {{-- PENGIRIMAN --}}
            @if (session('cart'))
                @livewire('pages.checkout.shipment-method')
            @endif

            {{-- METHOD_PAYMENT --}}
            @if (session('cartLaundry'))
                <div class="d-block rounded shadow mb-5">
                    <div class="d-flex gap-2 align-items-center justify-content-between p-3">
                        <h5 class="fw-bold m-0">
                            <i class="fas fa-money-bill fa-sm fa-fw"></i>
                            <span>Metode Pembayaran</span>
                        </h5>
                    </div>
                    <hr class="soft my-0">
                    <div class="d-block">
                        <div class="alert alert-success rounded-0" role="alert">
                            <h4 class="alert-heading">Info Pembayaran!</h4>
                            <p>Metode pembayaran laundry hanya bisa dilakukan secara langsung data ke toko setelah
                                dilakukan perhitungan berat laundry pakaian kamu.</p>
                        </div>
                    </div>
                </div>
            @else
                @livewire('pages.checkout.payment-method')
            @endif

            {{-- DETAIL HARGA --}}
            @if (session('cart'))
                <div class="d-flex flex-column justify-content-end align-items-end">
                    <!-- Kanan: Ringkasan -->
                    <div class="col-12 col-md-5">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="mb-0">Ringkasan</h5>
                            </div>
                            <div class="card-body">
                                <p class="d-flex justify-content-between fw-bold">
                                    <span>Total Harga</span>
                                    <span>Rp. {{ number_format($total, 0, ',', '.') }}</span>
                                </p>
                                <div class="d-grid">
                                    <a href="#" class="btn btn-outline-success btn-lg px-5">Buat Pesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(session('cartLaundry'))
                <div class="d-flex flex-column justify-content-end align-items-end">
                    <!-- Kanan: Ringkasan -->
                    <div class="col-12 col-md-5">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="mb-0">Ringkasan</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-grid">
                                    <button type="button" wire:click='checkoutLaundry' class="btn btn-outline-success btn-lg px-5">Buat Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
</div>
