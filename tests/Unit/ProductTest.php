<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Voucher;
use App\Product;

class ProductTest extends TestCase
{
    /**
     * @dataProvider discountsProvider
     */
    public function testProductDiscountCalculation($vouchers, $price, $expected)
    {
        $price = Product::calculateDiscount($vouchers, $price);
        
        $this->assertEquals($expected, $price);
    }
    
    public function discountsProvider()
    {
        $vouchers1 = array();
        $vouchers1[] = [
            'discount' => 10
        ];
        $vouchers1[] = [
            'discount' => 25
        ];
        
        $vouchers2 = array();
        $vouchers2[] = [
            'discount' => 15
        ];
        $vouchers2[] = [
            'discount' => 25
        ];
        $vouchers2[] = [
            'discount' => 25
        ];
        
        return [
            [$vouchers1, 93455, 607.45],
            [$vouchers2, 93455, 373.82],
        ];
    }
}
