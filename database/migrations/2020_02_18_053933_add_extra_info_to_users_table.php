<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->after('email')->nullable();
            $table->string('dob')->after('gender')->nullable();
            $table->string('avatar')->after('dob')->default('images/default-user-image.png');
            $table->boolean('active')->after('avatar')->default(1);
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
        
            $table->dropColumn('gender');
            $table->dropColumn('dob');
            $table->dropColumn('avatar');
            $table->dropColumn('active');
        });
    }
}
