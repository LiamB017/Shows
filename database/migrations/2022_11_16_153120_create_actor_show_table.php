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
        Schema::create('actor_show', function (Blueprint $table) {
            $table->id();
        

            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('show_id');

            $table->foreign('actor_id')->references('id')->on('actors')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('show_id')->references('id')->on('shows')->onUpdate('cascade')->onDelete('restrict');
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
        Schema::dropIfExists('actor_show');
    }
};
