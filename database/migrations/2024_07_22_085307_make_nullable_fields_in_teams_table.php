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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('instagram')->nullable()->change();
            $table->string('linkedin')->nullable()->change();
            $table->string('behance')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->string('instagram')->nullable(false)->change();
            $table->string('linkedin')->nullable(false)->change();
            $table->string('behance')->nullable(false)->change();
        });
    }
};
