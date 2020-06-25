@extends('layouts.template')

@section('title', 'Seus produtos')

@section('content')
    
    <h1 class="container mt-4">Produtos que você pretende comprar !</h1>
    <hr />



    <div class="card container mt-4 border border border-success bg-light">

        <div class="card-body">
            
            <p>Product_id : {{$product->product_id}}</p>
            <p>Name : {{$product->name}}</p>
            <p>Price : {{$product->price}}</p>
            <p>Brand : {{$product->brand}}</p>

            <form action="{{route('userProducts.destroy', $product->product_id)}}" 
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
    
