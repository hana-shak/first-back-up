<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedBigInteger('discussions_id')->nullable();
            $table->text('comment_body')->nullable();
            $table->text('comment_image')->nullable();
            $table->boolean('anonymous')->nullable();
            $table->foreign('discussions_id')->references('id')->on('discussions')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
