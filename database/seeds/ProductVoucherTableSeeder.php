<?php
use Illuminate\Database\Seeder;

use App\Product;
use App\Voucher;

class ProductVoucherTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::all()->each(function ($product) {
            $product->vouchers()
                ->sync([
                1
            ]);
        });
        
    }
}
