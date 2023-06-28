<?php

namespace App\Exports;

use App\Models\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpleadoExport implements FromView
{
   /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        return view('exportEmpleados', [
            'empleados' => Empleado::all()
        ]);
    }
}
