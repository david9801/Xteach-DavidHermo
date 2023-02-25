<?php
namespace App\Http\Controllers;

use App\Exports\goExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function goExport()
    {
        return Excel::download(new goExport(), 'cursos.xlsx');
    }
}
