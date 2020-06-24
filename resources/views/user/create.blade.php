@extends('layouts.template')

@section('title', 'Criar Usuário')

@section('content')

    <h1 class="container mt-4">Registre sua Conta para comprar produtos no e-commerce !</h1>

    <hr />

    <div class="card container mt-4 border border-success">

        <div class="card-body">

            <form action="{{route('users.store')}}" method="POST">
                
                @csrf
                <label for="firstname">Nome : </label>
                <input type="text" class="form-control" name="firstname" id="firstname" 
                placeholder="digite o seu primeiro nome" value="{{old('firstname')}}"/>
        
                <label for="lastname">Sobrenome : </label>
                <input type="text" class="form-control" name="lastname" id="lastname"
                placeholder="digite  o seu sobrenome" value="{{old('lastname')}}"/>
        
                <label for="cpf">CPF : </label>
                <input type="text" class="form-control" name="cpf" id="cpf" 
                placeholder="digite o seu cpf" value="{{old('cpf')}}"/>
        
                <label for="email">Email : </label>
                <input type="email" class="form-control" name="email" id="email"
                placeholder="digite o seu email" value="{{old('email')}}"/>
        
                <label for="password">Senha : </label>
                <input type="password" class="form-control" name="password" id="password" 
                placeholder="digite a sua senha" value="{{old('password')}}"/>
        
                <label for="password2">Senha de confirmação : </label>
                <input type="password" class="form-control" name="password2" id="password2" 
                placeholder="digite a sua senha novamente" value="{{old('password2')}}"/>

                <button class = "btn btn-success mt-4" 
                type="submit">Cadastrar dados acima !</button>
        
            </form>
            
        </div>

    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    
@endsection