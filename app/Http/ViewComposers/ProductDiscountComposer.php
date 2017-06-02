<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Product;

class ProductDiscountComposer
{

    /**
     * Bind data to the view.
     *
     * @param View $view            
     * @return void
     */
    public function compose(View $view)
    {
        $product = $view['product'];
        $discount = Product::calculateDiscount($product->vouchers->toArray(), $product->price);
        
        $view->with('discount', $discount);
    }
}