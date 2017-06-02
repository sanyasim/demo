<?php
namespace Tests\Feature\ProductVouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductVoucherShowTest extends TestCase
{

    public function testProductVoucherShow()
    {
        $id = 1;
        $product = 2;
        
        $response = $this->get('/api/products/' . $product. '/vouchers/' . $id);
        
        $response->assertStatus(200);
    }
}
