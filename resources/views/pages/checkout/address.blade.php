<div>
    <div class="d-d-block rounded border mb-4 mb-md-5" id="address">
        <div class="d-flex gap-2 align-items-center justify-content-between p-3">
            <h5 class="fw-bold m-0">
                <i class="fas fa-map-marker fa-sm fa-fw"></i>
                <span>Alamat</span>
            </h5>
            <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addressModal">Ubah</button>
        </div>
        <hr class="soft m-0">
        <div class="position-relative d-flex flex-column flex-md-row gap-2 gap-md-5 align-items-md-center px-3 py-4">
            <div class="d-block text-capitalize pe-2 fw-bold lh-1">
                <input class="d-none" name="" wire:model='address_id' value="{{ $selected->user_address_id }}">
                <p class="text-truncate mb-1">{{ $selected->username }}</p>
                <small class="text-secondary">{{ $selected->phone }}</small>
            </div>
            <p class="m-0 pe-md-5 me-md-5">
                <span class="text-uppercase">{{ $selected->detail }}</span>
                <br>
                <span>
                    <span>{{ $selected->village }} </span>
                    <span>{{ $selected->districts }}, </span>
                    <span>{{ $selected->regencies }}, </span>
                    <span>{{ $selected->province }}, </span>
                    <span>{{ $selected->postal_code }} </span>
                </span>
            </p>
            <div class="position-absolute position-md-relative top-0 top-md-50 end-0 m-4">
                <span class="badge text-bg-primary">Utama</span>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addressModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (count($data) === 0)
                        <div class="d-block border rounded ratio ratio-16x9">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <i class="fas fa-address-card fa-4x fa-fw"></i>
                                <span class="fw-bold fs-5">Tidak ada alamat!</span>
                                <span class="text-secondary">Anda belum menambahkan alamat</span>
                            </div>
                        </div>
                    @else
                        @foreach ($data as $index => $item)
                            <div class="position-relative">
                                <label class="btn d-block border rounded text-start lh-0 p-3 mb-3"
                                    for="radioAddress{{ $item->user_address_id }}">
                                    <div class="mb-2 lh-1">
                                        <p class="fw-bold m-0 text-capitalize">{{ $item->username }}</p>
                                        <small>{{ $item->phone }}</small>
                                    </div>
                                    <p class="text-secondary text-uppercase m-0">
                                        {{ $item->detail }}
                                    </p>
                                    <p class="text-secondary m-0">
                                        <span>{{ $item->village }} </span>
                                        <span>{{ $item->districts }}, </span>
                                        <span>{{ $item->regencies }}, </span>
                                        <span>{{ $item->province }}, </span>
                                        <span>{{ $item->postal_code }} </span>
                                    </p>
                                </label>
                                @if ($item->is_primary == true)
                                    <span class="bg-primary text-white position-absolute px-2 mb-1 bottom-0 end-0">
                                        <small>utama</small>
                                    </span>
                                @endif
                                <div class="btn-group dropstart position-absolute top-0 end-0 m-3">
                                    <input class="form-check-input" type="radio" name="radioAddress" wire:model='select'
                                        id="radioAddress{{ $item->user_address_id }}"
                                        value="{{ $item->user_address_id }}" @checked($item->is_primary == true)>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click='selectedAddress'>Gunakan Alamat</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('hiddenModal', function () {
            $('#addressModal').modal("hide");
        });
    </script>
</div>
