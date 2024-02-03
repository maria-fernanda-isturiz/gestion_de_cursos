<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Categorias;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function Index(){
        $cursos = Cursos::all();
        $pdf = Pdf::loadView('pdf.reporte', compact('cursos'));

        return $pdf->stream();
    }

    public function cursos_categorias(){
        $categorias = Categorias::all();

        return view('pages.cursos_categorias', compact('categorias'));
    }

    public function ReporteCategoria(Request $request){
        $categoria = $request->post('categoria');

        $lista = Cursos::join('instructores', 'cursos.id_instructor', '=', 'instructores.id')->join('categorias', 'cursos.id_categoria', '=', 'categorias.id')->select('cursos.*', 'instructores.nombre', 'categorias.categoria',)->where('cursos.id_categoria', '=', $categoria)->get();

        $pdf = Pdf::loadView('pdf.reporte_categoria', compact('lista'));
        return $pdf->stream();
    }
}
