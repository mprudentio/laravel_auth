<div>
    {{-- Stop trying to control. --}}
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form action="" wire:submit.prevent="registerUser">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" placeholder="input your name" class="form-control @error('name') is-invalid @enderror" wire:model.difer="name">
                            @error('name') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" placeholder="input your email address" class="form-control @error('email') is-invalid @enderror" wire:model.difer="email">
                            @error('email') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" placeholder="input your password" class="form-control @error('password') is-invalid @enderror" wire:model.difer="password">
                            @error('password') 
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" placeholder="repeat your password" class="form-control" wire:model.difer="password_confirmation">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                        <a href="{{ route('login') }}" class="text-primary">Already have an account?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
