<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('owner_id')->constrained('content_owners');
            $table->foreignId('type_id')->constrained('content_types');
            $table->string('title');
            $table->string('short_des');
            $table->string('image')->nullable()->default(NULL);
            $table->string('banner_image')->nullable()->default(NULL);
            $table->string('description');
            $table->string('artist_name')->nullable()->default(NULL);
            $table->integer('price');
            $table->string('file_name')->nullable()->default(NULL);
            $table->string('file_size')->nullable()->default(NULL);
            $table->string('location')->nullable()->default(NULL);
            $table->string('insert_date')->nullable()->default(NULL);
            $table->string('update_date')->nullable()->default(NULL);
            $table->string('approve_date')->nullable()->default(NULL);
            $table->string('mapping_status')->nullable()->default(NULL);
            $table->string('owner_status')->nullable()->default(NULL);
            $table->string('status')->default('active');
            $table->string('created_by')->nullable()->default(NULL);
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
        Schema::dropIfExists('contents');
    }
}
