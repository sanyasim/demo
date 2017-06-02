<?php
namespace Tests\Feature\ProductVouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductVoucherUpdateTest extends TestCase
{

    public function testProductVoucherUpdate()
    {
        $id = 1;
        
        $response = $this->json('PUT', '/api/products/' . $id . '/vouchers/' . $id);
        
        $response->assertStatus(200);
    }
}
