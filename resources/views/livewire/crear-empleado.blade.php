<div>
    <x-danger-button wire:click="$set('open',1)"> Nuevo empleado </x-danger-button>


    <x-dialog-modal wire:model="open">
        
        <x-slot name="title">
            Registrar nuevo empleado
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre/s" />
                <x-input type="text" class="w-full" placeholder="Nombre/s del empleado" wire:model.defer="nombre" />

                <x-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Apellido" />
                <x-input type="text" class="w-full" placeholder="Apellido del empleado" wire:model.defer="apellido" />

                <x-input-error for="apellido" />
            </div>
            <div class="mb-4">
                <x-label value="Email" />
                <x-input type="text" class="w-full" placeholder="Email del empleado" wire:model.defer="email" />

                <x-input-error for="email" />
            </div>
            <div class="mb-4">
                <x-label value="Fecha de contratación" />
                <x-input type="text" class="w-full" placeholder="aa-mm-dd" wire:model.defer="fecha_contratacion" />

                <x-input-error for="fecha_contratacion" />
            </div>
            <div class="mb-4">
                <x-label value="Cargo" />
                <x-input type="text" class="w-full" placeholder="Cargo del empleado" wire:model.defer="cargo" />

                <x-input-error for="cargo" />
            </div>
        </x-slot>

        <x-slot name="footer">

            <x-secondary-button class="mr-3" wire:click="$set('open',0)">Cancelar</x-secondary-button>

            <x-danger-button wire:click="guardar" wire:loading.attr="disabled" wire:target="guardar" class="disabled:opacity-25">Registrar empleado</x-danger-button>
            
        </x-slot>
        
    
    </x-dialog-modal>
</div>
