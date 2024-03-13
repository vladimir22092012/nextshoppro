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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('firstname');
            $table->string('name');
            $table->string('lastname');
            $table->string('company');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('comment');
            $table->string('delivery_type');
            $table->string('payment_type');
            $table->string('status')->default('new');
            $table->string('manager_comment')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
