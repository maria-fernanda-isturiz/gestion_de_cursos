@extends('template_admin');
@section('contenido-dinamico')
    <div class="card">
        <div class="mb-5">
            <section class="container">
                <form action="{{route('reporte_por_categoria')}}" method="POST">
                    @method('GET')
                    <label for="">Selecciona una categoría</label>
                    <select name="categoria" id="" class="form-control">
                        <option value="">Seleccione</option>
                        @foreach ( $categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                        @endforeach
                    </select>

                    <input type="submit" class="btn btn-dark mt-3" value="Generar Reporte">
                </form>
            </section>
        </div>
    </div>
@endsection