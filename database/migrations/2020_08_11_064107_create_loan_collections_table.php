<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('loan_id');
            $table->unsignedInteger('user_id')->nullable();

            $table->integer('loan_amount');
            $table->string('status')->default('open');
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
        Schema::dropIfExists('loan_collections');
    }
}
