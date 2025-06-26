<div>
    <div class="container-fluid">
        <div class="d-block p-3 mb-3">
            <h2 class="text-them fw-bold mb-0">Update Product</h2>
            <p class="text-them-sec mb-0">Form website update Product laudrymu</p>
        </div>

        <form action="" method="POST" enctype="multipart/form-data" wire:submit='update'>
            <div class="d-block rounded bg-white p-3 mb-3">
                <div class="row gx-3">
                    <div class="col-12 col-md-7 col-lg-7">

                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label for="#" class="form-label">Nama Product</label>
                                <input type="title" name="title" wire:model='title'
                                    class="form-control  @error('title') is-invalid @enderror">
                                @error('title')
                                    <span class="invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="#" class="form-label">Harga Product</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" name="price" wire:model='price'
                                        class="form-control  @error('price') is-invalid @enderror">
                                </div>
                                @error('price')
                                    <span class="d-block invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="gender" class="form-label">Status</label>
                                <select name="is_active" id="is_active" wire:model='is_active'
                                    class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="0" selected>Pilih Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Non Active</option>
                                </select>
                                @error('is_active')
                                    <span class="invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="#" class="form-label">Discound Harga</label>
                                <div class="input-group">
                                    <input type="text" name="discount" wire:model='discount'
                                        class="form-control  @error('discount') is-invalid @enderror">
                                    <span class="input-group-text" id="basic-addon1">.%</span>
                                </div>
                                @error('discount')
                                    <span class="d-block invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="discount_expired" class="form-label">Discount Expired</label>
                                <input type="date" name="discount_expired" id="discount_expired" wire:model='discount_expired'
                                    class="form-control  @error('discount_expired') is-invalid @enderror">
                                @error('discount_expired')
                                    <span class="invalid-feedback text-capitalize">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="#" class="form-label">Deskripsi Product</label>
                            <textarea name="description_short" id="description_short" wire:model='description_short' rows="4"
                                class="form-control  @error('description_short') is-invalid @enderror"></textarea>
                            @error('description_short')
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
                                @elseif($post)
                                    <div for="images" class="border rounded ratio ratio-4x3 image-upload"
                                        style="background-image: url('/images/product/{{ $post }}')">
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
                <div class="d-flex align-items-center">
                    <small class="fw-bold me-auto">Detail Description</small>
                    <button class="btn btn-sm btn-outline-success" type="button" wire:click="addInput">
                        <i class="fas fa-plus fa-sm fa-fw"></i>
                    </button>
                </div>
                <hr class="soft mb-3">

                @foreach ($description_list as $index => $item)
                    <div class="d-flex gap-2 mb-2">
                        <input type="text" wire:model="description_list.{{$index}}" name="descriptionOther[]"
                            class="form-control" value="{{ $item }}" placeholder="List Description...">
                        <button class="btn btn-danger" type="button" wire:click="delInput({{ $index }})">
                            <i class="fas fa-trash fa-xs fa-fw"></i>
                        </button>
                    </div>
                @endforeach
            </div>
            <div class="d-block rounded bg-white p-3 mb-3">
                <button type="submit" class="btn btn-outline-success" name="update">Save Product</button>
            </div>
        </form>
    </div>
</div>
