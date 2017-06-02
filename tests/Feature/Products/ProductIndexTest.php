<?php
namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductIndexTest extends TestCase
{

    public function testProductIndex()
    {
        $response = $this->get('/api/products');
        
        $response->assertStatus(200);
    }
}
