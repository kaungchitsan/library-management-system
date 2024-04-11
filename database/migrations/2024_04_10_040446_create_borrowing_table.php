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
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->cascadeOnUpdate()->onDelete('cascade');
            $table->timestamp('borrowed_from_date')->useCurrent();
            $table->timestamp('borrowed_to_date')->useCurrent();
            $table->timestamp('returned_at')->nullable();
            $table->integer('borrowed_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};
