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
        Schema::create('old_projects_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('old_project_id')->nullable()->constrained('old_projects')->cascadeOnDelete();
            $table->string('photo');
            $table->smallInteger('status')->default(1)->comment('0=>InActive, 1=>Active');
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
        Schema::dropIfExists('old_projects_photos');
    }
};
