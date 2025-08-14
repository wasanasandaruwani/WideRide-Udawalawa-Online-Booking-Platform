<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['jeep_id']);
            $table->dropColumn('jeep_id');
            $table->foreignId('safari_package_id')->after('user_id')->constrained('safari_packages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['safari_package_id']);
            $table->dropColumn('safari_package_id');
            $table->foreignId('jeep_id')->constrained();
        });
    }
};
