<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('firstname');
            $table->string('surname');
            $table->string('cardnumber');
            $table->string('postal_code');
            $table->string('streetname');
            $table->string('housenumber');
            $table->string('city');
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
            $table->dropColumn('firstname');
            $table->dropColumn('surname');
            $table->dropColumn('cardnumber');
            $table->dropColumn('postal_code');
            $table->dropColumn('streetname');
            $table->dropColumn('housenumber');
            $table->dropColumn('city');
        });
    }
}
