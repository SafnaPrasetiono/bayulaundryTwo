<div>

    @push('stayle')
        <style>
            $aspect-ratios: (
                "9x21": calc(21 / 9 * 100%)
            );
        </style>
    @endpush



    <div class="container-fluid">
        <div class="d-block rounded p-3 mb-3">
            <h2 class="text-them fw-bold mb-0">Home Content</h2>
            <p class="text-them-sec mb-0">Selamat data di content home pages</p>
        </div>

        <div class="d-block rounded shaodw bg-white p-3 mb-3">
            <div class="d-flex gap-3 justify-content-between align-items-center mb-2">
                <label for="#" class="from-label fw-bold">Banner Content</label>
                <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalBanner">
                    <i class="fas fa-plus fa-sm fa-fw"></i>
                </button>
            </div>

            @if ($data)
                <div id="CExp" class="carousel slide">
                    <div class="carousel-indicators">
                        @foreach ($data as $index => $item)
                        <button type="button" data-bs-target="#CExp" data-bs-slide-to="{{$index}}" class="active"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($data as $index => $item)
                            <div class="carousel-item rounded overflow-hidden ratio ratio-21x9 @if ($index == 0) active @endif">
                                <img src="{{ $item->imagesPath . $item->imagesDesktop }}"
                                    alt="{{ $item->imagesDesktop }}" class="img-fluid"
                                    style="object-position: center; object-fit:cover;">
                                <div
                                    class="row g-0 align-items-center  @if ($item->textPosition == 'right') justify-content-end @elseif($item->textPosition == 'center') justify-content-center @endif">
                                    <div class="col-8">
                                        <div
                                            class="p-5 mt-4 @if ($item->textColor == 'light') text-light @endif @if ($item->textPosition == 'right') text-end @elseif($item->textPosition == 'center') text-center @endif">
                                            <div class="mb-2 display-5 fw-bold">
                                                {{ $item->title }}
                                            </div>
                                            <div class="mb-3 fs-3 fw-light w-75">
                                                {{ $item->description }}
                                            </div>
                                            @if ($item->linked)
                                                <a href="{{ $item->linked }}"
                                                    class="btn @if ($item->textColor == 'light') btn-outline-light @else btn-outline-dark @endif btn-lg px-4">{{ $item->linkedText }}</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExp" data-bs-slide="prev">
                        <i class="fas fa-angle-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExp" data-bs-slide="next">
                        <i class="fas fa-angle-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @else
                <div id="CExp" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#CExp" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#CExp" data-bs-slide-to="1"></button>
                    </div>
                    <div class="carousel-inner rounded overflow-hidden">
                        <div class="carousel-item active">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-block bg-secondary ratio ratio-21x9"></div>
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#CExp" data-bs-slide="prev">
                        <i class="fas fa-arrow-left fa-2x fa-fw"></i>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#CExp" data-bs-slide="next">
                        <i class="fas fa-arrow-right fa-2x fa-fw"></i>
                    </button>
                </div>
            @endif
        </div>



        <div class="modal fade" id="modalBanner" tabindex="-1" wire:ignore.self>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Banner</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-8">

                                <div class="mb-3">
                                    <label for="#" class="form-label">Desktop Mode</label>
                                    <div class="position-relative rounded overflow-hidden ratio ratio-21x9 mb-3">
                                        @if ($imagesDesktop)
                                            <img src="{{ $imagesDesktop->temporaryUrl() }}"
                                                class="img-fluid position-absolute"
                                                style="object-position: center; object-fit:cover;">
                                        @else
                                            <div class="d-flex position-absolute h-100 w-100 bg-secondary"></div>
                                        @endif
                                        <div
                                            class="row g-0 align-items-center  @if ($textPosition == 'right') justify-content-end @elseif($textPosition == 'center') justify-content-center @endif">
                                            <div class="col-7">
                                                <div
                                                    class="p-5 mt-4 @if ($textColor == 'light') text-light @endif @if ($textPosition == 'right') text-end @elseif($textPosition == 'center') text-center @endif">
                                                    <div class="mb-2 fs-4">
                                                        {{ $title }}
                                                    </div>
                                                    <div class="mb-3">
                                                        {{ $description }}
                                                    </div>
                                                    @if ($linked)
                                                        <a href="{{ $linked }}"
                                                            class="btn @if ($textColor == 'light') btn-outline-light @else btn-outline-dark @endif btn-sm px-4">{{ $linkedText }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3" style="width: 24rem">
                                    <label for="" class="form-label">Phone Mode</label>
                                    <div class="position-relative rounded overflow-hidden ratio ratio-4x3">
                                        @if ($imagesMobile)
                                            <img src="{{ $imagesMobile->temporaryUrl() }}"
                                                class="img-fluid position-absolute"
                                                style="object-position: center; object-fit:cover;">
                                        @else
                                            <div class="position-absolute h-100 w-100 bg-secondary"></div>
                                        @endif
                                        <div class="d-flex align-items-end justify-content-center">
                                            <div
                                                class="text-center @if ($textColor == 'light') text-light @endif px-4 mb-3">
                                                <p class="mb-1 fw-bold">{{ $title }}</p>
                                                <small class="d-block mb-3">{{ $description }}</small>
                                                @if ($linked)
                                                    <a href="{{ $linked }}"
                                                        class="btn @if ($textColor == 'light') btn-outline-light @else btn-outline-dark @endif btn-sm px-4">{{ $linkedText }}</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="mb-3">
                                    <label for="" class="form-label">Banner Desktop</label>
                                    <input type="file" class="form-control" wire:model='imagesDesktop'>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Banner Mobile</label>
                                    <input type="file" class="form-control" wire:model='imagesMobile'>
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <textarea class="form-control" id="titles" rows="2" wire:model.live='title'></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="titles" rows="3" wire:model.live='description'></textarea>
                                </div>
                                <div class="row g-1 mb-3">
                                    <label for="links" class="col-form-label">Link Botton</label>
                                    <div class="col-6">
                                        <input type="text" class="form-control" wire:model.live='linked'
                                            id="links">
                                    </div>
                                    <div class="col-6">
                                        <input type="text" class="form-control" wire:model.live='linkedText'>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="textposition" class="form-label">Text Position</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                wire:model.live='textPosition' id="textPosition0" value="left">
                                            <label class="form-check-label" for="textPosition0">Kiri</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                wire:model.live='textPosition' id="textPosition1" value="center">
                                            <label class="form-check-label" for="textPosition1">Tengah</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio"
                                                wire:model.live='textPosition' id="textPosition2" value="right">
                                            <label class="form-check-label" for="textPosition2">Kanan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="textColor" class="form-label">Text Color</label>
                                    <div>
                                        <input type="radio" class="btn-check" wire:model.live='textColor'
                                            id="dark" autocomplete="off" value="dark" checked>
                                        <label class="btn" for="dark">Hitam</label>

                                        <input type="radio" class="btn-check" wire:model.live='textColor'
                                            id="light" autocomplete="off" value="light">
                                        <label class="btn" for="light">Putih</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click='store'>Save changes</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
