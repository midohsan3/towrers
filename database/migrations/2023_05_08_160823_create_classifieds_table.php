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
        Schema::create('classifieds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('classified_package_id')->nullable()->constrained('classifieds_packages')->cascadeOnDelete();
            $table->foreignId('size_id')->nullable()->constrained('sizes')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('title_en');
            $table->string('title_ar');
            $table->string('photo');
            $table->smallInteger('status')->default(0)->comment('0=>new, 1=>approved 2=>active, 3=>inactive,4=>rejected');
            $table->smallInteger('payment_status')->default(0)->comment('0=>unpaid, 1=>paid');
            $table->double('paid_amount')->default(0.00);
            $table->double('refund_amount')->default(0.00);
            $table->string('started_at')->default(now());
            $table->string('ended_at')->default(now());
            $table->string('link')->nullable();
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
        Schema::dropIfExists('classifieds');
    }
};
