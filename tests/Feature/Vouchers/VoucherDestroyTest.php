<?php
namespace Tests\Feature\Vouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoucherDestroyTest extends TestCase
{

    public function testVoucherDestroy()
    {
        $id = 2;
        
        $response = $this->json('DELETE', '/api/vouchers/' . $id);
        
        $response->assertStatus(200);
    }
}
