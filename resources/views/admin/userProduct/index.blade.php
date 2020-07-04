@extends('layouts.logged')

@section('title', 'Produtos dos usuários')

@section('content')
    
    <h1 class="container mt-4">Produtos cadastrados pelos usuários !</h1>
    <hr />

    @foreach ($users as $user)

        @foreach ($user->products as $userProduct)

            <div class="card container mt-4 border border border-success bg-light">

                <div class="card-body">
                    
                    <p>User CPF : {{$userProduct->pivot->cpf_user}}</p>
                    <p>Purchase Id : {{$userProduct->pivot->product_user_id}}</p>
                    <p>Product Id : {{$userProduct->pivot->product_id}}</p>
                    <p>Purchase Date : {{$userProduct->pivot->created_at}}</p>
                    
                </div>

            </div>
            
        @endforeach
        
    @endforeach
    

@endsection
    
