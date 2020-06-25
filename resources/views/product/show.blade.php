@extends('layouts.template')

@section('title', 'Dados do produto')

@section('content')
    
    <h1 class="container mt-4">Produto específico do sistema</h1>
    <hr />

    <div class="card container mt-4 border border border-success bg-light">

        <div class="card-body">
            
            <p>Product_id : {{$product->product_id}}</p>
            <p>Name : {{$product->name}}</p>
            <p>Price : {{$product->price}}</p>
            <p>Brand : {{$product->brand}}</p>

            <a href="{{route('products.edit', $product->product_id)}}">
                <button type="submit" class="btn btn-success mt-4">Editar produto acima</button>
            </a>    
      
            <form action="{{route('products.destroy', $product->product_id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mt-4">Deletar produto acima</button>
            </form>

            <form action="{{route('userProducts.store')}}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->product_id}}" />

                <button type="submit" class="btn btn-success mt-4">Adicionar Produto ao carrinho</button>
            </form>

        </div>

    </div>
        
    
@endsection
    