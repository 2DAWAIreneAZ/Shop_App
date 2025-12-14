<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('valoration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_product')->constrained('product');
            $table->tinyInteger('puntuation')->unsigned()->checkBetween(1, 5);
            $table->text('comment')->nullable();
            $table->date('date');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('valoration');
    }
};
