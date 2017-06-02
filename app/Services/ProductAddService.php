<?php
namespace App\Services;

use App\Entities\Product as ProductEntity;
use App\Entities\Money;
use App\Events\ProductCreated;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Entities\Currency;

class ProductAddService
{

    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function addProduct(array $data)
    {
        $id = $data['id'] ?? null;
        $name = $data['name'] ?? null;
        $priceTmp = $data['price'] ?? null;
        
        $priceMoney = new Money($priceTmp, new Currency('EUR'));
        
        $productEntity = ProductEntity::addNewProduct($id, $name, $priceMoney);
        
        $product = $this->productRepository->storeProduct($productEntity);
        
        // fire event
        event(new ProductCreated($product));
        
        return $product;
    }
}
