@extends('layouts.template')

@section('title', 'Seus produtos')

@section('content')
    
    <h1 class="container mt-4">Produtos que você pretende comprar !</h1>
    <hr />

    @foreach ($userProducts as $userProduct)

        <div class="card container mt-4 border border border-success bg-light">

            <div class="card-body">
                
                <p>Product_id : {{$product->product_id}}</p>
                <p>Name : {{$product->name}}</p>
                <p>Price : {{$product->price}}</p>
                <p>Brand : {{$product->brand}}</p>

                <form action="{{route('userProducts.store', $product->product_id)}}" 
                method="POST">
                    <button class="btn btn-success mt-4" type="submit">
                        Adicionar Produto para comprar !
                    </button>
                </form>
                
            </div>

        </div>
        
    @endforeach
    

@endsection
    
