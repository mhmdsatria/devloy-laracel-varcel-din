<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detail_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelayanan_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->text('detail'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pelayanans');
    }
};

