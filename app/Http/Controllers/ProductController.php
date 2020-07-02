<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreUpdateProductRequest;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->authorize('manage-products');

        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $this->authorize('manage-products');

        $data = $request->all();
        Product::create($data);

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productId)
    {
        $product = Product::where('product_id', $productId)->first();

        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $this->authorize('manage-products');

        $product = Product::where('product_id', $productId)->first();

        return view('product.edit', ['product' => $product]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $productId)
    {
        $this->authorize('manage-products');

        $data = $request->all();

        Product::where('product_id', $productId)->
        update(['name' => $data['name'], 'price' => $data['price'], 'brand' => $data['brand']]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId)
    {
        $this->authorize('manage-products');

        Product::where('product_id', $productId)->delete();

        return redirect()->route('products.index');
    }
}
