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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->nullable()->constrained('cities')->cascadeOnDelete();
            $table->foreignId('project_category_id')->nullable()->constrained('projects_categories')->cascadeOnDelete();
            $table->string('name_en');
            $table->string('name_ar');
            $table->smallInteger('progress')->default(0);
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('address');
            $table->smallInteger('status')->default(0)->comment('0=>Inactive,1=>Active');
            $table->smallInteger('featured')->default(0)->comment('0=>normal,1=>featured');
            $table->string('master_photo')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
