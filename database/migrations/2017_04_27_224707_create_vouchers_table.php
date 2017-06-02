<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('discount')->nullable();
            $table->timestamps();
            
            $table->index('start_date', 'index_start_date');
            $table->index('end_date', 'index_end_date');
            $table->index('discount', 'index_discount');
            
            $table->foreign('discount')
            ->references('discount')
            ->on('discounts')
            ->onDelete('restrict');
            ;
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
        
        Schema::drop('vouchers');
    }
}
