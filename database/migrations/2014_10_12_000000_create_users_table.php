<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('card_name')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_year')->nullable();
            $table->string('card_month')->nullable();
            $table->string('card_cvc')->nullable();
            $table->tinyInteger('pay_setting')->default(1);
            $table->tinyInteger('role')->default(1);
            $table->timestamp('login_at')->nullable();
            $table->string('image')->nullable();
            $table->string('company_name')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('segment')->nullable();
            $table->tinyInteger('exit')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
