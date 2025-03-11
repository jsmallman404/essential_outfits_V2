<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('name')->after('user_id'); // Customer's name
            $table->string('address')->after('name'); // Shipping address
            $table->string('city')->after('address'); // City
            $table->string('post_code')->after('city'); // Postal code
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['name', 'address', 'city', 'post_code']);
        });
    }
};
