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
        Schema::create('asp_codes', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->index();
            $table->string('type')->index();
            $table->boolean('was_used')->default(false);
            $table->string('verifyable_type');
            $table->string('verifyable_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asp_codes');
    }
};
