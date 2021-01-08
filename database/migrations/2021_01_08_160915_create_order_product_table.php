<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('quantity');

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            if(Schema::hasColumn('order_product','order_id')) {
                $table->dropForeign(['order_id']);
            }
            if(Schema::hasColumn('order_product','product_id')) {
                $table->dropForeign(['product_id']);
            }
        });

        Schema::dropIfExists('order_product');
    }
}
