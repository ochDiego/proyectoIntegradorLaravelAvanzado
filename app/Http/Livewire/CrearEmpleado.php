<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empleado;
use App\Notifications\NuevoEmpleado;

class CrearEmpleado extends Component
{

    public $nombre,$apellido,$email,$fecha_contratacion,$cargo;

    public $open = 0;

    protected $rules = [
        'nombre' => 'required',
        'apellido' => 'required',
        'email' => 'required|email',
        'fecha_contratacion' => 'required',
        'cargo' => 'required',
    ];


    public function render()
    {
        return view('livewire.crear-empleado');
    }

    public function guardar()
    {

        $this->validate();

        Empleado::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'fecha_contratacion' => $this->fecha_contratacion,
            'cargo' => $this->cargo
        ]);

        $this->reset(['nombre','apellido','email','fecha_contratacion','cargo','open']);
     
        $this->emitTo('mostrar-empleados','render');

        $this->emit('alert','Empleado registrado con éxito!');

    }
}
