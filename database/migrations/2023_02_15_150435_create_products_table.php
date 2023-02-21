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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name', 100);
            $table->string('product_code', 20);
            $table->string('product_des', 500);
            //$table->unsignedInteger('product_stock');

            $table->unsignedDecimal('product_price', 5, 2);
            $table->unsignedDecimal('product_saleprice', 5, 2);

            $table->string('product_imgcover', 100);
            $table->string('product_color', 10);

            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedInteger('subcategory_id');
            $table->foreign('subcategory_id')
                ->references('id')
                ->on('categories_subcategories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            /*
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            */
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
        Schema::dropIfExists('products');
    }
};
