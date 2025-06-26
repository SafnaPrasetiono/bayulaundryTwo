<div>
    <div class="container-fluid">

        <div class="d-block p-3 mb-2">
            <h2 class="text-them fw-bold mb-0">Detail Order Laundry</h2>
            <p class="text-them-sec mb-0">Selamat datang kembali di aplikasi laundryku</p>
        </div>

        <div class="d-block bg-white rounded p-3 mb-3">
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
                    <div class="progress" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 4px;">
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
            <div class="d-block p-3 mb-3 border-secondary" style="border-top: 2px dashed; border-bottom: 2px dashed;">
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
                        <img src="/images/product/{{ $item->images }}" alt="{{ $item->images }}" class="img-fluid"
                            width="92px" height="92px">
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
            <table class="table table-bordered rounded-0 m-0 mb-4">
                <tbody>
                    <tr class="fw-light text-end ">
                        <td style="font-size: 0.8rem">Subtotal Pesanan</td>
                        <td style="width: 13rem">Rp{{ number_format($order->items->sum('total'), 0, ',', '.') }}</td>
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

        @if (count($payment) != 0)
            <div class="d-block bg-white rounded p-3 mb-3">
                <p class="fs-5">Pembayaran</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Date</th>
                            <th>Harga</th>
                            <th>Bayar</th>
                            <th>Sisa Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $bayars = 0; ?>
                        <?php $harga = $order->amount; ?>
                        @foreach ($payment as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->invoice }}</td>
                                <td>{{ $item->date }}</td>
                                <td>Rp {{ number_format($harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($item->amount, 0, ',', '.') }}</td>
                                <?php $bayars += $item->amount; ?>
                                <?php $harga = $order->amount - $bayars; ?>
                                <td>Rp {{ number_format($harga, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <td colspan="3">Total dibayarkan</td>
                            <td>Rp {{number_format($payment->sum('amount'), 0,',', '.')}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Harus dibayarkan</td>
                            <td>Rp {{number_format($order->amount, 0, ',', '.')}}</td>
                        </tr>
                        <tr>
                            <td colspan="3">Sisa Pembayaran</td>
                            <td>Rp {{number_format(($order->amount - $payment->sum('amount')), 0, ',', '.') }}</td>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
        @endif


        <div class="d-block bg-white rounded p-3 mb-3">
            <div class="d-flex gap-3 justify-content-end">
                @if ($order->status == 'pending')
                    <button type="button" class="btn btn-warning px-3" data-bs-toggle="modal"
                        data-bs-target="#ModalUpdated">Update</button>
                @elseif ($order->status == 'waiting')
                    <button type="button" class="btn btn-info px-3" data-bs-toggle="modal"
                        data-bs-target="#ModalPayment">Payment</button>
                @elseif ($order->status == 'process')
                    <button type="button" class="btn btn-success px-3" wire:click='complete'>Completed</button>
                @elseif ($order->status == 'pickup')
                    @if (count($payment) != 0)
                        @if ($payment->sum('amount') != $order->amount)
                            <button type="button" class="btn btn-info px-3" data-bs-toggle="modal"
                                data-bs-target="#ModalPayment">Pelunasan</button>
                        @else
                            <button type="button" class="btn btn-success px-3"
                                wire:click='completed'>Completed</button>
                        @endif
                    @endif
                @endif
                @if ($order->status != 'completed')
                    <button type="button" class="btn btn-secondary px-3">cancle</button>
                @endif
            </div>
        </div>

    </div>



    <div class="modal fade" id="ModalUpdated" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Change Weight Order Laundry</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="weight" class="form-label">Invoice</label>
                        <input type="text" class="form-control" value="{{ $order->invoice }}" disabled>
                    </div>
                    @foreach ($items as $item)
                        <div class="mb-3">
                            <label for="weight" class="form-label">Product</label>
                            <div class="form-control disable">
                                <div>{{ $item->title }}</div>
                                <div>{{ number_format($item->price, 0, ',', '.') }}</div>
                            </div>
                        </div>
                    @endforeach
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" wire:model.live='weight' id="weight">
                        <label class="input-group-text" for="weight">.Kg</label>
                    </div>
                    <div class="mb-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Harga Product</td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Berat Product</td>
                                    <td>{{ $weight }}</td>
                                </tr>
                                <tr>
                                    <td>Total Harga Product</td>
                                    <td>{{ number_format($item->price * $weight, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    @php
                        $this->amount = $item->price * $weight;
                    @endphp
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='save'>Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="ModalPayment" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="weight" class="form-label">Invoice</label>
                        <input type="text" class="form-control" value="{{ $order->invoice }}" disabled>
                    </div>
                    @foreach ($items as $item)
                        <div class="mb-3">
                            <label for="weight" class="form-label">Product</label>
                            <div class="form-control disable">
                                <div>{{ $item->title }}</div>
                                <div>{{ number_format($item->price, 0, ',', '.') }} <small>x
                                        {{ $item->qty }}</small> </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mb-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Total Harga Product</td>
                                    <td class="text-end">Rp {{ number_format($order->amount, 0, ',', '.') }}</td>
                                </tr>
                                @if (count($payment) != 0)
                                    <tr>
                                        <td>Sudah dibayarkan</td>
                                        <td class="text-end">Rp
                                            {{ number_format($payment->sum('amount'), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sisa yang harus dibayarkan</td>
                                        <td class="text-end">Rp
                                            {{ number_format($order->amount - $payment->sum('amount'), 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    <?php $this->buyer = $order->amount - $payment->sum('amount'); ?>
                                @else
                                    @if ($item->total >= $item->total - $buyer)
                                        <tr>
                                            <td>Sisa Pembayaran</td>
                                            <td class="text-end">Rp
                                                {{ number_format($item->total - $buyer, 0, ',', '.') }}</td>
                                        </tr>
                                    @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if ($order->status == 'waiting')
                        <div class="mb-3">
                            <label for="pay" class="form-label">Total Akan dibayar</label>
                            <input type="number" class="form-control" wire:model.live='buyer'>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='payment'>Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
