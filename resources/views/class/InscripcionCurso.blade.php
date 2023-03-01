@extends('layout.app')
@section('title', 'Inscribirse')
@section('content')


    <div>
        <table class="table bg-secondary table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de Temas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->temas }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row overflow-hidden mw-100">
        <div class="col-sm-6 mx-auto bg-secondary p-2 border shadow-lg rounded">
            <form method="POST" action="{{ route('curso.inscribirse') }}" >
                @csrf
                <div class="form-group" >
                    <label for="curso_id">Selecciona un curso:</label>
                    <select class="form-control" id="curso_id" name="curso_id">
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Inscribirse</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger d-flex justify-content-center">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>

@endsection



