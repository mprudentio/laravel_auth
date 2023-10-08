<div>
    {{-- Stop trying to control. --}}
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent="loginUser">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" placeholder="input your email address" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email">
                            @error('email') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" placeholder="input your password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="password">
                            @error('password') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div wire:ignore>
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            @error('gRecaptchaResponse') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                        <a href="{{ route('password.request') }}" class="d-block text-primary">Forgot Passwors?</a>
                        <a href="{{ route('register') }}" class="text-primary ">Do not have an account?</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var onloadCallback = function() {
      alert("grecaptcha is ready!");
    };
  </script>