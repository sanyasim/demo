<?php
use Illuminate\Database\Seeder;

use App\Voucher;

class VouchersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Voucher::class, 1)->create();
        
        DB::table('vouchers')->insert([
            'start_date' => '2017-04-20',
            'end_date' => '2017-05-26',
            'discount' => 25
        ]);
        
        DB::table('vouchers')->insert([
            'start_date' => '2017-04-26',
            'end_date' => '2017-06-28',
            'discount' => 15
        ]);
        
        DB::table('vouchers')->insert([
            'start_date' => '2017-03-26',
            'end_date' => '2017-05-21',
            'discount' => 20
        ]);
    }
}
