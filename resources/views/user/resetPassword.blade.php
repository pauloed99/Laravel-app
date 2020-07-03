@extends('layouts.logged')

@section('title', 'Redefinir Senha')


@section('content')

    <h1 class="mt-4 container">Altere a senha</h1>
    <hr/>

    <div class="card container mt-4">

        <div class="card-body">

            <form action="{{route('password.update', $user->email)}}" method="POST">
                @csrf
                @method('PUT')

                <label for="password">Senha atual : </label>
                <input type="password" name="password" id="password" class="form-control"
                placeholder="Digite a sua senha atual">

                <label for="password2">Nova senha : </label>
                <input type="password" name="password2" id="password2" class="form-control"
                placeholder="Digite a nova senha">

                <label for="password3">Confirme a nova senha : </label>
                <input type="password" name="password3" id="password3" class="form-control"
                placeholder="Digite a nova senha">

                <button type="submit" class="btn btn-success mt-4">Reset Password</button>

            </form>

        </div>

    </div>

    @if (session('msg'))
        <p class="alert alert-success container mt-4">{{session('msg')}}</p>
    @endif

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger container mt-4">{{$error}}</p>
        @endforeach
    @endif
    
@endsection
    
