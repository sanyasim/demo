<?php
namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductUpdateTest extends TestCase
{

    public function testProductUpdate()
    {
        $id = 2;
        
        $data = [
            'id' => $id,
            'name' => 'Ipad 2',
            'price' => 86445,
        ];
        
        $response = $this->json('PUT', '/api/products/' . $id, $data);
        
        $response->assertStatus(200)->assertJson($data);
    }
}
