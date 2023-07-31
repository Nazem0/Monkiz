<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
{
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maintenance_center_id');
            $table->unsignedBigInteger('task_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('maintenance_center_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

            $table->foreign('task_id')
                  ->references('id')->on('tasks')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offers');
    }
}