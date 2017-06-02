<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductIndexRequest;
use App\Jobs\ProductIndex;
use App\Jobs\ProductStore;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductIndexRequest $request)
    {
        $data = $this->dispatch(new ProductIndex($request->postFillData()));
        
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $this->dispatch(new ProductStore($request->postFillData()));
        
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, Product $product)
    {
        $product->fill($request->postFillData());
        $product->save();
        
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::purchaseProduct($id);
        
        return $product;
    }
}
