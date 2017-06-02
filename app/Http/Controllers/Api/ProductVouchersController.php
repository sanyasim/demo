<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Voucher;

class ProductVouchersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return $product->vouchers()->get();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function show($productId, $voucherId)
    {
        $voucher = Voucher::findOrFailVoucherWithProductExists($voucherId, $productId);
        return $voucher;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request            
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function update($productId, $voucherId)
    {
        $product = Product::findOrFail($productId);
        $voucher = Voucher::findOrFail($voucherId);
        
        $product->vouchers()->syncWithoutDetaching([
            $voucherId
        ]);
        
        return $voucher;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product            
     * @return \Illuminate\Http\Response
     */
    public function destroy($productId, $voucherId)
    {
        $product = Product::findOrFail($productId);
        $voucher = Voucher::findOrFailVoucherWithProductExists($voucherId, $productId);
        
        $product->vouchers()->detach($voucherId);
        
        return $voucher;
    }
    
}
