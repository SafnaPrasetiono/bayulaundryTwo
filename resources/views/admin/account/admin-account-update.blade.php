<div>
    <div class="container-fluid">
        <div class="d-block p-3 mb-3">
            <h2 class="text-them fw-bold mb-0">Account Update</h2>
            <p class="text-them-sec mb-0">Membuat account laudry baruku</p>
        </div>

        <form action="#" method="POST" enctype="multipart/form-data" wire:submit='update'>
            @csrf
            <div class="d-block rounded bg-white p-3 mb-3">
                <div class="row gx-5">
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label for="#" class="form-label">Username</label>
                                <input type="text" name="username" wire:model='username'
                                    class="form-control  @error('username') is-invalid @enderror">
                                @error('username')
                                    <span class="invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="#" class="form-label">Email</label>
                                <input type="email" name="email" wire:model='email'
                                    class="form-control  @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <div class="flex-fill">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" wire:model='gender'
                                            class="form-select @error('gender') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih status</option>
                                            <option value="m">Pria</option>
                                            <option value="f">Wanita</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback text-capitalize">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex-fill">
                                        <label for="born" class="form-label">Tanggal Lahir</label>
                                        <input type="date" id="born" name="born" wire:model='born'
                                            class="form-control  @error('born') is-invalid @enderror">
                                        @error('born')
                                            <span class="invalid-feedback text-capitalize">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <div class="flex-fill">
                                        <label for="phone" class="form-label">Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                            <input type="text" name="phone" id="phone" wire:model='phone'
                                                class="form-control  @error('phone') is-invalid @enderror">
                                        </div>
                                        @error('phone')
                                            <span class="d-block invalid-feedback text-capitalize">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="flex-fill">
                                        <label for="is_active" class="form-label">Status</label>
                                        <select name="is_active" id="is_active" wire:model='is_active'
                                            class="form-select @error('is_active') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Non Active</option>
                                        </select>
                                        @error('is_active')
                                            <span class="invalid-feedback text-capitalize">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="#" class="form-label">Alamat</label>
                            <textarea name="address" id="address" rows="4" wire:model='address'
                                class="form-control  @error('address') is-invalid @enderror"></textarea>
                            @error('address')
                                <span class="invalid-feedback text-capitalize">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="mb-3">
                            <label for="#" class="form-label">Upload Display Product</label>
                            <label for="images" class="border rounded ratio ratio-4x3 bs-secondary-bg-rgb"
                                style="cursor: pointer; background-color: #e9ecef">
                                @if ($images)
                                    <div for="images" class="border rounded ratio ratio-4x3 image-upload"
                                        style="background-image: url('{{ $images->temporaryUrl() }}')">
                                    </div>
                                @elseif($avatar)
                                    <div for="images" class="border rounded ratio ratio-4x3 image-upload"
                                        style="background-image: url('/images/admins/{{ $avatar }}')">
                                    </div>
                                @else
                                    <div
                                        class="d-flex flex-column align-self-center align-items-center justify-content-center">
                                        <i class="fas fa-upload fa-3x fa-fw mb-3"></i>
                                        <span class="fw-light">Upload Here...</span>
                                    </div>
                                @endif
                                <div class="justify-content-center align-items-center"
                                    style="background-color: #e9ecef75;" wire:loading.flex wire:target="images">
                                    <span class="loader"></span>
                                </div>
                            </label>
                        </div>
                        <div class="mb-3">
                            <input type="file" id="images" wire:model="images" name="images"
                                class="form-control @error('images') is-invalid @enderror"
                                placeholder="Upload imagess here...">
                            @error('images')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block rounded bg-white p-3 mb-3">
                <button type="submit" class="btn btn-outline-success">Save Account</button>
            </div>
        </form>
    </div>
</div>
