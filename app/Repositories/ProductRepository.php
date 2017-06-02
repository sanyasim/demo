<?php
namespace App\Repositories;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Product;
use App\Entities\Product as ProductEntity;

class ProductRepository implements ProductRepositoryInterface
{

    public function storeProduct(ProductEntity $product)
    {
        $data = [
            'name' => $product->getName(),
            'price' => $product->getPrice()->getAmount()
        ];
        
        $product = Product::create($data);
        
        return $product;
    }
}