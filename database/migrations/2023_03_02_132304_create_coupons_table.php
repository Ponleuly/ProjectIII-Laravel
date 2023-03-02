<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campaign_name');
            $table->string('code');
            $table->string('percentage');
            $table->unsignedDecimal('discount_value');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->unsignedInteger('group_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id');

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
        Schema::dropIfExists('coupons');
    }
};
