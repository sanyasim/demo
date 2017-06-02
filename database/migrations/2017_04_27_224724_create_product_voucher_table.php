<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVoucherTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('product_voucher', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('voucher_id');
            
            $table->primary(['product_id', 'voucher_id']);
            $table->index('product_id', 'index_product_id');
            $table->index('voucher_id', 'index_voucher_id');
            
            //             $table->foreign('product_id')
            //             ->references('id')
            //             ->on('products')
            //             ->onDelete('cascade');
            //             ;
                        
            //             $table->foreign('voucher_id')
            //             ->references('id')
            //             ->on('vouchers')
            //             ->onDelete('cascade');
            //             ;
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::drop('product_voucher');
    }
}
