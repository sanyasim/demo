<?php
namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductStoreTest extends TestCase
{

    public function testProductStore()
    {
        $data = [
            'name' => 'Ipad 3',
            'price' => 76465,
        ];
        
        $response = $this->json('POST', '/api/products', $data);
        
        $response->assertStatus(200)->assertJson($data);
    }
}
