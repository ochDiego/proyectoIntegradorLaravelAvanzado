<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proyecto integrador Laravel avanzado
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <x-table> 

                <div class="px-6 py-4 border-b border-gray-600">
                    <a href="{{route('export')}}" class="font-bold">
                        EXPORTAR
                    </a>
                </div>

                <div class="px-6 py-4 flex items-center">
                    <x-input type="text" class="flex-1 mr-3" placeholder="Buscar empleado..." wire:model='search'/>
        
                    @can('admin.empleados.create')
                        @livewire('crear-empleado')
                    @endcan

                </div>
                
                @if ($empleados->count())
        
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Nombre</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Apellido</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Fecha de contratación</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Cargo</div>
                                </th>
                                <th colspan="2" class="p-2 whitespace-nowrap">
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($empleados as $item)
                                
                                <tr>
                                    <td class="p-2 whitespace-nowrap border-b">
                                        <div class="text-left">{{ $item->nombre }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap border-b"">
                                        <div class="text-left">{{ $item->apellido }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap border-b"">
                                        <div class="text-left">{{ $item->email }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap border-b"">
                                        
                                        <div class="text-left">{{ $item->fecha_contratacion }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap border-b"">
                                        <div class="text-left">{{ $item->cargo }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap border-b"">

                                        @can('admin.empleados.edit')
                                            <a class="font-semibold text-green-500 cursor-pointer" wire:click="edit({{$item}})">
                                                Editar
                                            </a>
                                        @endcan

                                        
                                    </td>
                                    <td>
                                       @can('admin.empleados.delete')
                                            <a href="" class="font-semibold text-red-500" wire:click="delete({{$item}})">
                                                Eliminar
                                            </a>
                                       @endcan
                                    </td>
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
        
                @else    
                <div class="px-6 py-4 flex items-center">
                   No hay datos coincidan con su búsqueda
                </div>
                @endif
        
                @if ($empleados->hasPages())
                    
                    <div class="px-6 py-4">
                        {{ $empleados->links() }}
                    </div>
        
                @endif
        
            </x-table>
        
            <x-dialog-modal wire:model="open_edit">
        
                <x-slot name="title">
                    Editar empleado
                </x-slot>
        
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label value="Nombre/s" />
                        <x-input type="text" class="w-full" placeholder="Nombre/s del empleado" wire:model.defer="empleado.nombre" />
        
                        <x-input-error for="nombre" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Apellido" />
                        <x-input type="text" class="w-full" placeholder="Apellido del empleado" wire:model="empleado.apellido" />
        
                        <x-input-error for="apellido" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Email" />
                        <x-input type="text" class="w-full" placeholder="Email del empleado" wire:model.defer="empleado.email" />
        
                        <x-input-error for="email" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Fecha de contratación" />
                        <x-input type="text" class="w-full" placeholder="aa-mm-aa
                        " wire:model.defer="empleado.fecha_contratacion" />
        
                        <x-input-error for="fecha_contratacion" />
                    </div>
                    <div class="mb-4">
                        <x-label value="Cargo" />
                        <x-input type="text" class="w-full" placeholder="Cargo del empleado" wire:model.defer="empleado.cargo" />
        
                        <x-input-error for="cargo" />
                    </div>
                </x-slot>
        
                <x-slot name="footer">
                    
                    <x-secondary-button class="mr-3" wire:click="$set('open_edit',0)"> Cancelar </x-secondary-button>
        
                    <x-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update" class="disabled:opacity-25">Editar empleado</x-danger-button>
        
                </x-slot>
        
        
            </x-dialog-modal>
        

        </div>
    </div>

   
</div>
