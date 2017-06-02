<?php
namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductDestroyTest extends TestCase
{

    public function testProductDestroy()
    {
        $id = 1;
        
        $response = $this->json('DELETE', '/api/products/' . $id);
        
        $response->assertStatus(200);
    }
}
