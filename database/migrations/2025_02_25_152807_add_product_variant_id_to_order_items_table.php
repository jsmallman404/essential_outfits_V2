<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('carts', function (Blueprint $table) {
        $table->foreignId('product_variant_id')->after('product_id')->constrained()->onDelete('cascade');
        $table->dropColumn('size'); // Remove old size column
    });
}

public function down()
{
    Schema::table('carts', function (Blueprint $table) {
        $table->string('size'); // Re-add size column if needed
        $table->dropColumn('product_variant_id');
    });
}
};
