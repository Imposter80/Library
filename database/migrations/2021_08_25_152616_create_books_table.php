<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('pages');
            $table->date('redaction');
            $table->foreignId('author_id');
            $table->foreignId('library_id');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('library_id')
                ->references('id')
                ->on('libraries')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
