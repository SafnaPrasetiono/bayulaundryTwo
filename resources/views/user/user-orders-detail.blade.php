<div>

    @push('style')
        <style>
            .progress-percen-25 {
                width: 25%;
            }

            .progress-percen-50 {
                width: 50%;
            }

            .progress-percen-75 {
                width: 75%;
            }

            .progress-percen-100 {
                width: 100%;
            }
        </style>
    @endpush

    <div class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-3 d-none d-lg-block">
                    @include('user.user-menu')
                </div>

                <div class="col-12 col-lg-9">
                    <div class="d-block bg-white rounded border">
                        <div class="d-flex justify-content-between align-items-center mb-2 px-3 py-2 border-bottom">
                            <small>
                                <div class="text-sm text-secondary">No. Invoice</div>
                                <div class="font-semibold text-blue-600">{{ $order->invoice }}</div>
                            </small>
                            <div>
                                <span
                                    class="badge p-2 
                                {{ $order->status == 'pending'
                                    ? 'text-bg-warning'
                                    : ($order->status == 'waiting'
                                        ? 'text-bg-info'
                                        : ($order->status == 'process'
                                            ? 'text-bg-primary'
                                            : ($order->status == 'pickup'
                                                ? 'text-bg-info'
                                                : ($order->status == 'completed'
                                                    ? 'text-bg-success'
                                                    : 'text-bg-secondary')))) }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>
                        <div class="p-5 mb-5">
                            <div class="position-relative m-4">
                                <div class="progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"
                                    style="height: 4px;">
                                    <div
                                        class="progress-bar bg-success @if ($order->status == 'pending') w-0 @elseif($order->status == 'waiting') w-25 @elseif($order->status == 'process') w-50 @elseif($order->status == 'pickup') w-75 @elseif($order->status == 'completed') w-100 @else w-0 @endif">
                                    </div>
                                </div>
                                <div class="bg-white @if (in_array($order->status, ['waiting', 'pending', 'process', 'completed', 'pickup'])) border-success text-success @else border-secondary text-secondary @endif position-absolute top-0 translate-middle rounded-pill d-flex align-items-center justify-content-center"
                                    style="border: 3px solid; width: 4rem; height:4rem; left:   0%;">
                                    <i class="fad fa-receipt fa-lg fa-fw"></i>
                                </div>
                                <small class="position-absolute translate-middle fw-bold text-secondary"
                                    style="top: 50px; left: 0%">
                                    Pesanan dibuat
                                </small>
                                <div class="bg-white @if (in_array($order->status, ['waiting', 'process', 'completed', 'pickup'])) border-success text-success @else border-secondary text-secondary @endif position-absolute top-0 translate-middle rounded-pill d-flex align-items-center justify-content-center"
                                    style="border: 3px solid; width: 4rem; height:4rem; left:  25%;">
                                    <i class="fad fa-sack-dollar fa-lg fa-fw"></i>
                                </div>
                                <small class="position-absolute translate-middle fw-bold text-secondary"
                                    style="top: 50px; left: 25%">
                                    Menunggu pembayaran
                                </small>
                                <div class="bg-white @if (in_array($order->status, ['process', 'completed', 'pickup'])) border-success text-success @else border-secondary text-secondary @endif position-absolute top-0 translate-middle rounded-pill d-flex align-items-center justify-content-center"
                                    style="border: 3px solid; width: 4rem; height:4rem; left:  50%;">
                                    <i class="fad fa-sync-alt fa-lg fa-fw"></i>
                                </div>
                                <small class="position-absolute translate-middle fw-bold text-secondary"
                                    style="top: 50px; left: 50%">
                                    Sedang diproses
                                </small>
                                <div class="bg-white @if (in_array($order->status, ['completed', 'pickup'])) border-success text-success @else border-secondary text-secondary @endif position-absolute top-0 translate-middle rounded-pill d-flex align-items-center justify-content-center"
                                    style="border: 3px solid; width: 4rem; height:4rem; left:  75%;">
                                    <i class="fad fa-people-carry fa-lg fa-fw"></i>
                                </div>
                                <small class="position-absolute translate-middle fw-bold text-secondary"
                                    style="top: 50px; left: 75%">
                                    Pesanan siap diambil
                                </small>
                                <div class="bg-white @if ($order->status == 'completed') border-success text-success @else border-secondary text-secondary @endif position-absolute top-0 translate-middle rounded-pill d-flex align-items-center justify-content-center"
                                    style="border: 3px solid; width: 4rem; height:4rem; left: 100%;">
                                    <i class="fad fa-box-check fa-lg fa-fw"></i>
                                </div>
                                <small class="position-absolute translate-middle fw-bold text-secondary"
                                    style="top: 50px; left: 100%">
                                    Selesai
                                </small>
                            </div>
                        </div>
                        <div class="d-block p-3 mb-3 border-secondary"
                            style="border-top: 2px dashed; border-bottom: 2px dashed;">
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="fs-5">Alamat Pengiriman</p>
                                <small class="lh-0 text-secondary text-end">
                                    <div>{{ $shipment->courier }}</div>
                                    <div>{{ $shipment->tracking_number }}</div>
                                    <div>{{ $shipment->status }}</div>
                                </small>
                            </div>
                            <small>
                                <div class="fw-bold">{{ $shipment->recipient_name }}</div>
                                <div class="text-secondary mb-3">{{ $shipment->recipient_phone }}</div>
                                <div>
                                    <div class="text-secondary text-uppercase m-0">
                                        {{ $shipment->address_line }}
                                    </div>
                                    <div class="text-secondary m-0">
                                        <span>{{ $shipment->village }} </span>
                                        <span>{{ $shipment->districts }}, </span>
                                        <span>{{ $shipment->regencies }}, </span>
                                        <span>{{ $shipment->province }}, </span>
                                        <span>{{ $shipment->postal_code }} </span>
                                    </div>
                                </div>
                            </small>
                        </div>
                        <div class="p-3">
                            <p class="fs-5">Detail Pesanan</p>
                            @foreach ($items as $item)
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <img src="/images/product/{{ $item->images }}" alt="{{ $item->images }}"
                                        class="img-fluid" width="92px" height="92px">
                                    <div class="lh-1">
                                        <div>{{ $item->title }}</div>
                                        <small class="text-secondary">(x{{ $item->qty }})</small>
                                        <div class="text-xs text-gray-500">{{ $item->note }}</div>
                                    </div>
                                    <div class="text-end ms-auto">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <table class="table table-bordered rounded-0 m-0">
                            <tbody>
                                <tr class="fw-light text-end ">
                                    <td style="font-size: 0.8rem">Subtotal Pesanan</td>
                                    <td style="width: 13rem">
                                        Rp{{ number_format($order->items->sum('total'), 0, ',', '.') }}</td>
                                </tr>
                                <tr class="fw-light text-end ">
                                    <td style="font-size: 0.8rem">Subtotal Pengiriman</td>
                                    <td style="width: 13rem">Rp{{ number_format(0, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="fw-light text-end ">
                                    <td style="font-size: 0.8rem">Biaya Layanan</td>
                                    <td style="width: 13rem">Rp{{ number_format(0, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="fw-light text-end ">
                                    <td style="font-size: 0.8rem">Total Harga</td>
                                    <td style="width: 13rem" class="text-danger fs-4">
                                        Rp{{ number_format($order->items->sum('total'), 0, ',', '.') }}</td>
                                </tr>
                                <tr class="fw-light text-end">
                                    <td style="font-size: 0.8rem">Metode Pembayaran</td>
                                    <td style="width: 13rem">{{ $order->payment_method }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
