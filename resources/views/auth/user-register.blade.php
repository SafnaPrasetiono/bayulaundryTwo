<div>
    <div class="login-container">
        <div class="login-head">
            <div class="text-start">
                <h2>SIGNUP</h2>
                <p class="mb-0">Wellcome in register form</p>
            </div>
        </div>
        <div class="login-body">
            <form action="#" method="POST" wire:submit='save'>
                <div class="mb-2">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" wire:model='username'
                        class="form-control @error('username') is-invalid @enderror">
                    @error('username')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" id="email" name="email" wire:model='email'
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" wire:model='password'
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="ConfirmPassword" class="form-label">Comfirmed Password</label>
                    <input type="password" name="password_confirmation" id="ConfirmPassword"
                        wire:model='password_confirmation' class="form-control @error('password') is-invalid @enderror">
                    @error('password_confirmation')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary form-control">
                    <span wire:loading.class='d-none' wire:target='save'>
                        SIGNUP
                    </span>
                    <span class="d-none" wire:loading.class.remove='d-none' wire:target='save'>
                        <span class="spinner-border spinner-border-sm"></span>
                        <span class="visually-hidden" role="status">Loading...</span>
                    </span>
                </button>
            </form>
        </div>
        <div class="login-footer">
            <div class="d-block text-center">
                <p class="mb-0">Have a your account click here</p>
                <a href="{{ route('login') }}" style="text-decoration: none;">LOGIN</a>
            </div>
        </div>
    </div>
</div>
