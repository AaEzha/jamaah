<div>
    @if (auth()->user()->id === $getRecord()->id)
        {{ $getRecord()->roles[0]->name }}
    @else
        <x-filament::input.wrapper>
            <x-filament::input.select wire:model="role">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
            </x-filament::input.select>
        </x-filament::input.wrapper>
    @endif
</div>
