<div>
    <div class="card" style="max-width:600px">
        <div class="card-body">
            <form action="#" method="post" wire:submit.prevent="submit">
                <div class="form-group mb-1">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" wire:model="name">
                    @error('name') <small class="error">{{ $message }}</small> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
