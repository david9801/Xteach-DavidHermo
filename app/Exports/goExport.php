<?php
namespace App\Exports;

use App\Models\Curso;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class goExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Obtener todos los cursos
        $cursos = Curso::all();


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
