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
    public function up(): void
    {
        Schema::create('turbine_component', function (Blueprint $table) {
            $table->id();
            $table->foreignId('turbine_id')->constrained()->onDelete('cascade');;
            $table->foreignId('component_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['turbine_id', 'component_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('turbine_component');
    }
};
