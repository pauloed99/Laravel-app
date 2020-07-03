@extends('layouts.logged')

@section('title', 'usuários cadastrados')

@section('content')
    
    <h1 class="container mt-4">Usuários cadastrados no sistema</h1>
    <hr />

    @foreach ($users as $user)

        <div class="card container mt-4 border border border-success bg-light">

            <div class="card-body">
                
                <p>Firstname : {{$user->firstname}}</p>
                <p>Lastname : {{$user->lastname}}</p>
                <p>CPF : {{$user->cpf}}</p>
                <p>Email : {{$user->email}}</p>

                <a href="{{route('users.show', $user->email)}}">
                    <button class="btn btn-success mt-4">Ver mais !</button>
                </a>
                
            </div>

        </div>
        
    @endforeach
    
@endsection
    
