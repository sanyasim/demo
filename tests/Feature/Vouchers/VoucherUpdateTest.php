<?php
namespace Tests\Feature\Vouchers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class VoucherUpdateTest extends TestCase
{

    public function testVoucherUpdate()
    {
        $id = 1;
        
        $data = [
            'id' => $id,
            'start_date' => '2017-04-26',
            'end_date' => '2017-05-26',
            'discount' => 10,
        ];
        
        $response = $this->json('PUT', '/api/vouchers/' . $id, $data);
        
        $response->assertStatus(200)->assertJson($data);
    }
}
