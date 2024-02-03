@extends('template_admin');

@section('contenido-dinamico')
    <div class="card mt-4">
        <h5 class="card-header">Registrar Cursos</h5>

        <div class="container">
            <form action="{{route('guardar_curso')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="">Título</label>
                <input type="text" class="form-control" name="titulo">
    
                <label for="">Descripción</label>
                <textarea class="form-control" name="descripcion" id="" cols="30" rows="3"></textarea>
    
                <label for="">Nivel del Curso</label>
                <select name="nivel" id="" class="form-control">
                    <option value="principiante">Principiante</option>
                    <option value="intermedio">Intermedio</option>
                    <option value="avanzado">Avanzado</option>
                </select>
    
                <label for="">Duración del curso</label>
                <input type="text" class="form-control" name="duracion">
    
                <label for="">Precio</label>
                <input type="text" class="form-control" name="precio">
    
                <label for="">Imagen</label>
                <input type="file" class="form-control" name="imagen">
    
                <label for="">Seleccione una categoría</label>
                <select name="categoria" id="" class="form-control">
                    @foreach ( $categorias as $categoria)
                    <option value={{$categoria->id}}>{{$categoria->categoria}}</option>       
                    @endforeach
                </select>

                <label for="">Seleccione un instructor</label>
                <select name="instructor" id="" class="form-control">
                    @foreach ($instructores as $instructor)
                        <option value={{$instructor->id}}>{{$instructor->nombre}}</option>
                    @endforeach
                </select>

                <input type="submit" class="my-4 btn btn-primary" value="Guardar Datos">
            </form>
        </div>
    </div>
@endsection