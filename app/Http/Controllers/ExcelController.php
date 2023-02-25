<?php
namespace App\Http\Controllers;

use App\Exports\goExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
class ExcelController extends Controller
{
    public function goExport()
    {
        $user = auth()->user();
        $filename = $user->name.'_cursos.xlsx';
        return Excel::download(new goExport(), $filename);
    }
}
