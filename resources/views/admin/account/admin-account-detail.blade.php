<div>
    <div class="container-fluid">
        <div class="d-block p-3 mb-3">
            <h2 class="text-them fw-bold mb-0">Account Create</h2>
            <p class="text-them-sec mb-0">Membuat account laudry baruku</p>
        </div>

        <div>
            <div class="d-block rounded bg-white p-3 mb-3">
                <div class="row gx-5">
                    <div class="col-12 col-md-7 col-lg-7">
                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label for="#" class="form-label">Username</label>
                                <input type="text" name="username" wire:model='username'
                                    class="form-control  @error('username') is-invalid @enderror" disabled>
                            </div>

                            <div class="col-12">
                                <label for="#" class="form-label">Email</label>
                                <input type="email" name="email" wire:model='email'
                                    class="form-control  @error('email') is-invalid @enderror" disabled>
                            </div>

                            <div class="col-12">
                                <div class="d-flex gap-2">
                                    <div class="flex-fill">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select name="gender" id="gender" wire:model='gender'
                                            class="form-select @error('gender') is-invalid @enderror" disabled>
                                            <option value="" disabled selected>Pilih status</option>
                                            <option value="m">Pria</option>
                                            <option value="f">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="flex-fill">
                                        <label for="born" class="form-label">Tanggal Lahir</label>
                                        <input type="date" id="born" name="born" wire:model='born'
                                            class="form-control  @error('born') is-invalid @enderror" disabled>
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
                                                class="form-control  @error('phone') is-invalid @enderror" disabled>
                                        </div>
                                    </div>
                                    <div class="flex-fill">
                                        <label for="is_active" class="form-label">Status</label>
                                        <select name="is_active" id="is_active" wire:model='is_active' disabled
                                            class="form-select @error('is_active') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Non Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="#" class="form-label">Alamat</label>
                            <textarea name="address" id="address" rows="4" wire:model='address' disabled
                                class="form-control  @error('address') is-invalid @enderror"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5">
                         <div for="images" class="border rounded ratio ratio-4x3 image-upload"
                                        style="background-image: url('/images/admins/{{ $avatar }}')">
                                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
