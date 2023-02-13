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
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 100);
            $table->string('product_des', 500);
            $table->unsignedInteger('product_stock');

            $table->unsignedDecimal('product_price', 5, 2);
            $table->unsignedDecimal('product_saleprice', 5, 2);

            $table->string('product_imgcover', 100);

            $table->string('color_id');
            $table->string('size_id');

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('product_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')
                ->references('id')
                ->on('product_groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('product_details');
    }
};
