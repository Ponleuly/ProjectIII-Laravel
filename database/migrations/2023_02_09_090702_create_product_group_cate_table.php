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
        Schema::create('product_group_cate', function (Blueprint $table) {
            $table->id();

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
        Schema::dropIfExists('product_group_cate');
    }
};
