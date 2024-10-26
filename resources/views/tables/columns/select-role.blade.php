<div>
    @if (auth()->user()->id === $getRecord()->id)
        <p class="uppercase">{{ $getRecord()->roles[0]->name }}</p> 
    @else
        <x-filament::input.wrapper>
            <x-filament::input.select wire:change="updateRole('{{ $getRecord()->getKey() }}', '{{ $getName() }}', $event.target.value)" >
                <option value="admin" @selected($getRecord()->getRoleNames()[0] === "admin")>Admin</option>
                <option value="staff" @selected($getRecord()->getRoleNames()[0] === "staff") >Staff</option>
            </x-filament::input.select>
        </x-filament::input.wrapper>
    @endif
</div>
