@extends('layouts.logged')

@section('title', 'Editar produto')

@section('content')

    <h1 class="container mt-4">Edite e atualize os dados de algum produto !</h1>

    <hr />

    <div class="card container mt-4 border border-success">

        <div class="card-body">

            <form action="{{route('products.update', $product->product_id)}}" method="POST">
                @method('PUT')
                @csrf
                <label for="name">Nome do produto : </label>
                <input type="text" class="form-control" name="name" id="name" 
                placeholder="digite o nome do produto" value="{{$product->name}}"/>
        
                <label for="price">Preço do produto : </label>
                <input type="text" class="form-control" name="price" id="price"
                placeholder="digite o preço do produto" value="{{$product->price}}"/>
        
                <label for="brand">Marca do produto (opcional) : </label>
                <input type="text" class="form-control" name="brand" id="brand" 
                placeholder="digite a marca do produto" value="{{$product->brand}}"/>
        
                <button class = "btn btn-success mt-4" 
                type="submit">Editar dados acima !</button>
        
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