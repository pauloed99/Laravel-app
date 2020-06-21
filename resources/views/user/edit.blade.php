@extends('layouts.template')

@section('title', 'Editar Usuário')

@section('content')

    <h1 class="container mt-4">Edite e atualize seus dados !</h1>

    <hr />

    <div class="card container mt-4 border border-success">

        <div class="card-body">

            <form action="{{route('users.update', $user->email)}}" method="POST">
                @method('PUT')
                @csrf
                <label for="firstname">Nome : </label>
                <input type="text" class="form-control" name="firstname" id="firstname" 
                placeholder="digite o seu primeiro nome" value="{{$user->firstname}}"/>
        
                <label for="lastname">Sobrenome : </label>
                <input type="text" class="form-control" name="lastname" id="lastname"
                placeholder="digite  o seu sobrenome" value="{{$user->lastname}}"/>
        
                <label for="cpf">CPF : </label>
                <input type="text" class="form-control" name="cpf" id="cpf" 
                placeholder="digite o seu cpf" value="{{$user->cpf}}" readonly/>
        
                <label for="email">Email : </label>
                <input type="email" class="form-control" name="email" id="email"
                placeholder="digite o seu email" value="{{$user->email}}" readonly/>
        
                <button class = "btn btn-success mt-4" 
                type="submit">Editar dados acima !</button>
        
            </form>
            
        </div>

    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    
@endsection