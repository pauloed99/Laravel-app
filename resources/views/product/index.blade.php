@extends('layouts.template')

@section('title', 'produtos cadastrados')

@section('content')
    
    <h1 class="container mt-4">Produtos cadastrados no sistema</h1>
    <hr />

    @foreach ($products as $product)

        <div class="card container mt-4 border border border-success bg-light">

            <div class="card-body">
                
                <p>Product_id : {{$product->product_id}}</p>
                <p>Name : {{$product->name}}</p>
                <p>Price : {{$product->price}}</p>
                <p>Brand : {{$product->brand}}</p>
                
            </div>

        </div>
        
    @endforeach
    

@endsection
    
