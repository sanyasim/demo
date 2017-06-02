<?php
namespace Tests\Feature\ProductVouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductVoucherIndexTest extends TestCase
{

    public function testProductVoucherIndex()
    {
        $id = 1;
        
        $response = $this->get('/api/products/' . $id . '/vouchers');
        
        $response->assertStatus(200);
    }
}
