@extends('layout.app')
@section('title', 'Inscribirse')
@section('content')


    <style>
        #table-reserve{
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 50px;
        }
    </style>
    <div>
        <table class="table" id="table-reserve">
            <thead>
            <tr>
                <th colspan="3" class="text-center">Listado de Cursos</th>
            </tr>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Temas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $row)
                <tr>
                    <td scope="row">{{ $row->id }}</td>
                    <td> {{ $row->name }}</td>
                    <td> {{ $row->temas }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <form  action="{{route('curso.inscribirse')}}" method="POST">
            @csrf
            <select class="bg-light-blue text-center" name="curso_id">
                        @foreach($cursos as $c)
                            <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
            <button type="submit" class="btn btn-primary">Send</button>
            @if ($errors->any())
                <div class="alert alert-danger d-flex justify-content-center">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </div>
@endsection



