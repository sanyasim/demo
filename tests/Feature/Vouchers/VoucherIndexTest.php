<?php
namespace Tests\Feature\Vouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoucherIndexTest extends TestCase
{

    public function testVoucherIndex()
    {
        $response = $this->get('/api/vouchers');
        
        $response->assertStatus(200);
    }
}
