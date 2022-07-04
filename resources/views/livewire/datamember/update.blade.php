<form>
    <input type="hidden" wire:model="id_member">
    <div class="form-group mb-3">
        <label for="idMember">Id Member:</label>
        <input type="text" class="form-control @error('id_member') is-invalid @enderror" id="idMember" placeholder="Enter ID Member" wire:model="id_member">
        @error('id_member') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group mb-3">
        <label for="categoryDescription">No HP:</label>
        <input class="form-control @error('no_hp') is-invalid @enderror" id="noHp" wire:model="no_hp" placeholder="Enter No HP">
        @error('no_hp') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>