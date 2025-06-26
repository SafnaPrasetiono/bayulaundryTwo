<div>
    <div class="container-fluid mb-3">
        <div class="d-flex align-items-center p-3 bg-white rounded-3 border shadow-sm">
            {{-- <img src="{{ url('/images/admins/' . auth('admins')->user()->avatar) }}" alt="" width="64px" height="64px"> --}}
            <div class="img-profile" style="background-image: url('/images/admins/{{ auth('admins')->user()->avatar}}');"></div>
            <div class="ms-3">
                <p class="fs-4 fw-bold mb-0 text-capitalize">{{ auth('admins')->user()->username }}</p>
                <p class="mb-2">{{ auth('admins')->user()->email }}</p>
            </div>
        </div>
    </div>
    <div class="container-fluid mb-3">
        <div class="d-block bg-white rounded-3 border shadow-sm">
            <div class="d-flex align-items-center py-2 px-3 border-bottom">
                <p class="mb-0 fw-bold text-color">Profile Detail</p>
                <div class="dropstart ms-auto">
                    <button class="btn btn-sm" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-bars fa-sm fa-fw"></i>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @if($edit == false)
                        <li><button type="button" wire:click='edited' class="dropdown-item">Edit</button></li>
                        @else
                        <li><button type="button" wire:click='save' class="dropdown-item">Simpan Perubahan</button></li>
                        <li><button type="button" wire:click='cancle' class="dropdown-item">Batalkan Perubahan</button></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="p-3">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input wire:model='username' type="text" class="form-control" @if($edit==false) disabled
                                @endif>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input wire:model='email' type="email" id="emial" class="form-control disabled" disabled>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <div class="input-group">
                                <span class="btn border border-right-0" id="basic-addon1">+62</span>
                                <input wire:model='phone' type="text" id="phone" class="form-control"
                                    placeholder="phone" @if($edit==false) disabled @endif>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="born" class="form-label">Born</label>
                            <input wire:model='born' type="date" id="born" class="form-control" @if($edit==false)
                                disabled @endif>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea wire:model='address' name="address" id="address" class="form-control" rows="3"
                        @if($edit==false) disabled @endif></textarea>
                </div>
            </div>
        </div>
    </div>



     <div class="container-fluid">
        <div class="d-flex align-items-center bg-white rounded-3 border shadow-sm p-3">
            <div class="p-3" style="width: 270px">
                <img src="{{ url('/images/icons/password.png') }}" alt="" class="img-fluid">
            </div>
            <div class="ms-0 ms-md-4">
                <p class="fs-5 fw-bold text-color">Change your password account</p>
                <p class="text-secondary mb-0">Your Account</p>
                <p class="mb-4 text-color">{{ auth('admins')->user()->email }}</p>
                <button type="button" data-bs-toggle="modal" data-bs-target="#passwordModal" class="btn btn-outline-success rounded-0">Set Password</button>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="passwordModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mb-3 text-center py-3">
                        <img src="{{ url('/images/icons/password.png') }}" alt="" class="img-fluid w-50 mb-3">
                        <p class="fs-4 fw-bold text-color">Rubah Password</p>
                    </div>
                    <div class="mb-3">
                        <label for="question" class="form-label">Password</label>
                        <input wire:model='password' type="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="answer" class="form-label">Confirmasi password</label>
                        <input wire:model='confirmation' type="password" class="form-control @error('password') is-invalid @enderror">
                        @error('confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button wire:click='setup' type="button" class="btn btn-outline-success">Simpan</button>
                  </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('pModalShow', () => {
            $('#passwordModal').modal('show');
        });
        document.addEventListener('pModalExpand', () => {
            $('#passwordModal').modal('hide');
        });
        document.addEventListener('deleteConfrimed', function() {
            Swal.fire({
                    title: "Delete?",
                    text: "Are you sure to delete this q&a?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete!',
                    cancelButtonText: 'Tidak',
                })
                .then((next) => {
                    if (next.isConfirmed) {
                        Livewire.emit('deleteAction');
                    } else {
                        Swal.fire("Data anda tetap aman!");
                    }
                });
        })
    </script>
</div>