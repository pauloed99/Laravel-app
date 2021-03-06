@extends('layouts.logged')

@section('title', 'produtos cadastrados')

@section('content')
    
    <h1 class="ml-5 mt-4">Produtos cadastrados no sistema</h1>

    @can('manage-products')
        <a href="{{route('products.create')}}">
            <button class="btn btn-success mt-4 ml-5">Criar produto para o sistema</button>
        </a>  
    @endcan

    <hr />

    @foreach ($products as $product)

        <div class="card container mt-4 border border border-success bg-light">

            <div class="card-body">
                
                <p>Product_id : {{$product->product_id}}</p>
                <p>Name : {{$product->name}}</p>
                <p>Price : R$ {{$product->price}}</p>
                <p>Brand : {{$product->brand}}</p>

                <a href="{{route('products.show', $product->product_id)}}">
                    <button class="btn btn-success mt-4">
                        Ver mais !
                    </button>
                </a>
                
            </div>

        </div>
        
    @endforeach
    

@endsection
    
