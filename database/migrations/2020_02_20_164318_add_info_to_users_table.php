<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('designation')->nullable()->after('dob');
            $table->string('works_at')->nullable()->after('designation');
            // $table->boolean('is_police')->default(false)->after('works_at');
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
            $table->dropColumn('designation');
            $table->dropColumn('works_at');
            // $table->dropColumn('is_police');
        });
    }
}
