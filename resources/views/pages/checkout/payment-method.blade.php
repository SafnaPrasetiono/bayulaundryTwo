<div>
    <div class="d-block rounded shadow mb-5">
        <div class="d-flex gap-2 align-items-center justify-content-between p-3">
            <h5 class="fw-bold m-0">
                <i class="fas fa-money-bill fa-sm fa-fw"></i>
                <span>Metode Pembayaran</span>
            </h5>
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Ubah</button>
        </div>
        <hr class="soft my-0">
        <div class="d-block">

        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    @if (count($grouped) === 0)
                        <div class="d-block border rounded ratio ratio-16x9">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <i class="fas fa-address-card fa-4x fa-fw"></i>
                                <span class="fw-bold fs-5">Tidak ada alamat!</span>
                                <span class="text-secondary">Anda belum menambahkan alamat</span>
                            </div>
                        </div>
                    @else
                        <div class="accordion" id="methodPayment">
                            <?php $i = 0; ?>
                            @foreach ($grouped as $index => $itemed)
                                <?php $type = $itemed->first()->type; ?>
                                <h2 class="accordion-header">
                                    <button class="accordion-button  @if ($index != 0) collapsed @endif"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#{{ $type }}">
                                        {{ $type }}
                                    </button>
                                </h2>
                                <div class="accordion-item">
                                    <div id="{{ $type }}"
                                        class="accordion-collapse collapse @if ($index == 0) show @endif"
                                        data-bs-parent="#methodPayment">
                                        <div class="accordion-body p-0">
                                            <ul class="list-group list-group-flush">
                                                @foreach ($itemed as $item)
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <input class="form-check-input me-1" type="radio"
                                                            name="listGroupRadio" value="" id="radio-{{ $i }}"
                                                            checked>
                                                        <label class="form-check-label flex-fill" for="radio-{{ $i }}">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <img src="/{{ $item->logo }}" alt="bca" class="img-fluid" width="64px">
                                                                <span>{{ $item->name }}</span>
                                                            </div>
                                                        </label>
                                                    </li>
                                                    <?php $i++; ?>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='selectedAddress'>Gunakan Alamat</button>
                </div>
            </div>
        </div>
    </div>
</div>
