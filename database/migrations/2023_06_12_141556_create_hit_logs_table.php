<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('msisdn')->nullable();
            $table->string('opr');
            $table->text('browser')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('device_os')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('ip');
            $table->date('d_date');
            $table->time('d_time');
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
        Schema::dropIfExists('hit_logs');
    }
}
