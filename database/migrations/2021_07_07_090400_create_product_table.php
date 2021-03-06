<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('product_unit_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('code',20)->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->text('description');
            $table->string('keywords');
            $table->integer('on_hand');
            $table->integer('deductable');
            $table->unsignedInteger('cost_price');
            $table->unsignedInteger('retail_price');
            $table->unsignedInteger('special_price')->nullable();
            $table->dateTime('special_from')->nullable();
            $table->dateTime('special_to')->nullable();
            $table->boolean('is_service')->default(0);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_feature')->default(0);
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
}
