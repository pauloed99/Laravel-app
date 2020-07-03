@extends('layouts.logged')

@section('title', 'Seus produtos')

@section('content')
    
    <h1 class="container mt-4">Produtos que você adicionou ao seu carrinho !</h1>
    <hr />

    @foreach ($userProducts as $userProduct)

        <div class="card container mt-4 border border border-success bg-light">

            <div class="card-body">
                
                <p>Purchase Id : {{$userProduct->pivot->product_user_id}}</p>
                <p>User CPF : {{$userProduct->pivot->cpf_user}}</p>
                <p>Product id : {{$userProduct->product_id}}</p>
                
            </div>

        </div>
        
    @endforeach
    

@endsection
    
