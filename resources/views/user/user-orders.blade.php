<div>
    <div class="py-5">
        <div class="container">

            <div class="row">
                <div class="col-12 col-lg-3 d-none d-lg-block">
                   @include('user.user-menu')
                </div>

                <div class="col-12 col-lg-9">
                    <div class="d-block overflow-hidden">
                        <h2 class="text-xl font-bold mb-4">🛍️ Pesanan Saya</h2>
                        <hr class="soft">
                        @forelse ($orders as $order)
                            <div class="d-block border rounded mb-4 shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-2 px-3 py-2 border-bottom">
                                    <small>
                                        <div class="text-sm text-secondary">No. Invoice</div>
                                        <div class="font-semibold text-blue-600">{{ $order->invoice }}</div>
                                    </small>
                                    <div>
                                         @if ($order->status == 'pending')
                                            <span class="badge text-bg-warning">Pending</span>
                                        @elseif($order->status == 'waiting')
                                            <span class="badge text-bg-info">Menunggu Pembayaran</span>
                                        @elseif($order->status == 'process')
                                            <span class="badge text-bg-primary">Sedang diproses</span>
                                        @elseif($order->status == 'completed')
                                            <span class="badge text-bg-success">Selesai</span>
                                        @elseif($order->status == 'reviewd')
                                            <span class="badge text-bg-secondary">reviewd</span>
                                        @endif
                                    </div>
                                </div>
                
                                <div class="position-relative">
                                    @foreach ($order->items as $item)
                                        <div class="d-flex align-items-center gap-3 mb-1 py-2 px-3">
                                            <img src="/images/product/{{$item->images}}" alt="{{$item->images}}" class="img-fluid" width="92px" height="92px">
                                            <div class="lh-1">
                                                <div>{{ $item->title }}</div>
                                                <small class="text-secondary">(x{{ $item->qty }})</small>
                                                <div class="text-xs text-gray-500">{{ $item->note }}</div>
                                            </div>
                                            <div class="text-end ms-auto">
                                                Rp {{ number_format($item->total, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    @endforeach
                                    <a href="{{route('user.orders.detail', ['inv' => $order->invoice])}}" class="stretched-link"></a>
                                </div>
                
                                <div class="d-flex align-items-center justify-content-between border-top text-end p-3">
                                    <small><i class="fad fa-calendar fa-sm me-2" aria-hidden="true"></i>{{ date('d F Y', strtotime($order->order_date)) }}</small>
                                    <div>
                                        <span class="me-2">Total Pesanan:</span> 
                                        <span class="text-danger fs-5">
                                            Rp{{ number_format($order->items->sum('total'), 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-gray-500">Belum ada pesanan 🤗</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
