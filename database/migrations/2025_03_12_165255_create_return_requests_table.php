<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('return_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_item_id')->constrained('order_items')->onDelete('cascade');
            $table->uuid('return_id')->unique();
            $table->string('reason');
            $table->string('status')->default('Pending'); // Possible statuses: Pending, Approved, Rejected
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('return_requests');
    }
};
