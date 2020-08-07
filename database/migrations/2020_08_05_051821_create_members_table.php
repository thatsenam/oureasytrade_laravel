<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('avatar')->default('users/default.png');
            $table->string('nid');
            $table->string('mobile')->nullable();
            $table->timestamp('date');
            $table->string('nominee_name');
            $table->string('nominee_address');
            $table->string('nominee_mobile');
            $table->integer('last_withdraw')->default(0);
            $table->integer('last_deposit')->default(0);
            $table->integer('credit')->default(0);
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
        Schema::dropIfExists('members');
    }
}
