<div>
    <div class="login-container">
        <div class="login-head">
            <div class="text-start">
                <h2>LOGIN</h2>
                <p class="mb-0">Wellcome in login form</p>
            </div>
        </div>
        <div class="login-body mb-3">
            <form wire:submit="login">
                <div class="mb-2">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" wire:model='email' class="form-control @error('email') is-invalid @enderror"
                        id="email" wire:target='login,getPassword' wire:loading.class="disabled placeholder">
                    @error('email')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" wire:model='password'
                        class="form-control @error('password') is-invalid @enderror" id="password" wire:target='login,getPassword'
                        wire:loading.class="disabled placeholder">
                    @error('password')
                        <span class="invalid-feedback text-capitalize">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Ingatkan Saya</label>
                    </div>
                    <button type="button" class="btn p-0 m-0 link-primary text-transform-none" wire:click='getPassword'>Lupa Password?</button>
                </div>
                <button type="submit" class="btn btn-primary w-100" wire:target='login,getPassword'
                    wire:loading.class="disabled placeholder">LOGIN</button>
            </form>
        </div>
        <div class="d-flex align-items-center justify-content-center mb-3">
            <hr class="soft m-0" style="width: 30px">
            <span class="mx-3">OR</span>
            <hr class="soft m-0" style="width: 30px">
        </div>
        <div class="login-footer pt-0">
            <button class="btn btn-outline-google w-100 mb-4" wire:click='loginWithGoogle'>
                <img src="{{ url('/images/icons/google.png') }}" alt="google" class="rounded-circle" width="24px"
                    height="24px">
                <Span>Login With Google</Span>
            </button>
            <div class="d-block text-center mb-2">
                <p class="mb-0">don't have account click here</p>
                <a href="{{ route('signup') }}" style="text-decoration: none;">SIGNUP</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('open-google-login', ({ url }) => {
                window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,width=460,height=540");
            });
        });

        // Tunggu pesan dari popup
        window.addEventListener('message', function(event) {
            if (event.origin !== window.location.origin) return;

            if (event.data === 'google-login-success') {
                // Redirect setelah login sukses
                window.location.href = "{{route('index')}}";
            }
        });
    </script>

</div>
