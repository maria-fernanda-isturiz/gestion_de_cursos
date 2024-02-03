<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Instructores;
use App\Models\Categorias;
use Illuminate\Support\Str;

class CursosController extends Controller
{
    public function Index(){
        $cursos = Cursos::join('categorias', 'cursos.id_categoria', '=', 'categorias.id')->join('instructores', 'cursos.id_instructor', '=', 'instructores.id')->select('cursos.id', 'cursos.titulo', 'cursos.duracion', 'categorias.categoria', 'cursos.imagen_curso', 'instructores.nombre')->where('cursos.id_estado', '=', 1)->get();
        // $cursos = Cursos::all();

        return view('pages.cursos_activos', compact('cursos'));
    }

    public function FormularioRegistro(){
        $instructores = Instructores::all();
        $categorias = Categorias::all();

        return view('pages.registrar_cursos', compact('instructores', 'categorias'));
    }

    public function RegistrarCursos(Request $request){
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $imagen_nombre = Str::slug($request->post('titulo')).".".$imagen->guessExtension();

            $ruta = public_path("imagenes/");
            copy($imagen->getRealPath(),$ruta.$imagen_nombre);
        } else {
            $imagen_nombre = null;
        }

        $curso = new Cursos();

        $curso->titulo = $request->post('titulo');
        $curso->descripcion = $request->post('descripcion');
        $curso->nivel_curso = $request->post('nivel');
        $curso->duracion = $request->post('duracion');
        $curso->precio = $request->post('precio');
        $curso->imagen_curso = $imagen_nombre;
        $curso->id_categoria = $request->post('categoria');
        $curso->id_instructor = $request->post('instructor');
        $curso->id_estado = 1;
        $curso->save();

        return redirect()->route('lista_cursos');

        // $curso = Cursos::created();
    }

    public function ActualizarCursos(Request $request, $id){
        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $imagen_nombre = Str::slug($request->post('titulo')).".".$imagen->guessExtension();

            $ruta = public_path("imagenes/");
            copy($imagen->getRealPath(),$ruta.$imagen_nombre);
        } else {
            $imagen_nombre = $request->post('imagen_previa');
        }

        $curso = Cursos::find($id);

        $curso->titulo = $request->post('titulo');
        $curso->duracion = $request->post('duracion');
        $curso->imagen_curso = $imagen_nombre;
        $curso->update();

        return back();
    }

    public function CambiarEstado($id){
        $curso = Cursos::find($id);
        $curso->id_estado = 2; 
        $curso->update();

        return back();
    }

    public function probar(){
        return view ('template_public');
    }

    public function lista_cursos_publico(){
        $cursos_activos = Cursos::join('categorias', 'cursos.id_categoria', '=', 'categorias.id')->join('instructores', 'cursos.id_instructor', '=', 'instructores.id')->select('cursos.*', 'categorias.categoria', 'instructores.nombre', 'instructores.especialidad', 'instructores.descripcion as trayectoria')->where('cursos.id_estado', '=', 1)->get();

        return view('template_public', compact('cursos_activos'));
    }
}
