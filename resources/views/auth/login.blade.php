@extends('layouts.notLogged')

@section('title', 'Formulário de login')

@section('content')

    <h1 class="mt-4 container">Formulário de login</h1>
    <hr/>

    <div class="card container mt-4 bg-light border border-info">

        <div class="card-body">

            <form action="{{route('login.authenticate')}}" method="POST">
                @csrf
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" class="form-control"
                placeholder="digite o seu email" />

                <label for="password">Senha : </label>
                <input type="password" name="password" id="password" class="form-control"
                placeholder="digite a sua senha" />

                <button type="submit" class="btn btn-success mt-4">Efetuar Login</button>
                

            </form>

                <a href="{{route('users.create')}}">
                    <button class="btn btn-primary mt-4">
                        Registre-se
                    </button>
                </a>

        </div>

    </div>

    @if (session('msg'))
        <p class="alert alert-danger container mt-4">{{session('msg')}}</p>
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger container mt-4">{{$error}}</p>
        @endforeach
    @endif
    
    
@endsection