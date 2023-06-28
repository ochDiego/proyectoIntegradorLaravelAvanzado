<?php

//$newDate = date("d/m/Y", strtotime($originalDate));

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use Livewire\WithPagination;

class MostrarEmpleados extends Component
{
    use WithPagination;

    public $search,$empleado;
    public $open_edit = 0;

    protected $listeners = ['render'];

    protected $rules = [
        'empleado.nombre' => 'required',
        'empleado.apellido' => 'required',
        'empleado.email' => 'required',
        'empleado.fecha_contratacion' => 'required',
        'empleado.cargo' => 'required',
    ];

    public function mount()
    {
        $this->empleado = new Empleado();
    }


    public function render()
    {
        $empleados = Empleado::where('nombre','LIKE','%'. $this->search .'%')
                        ->orWhere('nombre','LIKE','%'. $this->search .'%')
                        ->orWhere('apellido','LIKE','%'. $this->search .'%')
                        ->orWhere('email','LIKE','%'. $this->search .'%')
                        ->orWhere('fecha_contratacion','LIKE','%'. $this->search .'%')
                        ->orWhere('cargo','LIKE','%'. $this->search .'%')
                        ->orderBy('id','desc')
                        ->paginate(4);

        return view('livewire.mostrar-empleados',compact('empleados'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function edit(Empleado $empleado)
    {
        $this->empleado = $empleado;
        $this->open_edit = 1;
    }

    public function update()
    {
        $this->validate();

        $this->empleado->save();

        $this->reset(['open_edit']);

        $this->emit('alert','Empleado actualizado con éxito!');
    }

    public function delete(Empleado $empleado)
    {
        $empleado->delete();
    }
}
