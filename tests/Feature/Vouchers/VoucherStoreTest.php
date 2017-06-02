<?php
namespace Tests\Feature\Vouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoucherStoreTest extends TestCase
{

    public function testVoucherStore()
    {
        $data = [
            'start_date' => '2017-04-26',
            'end_date' => '2017-05-26',
            'discount' => 25,
        ];
        
        $response = $this->json('POST', '/api/vouchers', $data);
        
        $response->assertStatus(200)->assertJson($data);
    }
}
