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
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('product_category_id')->nullable()->constrained('products_categories')->cascadeOnDelete();
            $table->foreignId('unit_id')->nullable()->constrained('units')->cascadeOnDelete();
            $table->string('name_en');
            $table->string('name_ar')->nullable();
            $table->smallInteger('quantity')->default(0);
            $table->double('price')->default(0.00);
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('main_pic')->nullable();
            $table->smallInteger('featured')->default(0)->comment('0=>normal, 1=>Featured');
            $table->softDeletes();
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