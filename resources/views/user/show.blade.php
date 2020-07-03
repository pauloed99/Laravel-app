@extends('layouts.logged')

@section('title', 'Dados do usuário')

@section('content')
    
    <h1 class="container mt-4">Usuário específico do sistema</h1>
    <hr />

    <div class="card container mt-4 border border border-success bg-light">

        <div class="card-body">
            
            <p>Firstname : {{$user->firstname}}</p>
            <p>Lastname : {{$user->lastname}}</p>
            <p>CPF : {{$user->cpf}}</p>
            <p>Email : {{$user->email}}</p>

            <a href="{{route('users.edit', $user->email)}}">
                <button type="submit" class="btn btn-success mt-4">Editar usuário acima</button>
            </a>  

            <br/>
            
            <a href="{{route('password.edit', $user->email)}}">
                <button type="submit" class="btn btn-primary mt-4">Editar senha do usuário acima</button>
            </a>
      
            <form action="{{route('users.destroy', $user->email)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-4">Deletar usuário acima</button>
            </form>

        </div>

    </div>
        
    
@endsection
    
