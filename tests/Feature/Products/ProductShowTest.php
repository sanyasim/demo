<?php
namespace Tests\Feature\Products;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductShowTest extends TestCase
{

    public function testProductShow()
    {
        $id = 2;
        
        $response = $this->get('/api/products/' . $id);
        
        $response->assertStatus(200);
    }
}
