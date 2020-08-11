<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('thana_id')->default(1)->after('user_id');
            $table->foreign('thana_id')->references('id')->on('thanas');
            $table->decimal('lat', 10, 7)->nullable()->after('thumb');
            $table->decimal('long', 10, 7)->nullable()->after('lat');
            $table->string('address')->nullable()->after('long');
            $table->string('priority')->default('')->after('address');
            $table->boolean('is_confidential')->default(false)->after('priority');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('thana_id');
            $table->dropColumn('thana_id');
            $table->dropColumn('lat');
            $table->dropColumn('long');
            $table->dropColumn('address');
            $table->dropColumn('priority');
            $table->dropColumn('is_confidential');
        });
    }
}
