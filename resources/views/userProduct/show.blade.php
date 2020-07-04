@extends('layouts.logged')

@section('title', 'Seu Produto')

@section('content')
    
    <h1 class="container mt-4">Mais dados do produto do usuário!</h1>
    <hr />

    <div class="card container mt-4 border border border-success bg-light">

        <div class="card-body">
            
            <p>Purchase Id : {{$userProduct->pivot->product_user_id}}</p>
            <p>User CPF : {{$userProduct->pivot->cpf_user}}</p>
            <p>Product id : {{$userProduct->product_id}}</p>
            <p>Name : {{$userProduct->name}}</p>
            <p>Price : R$ {{$userProduct->price}}</p>
            <p>Brand : {{$userProduct->brand}}</p>
            <p>Purchase Date : {{$userProduct->pivot->created_at}}</p>

            <form action="{{route('userProducts.destroy', $userProduct->pivot->product_user_id)}}" 
            method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger mt-4" type="submit">
                    Deletar Produto do meu carrinho de compras !
                </button>
            </form>
            
        </div>

    </div>
        
    

@endsection
    
