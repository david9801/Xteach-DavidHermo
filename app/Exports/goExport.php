<?php
namespace App\Exports;

use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\User;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class goExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        //cursos del profesor actual
        $cursos = Curso::where('user_id', auth()->user()->id)->get();
        //todas las inscripciones y todos los users, tanto alumnos como profesores,
        //los profesores no estan inscritos en ningun curso asi que no hay problema
        $inscripciones = Inscripcion::all();
        $usuarios = User::all();
        return $cursos;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Curso',
            'Cantidad de Temas'
        ];
    }
}
