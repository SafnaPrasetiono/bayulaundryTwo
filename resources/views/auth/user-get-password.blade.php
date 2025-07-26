<div>

    @if ($alert === 0)
        <div class="login-container">
            <div class="login-head">
                <div class="text-start">
                    <h2>Password</h2>
                    <p class="mb-0">Selamat datang di applikasi laundrymu</p>
                </div>
            </div>
            <div class="login-body mb-3">
                <form wire:submit="changeds">
                    <div class="mb-2">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control disabled" id="email" disabled wire:model='email'>
                        @error('email')
                            <span class="invalid-feedback text-capitalize">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" wire:model='password'
                            wire:target='changeds' wire:loading.class="disabled placeholder"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="invalid-feedback text-capitalize">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="ConfirmPassword" class="form-label">Comfirmed Password</label>
                        <input type="password" name="password_confirmation" id="ConfirmPassword" wire:target='changeds'
                            wire:loading.class="disabled placeholder" wire:model='password_confirmation'
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password_confirmation')
                            <span class="invalid-feedback text-capitalize">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100" wire:target='changeds'
                        wire:loading.class="disabled placeholder">RUBAH PASSWORD</button>
                </form>
            </div>
        </div>
    @elseif($alert === 1)
        <div class="position-relative" style="width: 100%; height: 100vh;">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div class="text-center text-success">
                    <i class="far fa-user-circle fa-5x"></i>
                    <p class="mb-0 fw-bold fs-5">SUCCESS!</p>
                    <p class="mb-0 text-secondary">Selamat password akun anda telah diperbaharui</p>
                    <a http-equiv="refresh" href="{{ route('index') }}"
                        class="link-primary text-underline-none">LOGIN</a>
                    <meta http-equiv="refresh" content="5;url={{ route('index') }}">
                </div>
            </div>
        </div>
    @endif


</div>
