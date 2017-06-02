<?php
use Illuminate\Database\Seeder;

use App\Product;

class ProductsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 1)->create();
        
        DB::table('products')->insert([
            'name' => 'Iphone 1',
            'price' => 86545
        ]);
        
        DB::table('products')->insert([
            'name' => 'Iphone 2',
            'price' => 76545
        ]);
        
        DB::table('products')->insert([
            'name' => 'Iphone 3',
            'price' => 66145
        ]);
        
        DB::table('products')->insert([
            'name' => 'Iphone 4',
            'price' => 82545
        ]);
    }
}
