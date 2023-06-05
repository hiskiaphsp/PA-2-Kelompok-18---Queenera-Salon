<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResetPasswordFieldsToUsersTable extends Migration
{
    public function up()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->string('reset_token')->nullable();
        //     $table->timestamp('reset_token_expiry')->nullable();
        // });
    }

    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn('reset_token');
        //     $table->dropColumn('reset_token_expiry');
        // });
    }
}
