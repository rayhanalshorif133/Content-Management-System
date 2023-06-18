<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('msisdn')->nullable();
            $table->string('opr');
            $table->string('channel')->nullable();
            $table->string('service')->nullable();
            $table->string('subs_source')->nullable();
            $table->string('unsubs_source')->nullable();
            $table->string('browser')->nullable();
            $table->dateTime('entry')->nullable();
            $table->dateTime('last_update')->nullable();
            $table->string('sub_service')->nullable();
            $table->dateTime('subs_date')->nullable();
            $table->dateTime('unsubs_date')->nullable();
            $table->string('shortcode')->default('25656');
            $table->string('flag')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->dateTime('created')->now();
            $table->dateTime('modified')->now();
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
        Schema::dropIfExists('subscribers');
    }
}
