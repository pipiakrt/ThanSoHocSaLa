<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('province_id')->nullable()->index();
            $table->integer('district_id')->nullable()->index();
            $table->integer('ward_id')->nullable()->index();
            $table->integer('user_id')->nullable()->index();
            $table->integer('lendon_id')->nullable()->index();
            $table->integer('sale_id')->nullable()->index();
            $table->integer('mkt_id')->nullable()->index();
            $table->integer('xacnhan_id')->nullable()->index();
            $table->integer('kichhoat_id')->nullable()->index();
            $table->integer('product_id')->index();
            $table->string('name')->nullable();
            $table->string('product_name')->nullable();
            $table->string('code')->nullable();
            $table->string('avatar')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('bat_dau')->nullable();
            $table->string('ket_thuc')->nullable();
            $table->string('price')->nullable();
            $table->mediumText('note')->nullable();
            $table->string('payment')->nullable();
            $table->string('address')->nullable();
            $table->integer('licenses')->default(0)->index();
            $table->boolean('status')->default(0)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
