php artisan serve<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // aggiungo la nuova colonna alla tabella posts
            $table->unsignedBigInteger('category_id')->nullable();

            // creo la relazione con: nome colonna che avrà la FK, a quale colonna della tabella principale deve fare riferimento, quale tabella utilizzare 
            $table->foreign('category_id')->references('id')->on('posts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
