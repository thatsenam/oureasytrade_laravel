<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('member_id');
            $table->string('name');
            $table->string('witness_1_name');
            $table->string('witness_1_mobile');
            $table->string('witness_1_address');
            $table->string('witness_1_profile_picture')->default('storage/users/default.png');

            $table->string('witness_2_name');
            $table->string('witness_2_address');
            $table->string('witness_2_mobile');
            $table->string('witness_2_profile_picture')->default('storage/users/default.png');

            $table->integer('loan_amount');
            $table->integer('interest_rate');
            $table->integer('interest_amount');
            $table->integer('installment');
            $table->integer('installment_tk');
            $table->integer('service_charge');
            $table->integer('time_session');

            $table->integer('paid')->default(0);
            $table->integer('due')->default(0);
            $table->integer('savings')->default(0);
            $table->integer('total_amount');
            

            $table->timestamp('date');
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
        Schema::dropIfExists('loans');
    }
}
