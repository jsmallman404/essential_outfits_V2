<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressPostCodeCityRoleToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adding new columns
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('city')->nullable();
            $table->enum('role', ['user', 'admin'])->default('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns
            $table->dropColumn('address');
            $table->dropColumn('post_code');
            $table->dropColumn('city');
            $table->dropColumn('role');
        });
    }
}