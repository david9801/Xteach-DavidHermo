@extends('layout.app')
@section('title', 'Entrar aquí')
@section('content')
    <div  style="margin-top: 80px;">
        <form id="div-loginform" action="{{route('dologin')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp"  name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control " id="exampleInputPassword1"  name="password">
            </div>
            <div class="mb-3 form-check text-center" >
                <input type="checkbox" class="form-check-input " id="exampleCheck1">
                <label class="form-check-label"  for="exampleCheck1">Check me out</label>
            </div>

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

