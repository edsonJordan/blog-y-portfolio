<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('message');
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');
            $table->unsignedBigInteger('user_id');
            //$table->primary(['commentable_id', 'commentable_type']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->primary(['commentable_id', 'commentable_type']);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
