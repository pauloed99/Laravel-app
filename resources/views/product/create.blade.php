@extends('layouts.template')

@section('title', 'Criar produto')

@section('content')

    <h1 class="container mt-4">Cadastre os produtos do e-commerce !</h1>
    <hr />

    <div class="card container mt-4">

        <div class="card-body">

            <form action="{{route('products.store')}}" method="POST">
                @csrf

                <label for="name">Nome do Produto : </label>
                <input type="text" name="name" id="name" value="{{old('name')}}"
                placeholder="digite o nome do produto" class="form-control"/>
        
                <label for="price">Preço do Produto : </label>
                <input type="text" name="price" id="price" value="{{old('price')}}"
                placeholder="digite o preço do produto" class="form-control"/>
        
                <label for="brand">Marca do Produto (opcional) : </label>
                <input type="text" name="brand" id="brand" value="{{old('brand')}}"
                placeholder="digite a marca do produto" class="form-control"/>
        
                <button type="submit" class="btn btn-success mt-4">Cadastrar produto</button>
                
            </form>

        </div>

    </div>

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger mt-4">{{$error}}</p>
        @endforeach
    @endif

@endsection