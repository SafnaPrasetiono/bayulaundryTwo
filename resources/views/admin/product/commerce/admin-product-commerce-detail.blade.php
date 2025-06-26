<div>
    <div class="container-fluid">
        <div class="d-block p-3 mb-3">
            <h2 class="text-them fw-bold mb-0">Create Commerce</h2>
            <p class="text-them-sec mb-0">Selamat datang kembali di aplikasi laundryku</p>
        </div>

        <div>
            <div class="d-block rounded bg-white p-3 mb-3">
                <div class="row gx-3">
                    <div class="col-12 col-md-7 col-lg-7">

                        <div class="row g-3 mb-3">
                            <div class="col-12">
                                <label for="#" class="form-label">Nama Product</label>
                                <input type="title" name="title" value='{{$data->title}}' disabled
                                    class="form-control  @error('title') is-invalid @enderror">
                            </div>

                            <div class="col-12 col-lg-7">
                                <label for="#" class="form-label">Harga Product</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                    <input type="text" name="price" value='{{$data->price}}' disabled
                                        class="form-control  @error('price') is-invalid @enderror">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <label for="#" class="form-label">Discound Harga</label>
                                <div class="input-group">
                                    <input type="text" name="discount" value='{{$data->discount}}' disabled
                                        class="form-control  @error('discount') is-invalid @enderror">
                                    <span class="input-group-text" id="basic-addon1">.%</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="discount_expired" class="form-label">Discount Expired</label>
                                <input type="date" name="discount_expired" id="discount_expired"
                                    value='{{$data->discount_expired}}' disabled
                                    class="form-control  @error('discount_expired') is-invalid @enderror">
                            </div>

                            <div class="col-12 col-lg-4">
                                <label for="#stock" class="form-label">Stock Product</label>
                                <input type="text" name="stock" value='{{$data->stock}}' disabled
                                    class="form-control  @error('stock') is-invalid @enderror">
                            </div>

                            <div class="col-12 col-lg-4">
                                <label for="#weight" class="form-label">Berat Product</label>
                                <div class="input-group">
                                    <input type="text" name="weight" value='{{$data->weight}}' disabled
                                        class="form-control  @error('weight') is-invalid @enderror">
                                    <span class="input-group-text" id="basic-addon1">.Gr</span>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <label for="gender" class="form-label">Status</label>
                                <select name="is_active" id="is_active" disabled
                                    class="form-select @error('is_active') is-invalid @enderror">
                                    <option value="1" @selected($data->is_active == true)>Active</option>
                                    <option value="0">Non Active</option>
                                </select>
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="#" class="form-label">Deskripsi Short</label>
                            <textarea name="description_short" id="description_short" rows="2"
                                class="form-control" disabled>{{$data->description_short}}</textarea>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 col-lg-5">
                        <div class="mb-3">
                            <label for="#" class="form-label">Display Product</label>
                            <label for="images" class="border rounded ratio ratio-4x3 bs-secondary-bg-rgb"
                                style="cursor: pointer; background-color: #e9ecef">
                                @if ($data->images)
                                    <div for="images" class="border rounded ratio ratio-4x3 image-upload"
                                        style="background-image: url('/images/product/{{ $data->images }}')">
                                    </div>
                                @else
                                    <div
                                        class="d-flex flex-column align-self-center align-items-center justify-content-center">
                                        <i class="fas fa-upload fa-3x fa-fw mb-3"></i>
                                        <span class="fw-light">Upload Here...</span>
                                    </div>
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3" wire:ignore>
                            <label for="#descriptions" class="form-label">Deskripsi Product</label>
                            <div class="d-block border rounded p-3 bg-light">
                                <?php echo $data->description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Multiple Image --}}
            <div class="d-block rounded bg-white p-3 mb-3">
                <div class="d-flex align-item-center justify-content-between px-3 mb-3">
                    <span class="fw-bold">Image Product</span>
                </div>
                @if ($postMultiple)
                    <div class="row g-0 gallery-product">
                        @foreach ($postMultiple as $indexImage => $img)
                            <div class="col-6 col-md-4 col-lg-3 p-2">
                                <div class="position-relative">
                                    <div for="images" class="border rounded ratio ratio-1x1 image-upload"
                                        style="background-image: url('/images/product/{{ $img->filename }}')">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <label for="Enputed" id="dropArea"
                        class="d-block border border-dashed border-gray-300 transition-all duration-300 cursor-pointer rounded"
                        style="height: 240px">
                        <div class="d-flex flex-column align-items-center justify-content-center h-100">
                            <i class="fas fa-boxes fa-3x fa-fw"></i>
                            <span class="fw-bold">Do Not Have Product Picture</span>
                        </div>
                    </label>
                @endif
            </div>


        </div>
    </div>

</div>
