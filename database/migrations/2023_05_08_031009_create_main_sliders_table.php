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
        Schema::create('main_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('small_head_en')->nullable();
            $table->string('small_head_ar')->nullable();
            $table->string('head_en');
            $table->string('head_ar');
            $table->string('photo');
            $table->string('link')->nullable();
            $table->smallInteger('status')->default(0)->comment('0=>Inactive,1=>Active');
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
        Schema::dropIfExists('main_sliders');
    }
};
