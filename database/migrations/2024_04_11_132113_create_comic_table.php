<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comic', function (Blueprint $table) {
            $table->id();

           $table->string("title");
            $table->text("description")->nullable();
            $table->string("thumb")->nullable();
            $table->double('price',4,2);
            $table->string('series');
            $table->date('sale_date');
            $table->string('type');
            $table->json('artists');
            $table->json('writers');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic');
    }
};
