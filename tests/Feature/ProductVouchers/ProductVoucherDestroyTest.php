<?php
namespace Tests\Feature\ProductVouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductVoucherDestroyTest extends TestCase
{

    public function testProductVoucherDestroy()
    {
        $id = 1;
        
        $response = $this->json('DELETE', '/api/products/' . $id . '/vouchers/' . $id);
        
        $response->assertStatus(200);
    }
}
