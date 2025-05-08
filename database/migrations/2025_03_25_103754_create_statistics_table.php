<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('total_views')->default(0);
            $table->integer('weekly_views')->default(0);
            $table->integer('monthly_views')->default(0);
            $table->integer('active_services')->default(0);
            $table->date('weekly_reset_date')->nullable();
            $table->date('monthly_reset_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
