<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
          
            $table->string('title')->default('The Sopranos');
            $table->string('genre')->default('drama');
            $table->string('synopsis')->default('MIMIMI');
            $table->integer('user_rating')->default('5');
            $table->string('creator')->default('David Simon');
            $table->integer('seasons')->default('1');
            $table->string('src')->default('blah');
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
        Schema::dropIfExists('shows');
    }
};
