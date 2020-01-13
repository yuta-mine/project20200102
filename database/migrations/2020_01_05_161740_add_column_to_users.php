<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('img_name2')->nullable();
            $table->string('img_name3')->nullable();
            $table->string('img_name4')->nullable();
            $table->string('img_name5')->nullable();
            $table->string('img_name6')->nullable();
            $table->string('img_name7')->nullable();
            $table->string('hobby1')->nullable();
            $table->string('hobby2')->nullable();
            $table->string('hobby3')->nullable();
            $table->string('hobby4')->nullable();
            $table->string('hobby5')->nullable();
            $table->string('school')->nullable();
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
            //
        });
    }
}
