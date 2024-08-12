<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('khuyen_mais', function (Blueprint $table) {
            $table->id();
            $table->string('enscription')->nullable();
            $table->string('maKM')->unique();
            $table->double('price_sale', 15, 2);
            $table->integer('giaPT')->nullable()->default(0);
            $table->integer('soluong')->default(0);
            $table->string('is_active')->default('noActive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khuyen_mais');
    }
};
