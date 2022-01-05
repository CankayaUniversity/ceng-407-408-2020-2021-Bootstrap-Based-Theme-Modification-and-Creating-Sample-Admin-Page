<div>
    <div class="card" style="max-width:600px">
        <div class="card-body">
            <form action="#" method="post" wire:submit.prevent="submit">
                <div>
                    @if (session()->has('success'))
                        <div class="alert alert-success p-1">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <div>
                    @if (session()->has('error'))
                        <div class="alert alert-success p-1">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="form-group mb-1">
                    <label>Name</label>
                    <input type="text" class="form-control" wire:model="name">
                    @error('name') <small class="error">{{ $message }}</small> @enderror
                </div>
                <div class="form-group mb-1">
                    <label>Email</label>
                    <input type="email" class="form-control" wire:model="email">
                    @error('email') <small class="error">{{ $message }}</small> @enderror
                </div>
                <hr>
                <div class="form-group mb-1">
                    <label>New Password</label>
                    <input type="password" class="form-control" wire:model="password">
                    <small>You can leave it blank if you don't want to change your password.</small>
                    @error('password') <small class="error">{{ $message }}</small> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
