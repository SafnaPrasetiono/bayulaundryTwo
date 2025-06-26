<div>
    <div class="container-fluid">

        <div class="d-block p-3 mb-2">
            <h2 class="text-them fw-bold mb-0">Payment method</h2>
            <p class="text-them-sec mb-0">Selamat datang kembali di aplikasi laundryku</p>
        </div>

        <div class="d-block bg-white rounded p-3">
            <div class="form-tables mb-3">
                <div class="d-flex gap-2">
                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#createPaymentMethodModal">
                        <i class="fas fa-plus fa-sm fa-fw"></i>
                    </button>
                    @if ($selected != null)
                        <button class="btn btn-danger px-3" data-bs-toggle="modal"
                            data-bs-target="#ModalDeleteAllData">Delete</button>
                    @endif
                    <div class="ms-auto position-relative">
                        <input type="text" class="form-control me-4" placeholder="Search..." wire:model="search"
                            wire:keydown.enter="searchPush">
                        <button class="btn position-absolute border-0 top-0 end-0">
                            <i class="fas fa-search fa-sm fa-fw"></i>
                        </button>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="fas fa-filter fa-xs fa-fw"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end shadow border-0 p-0" style="width: 320px">
                            <div class="dropdown-head p-3 border-bottom">
                                <p class="fw-bold mb-0">Filter Table</p>
                            </div>
                            <div class="dropdown-body p-3">
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <label for="status" class="form-label">Status type</label>
                                    <select wire:model="status" name="status" class="form-select form-select-sm col-3"
                                        id="status" style="width: 120px">
                                        <option value="pending">PENDING</option>
                                        <option value="progress">PROGRESS</option>
                                        <option value="decline">DECLINE</option>
                                        <option value="done">FINISHED</option>
                                        <option value="" selected>All</option>
                                    </select>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-3">
                                    <label for="pages" class="form-label">Page of view</label>
                                    <select wire:model="pages" name="pages" class="form-select form-select-sm col-3"
                                        id="pages" style="width: 72px">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive mb-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-wrap">
                                <input type="checkbox" wire:model="selectedAll" wire:change="clickSelected"
                                    class="form-check-input">
                            </th>
                            <th class="text-them">Image</th>
                            <th class="text-them">payment_name</th>
                            <th class="text-them">type</th>
                            <th class="text-them">Status</th>
                            <th class="text-them">Date</th>
                            <th class="text-them"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <th class="text-wrap">
                                    <input type="checkbox" wire:model="selected" wire:change="clickSelectedOne"
                                        class="form-check-input" value="{{ $item->payment_method_id }}">
                                </th>
                                <th class="text-them">
                                    <div class="product-card-image ratio ratio-4x3 rounded"
                                        style="background-image: url('/{{ $item->logo }}')">
                                    </div>
                                </th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    @if ($item->is_active == 1)
                                        <span class="badge text-bg-success">Active</span>
                                    @elseif($item->is_active == 0)
                                        <span class="badge text-bg-secondary">Non Active</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td class="gap-1">
                                    <div class="dropstart">
                                        <button class="btn border-0" type="button" data-bs-toggle="dropdown">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw"></i>
                                        </button>
                                        <div class="dropdown-menu position-fixed border-0 shadow" style="width: 200px">
                                            <a class="dropdown-item link-black"
                                                href="#">
                                                <i class="fas fa-eye fa-sm me-3"></i> Detail
                                            </a>
                                            <a class="dropdown-item link-black"
                                                href="#">
                                                <i class="fas fa-pencil-alt fa-sm me-3"></i> Edit Data
                                            </a>
                                            <hr class="soft my-2 mx-2">
                                            <a class="dropdown-item link-secondary" href="">
                                                <i class="fas fa-share fa-sm me-3"></i> Share Link
                                            </a>
                                            <a class="dropdown-item link-secondary" href="">
                                                <i class="fas fa-download fa-sm me-3"></i> Download
                                            </a>
                                            <hr class="soft my-2 mx-2">
                                            <button class="dropdown-item"
                                                wire:click="DeleteAction({{ $item->payment_method_id }})">
                                                <i class="fas fa-trash fa-sm me-3"></i> Delete Data
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex">
                <div class="ms-auto">
                    {{ $data->links('admin.paginations.paginate') }}
                </div>
            </div>

        </div>

    </div>






    <!-- Modal -->
    <div class="modal fade" id="createPaymentMethodModal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content" wire:ignore.self>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Metode Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save">

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" wire:model.defer="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Kode</label>
                            <input type="text" class="form-control" wire:model.defer="code">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Tipe</label>
                            <select class="form-control" wire:model.defer="type">
                                <option value="">-- Pilih Tipe --</option>
                                <option value="bank">Bank</option>
                                <option value="ewallet">E-Wallet</option>
                                <option value="qris">QRIS</option>
                                <option value="va">Virtual Account</option>
                                <option value="other">Lainnya</option>
                            </select>
                            @error('type')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Logo (opsional)</label>
                            <input type="file" class="form-control" wire:model="logo">
                            @error('logo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            @if ($logo)
                                <img src="{{ $logo->temporaryUrl() }}" class="mt-2" width="80">
                            @endif
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" wire:model.defer="is_active"
                                id="is_active">
                            <label class="form-check-label" for="is_active">Aktif</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script>
        window.addEventListener('deleteModel', () => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch('DeleteActionGo');
                }
            });
        })
        window.addEventListener('payment-method-saved', () => {
            $('#createPaymentMethodModal').modal("hide");
        })
    </script>
</div>
