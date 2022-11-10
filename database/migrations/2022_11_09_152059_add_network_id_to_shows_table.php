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
        Schema::table('shows', function (Blueprint $table) {
            $table->unsignedBigInteger('network_id');
            $table->foreign('network_id')->references('id')->on('networks')->onUpdate('cascade')->onDelete('restrict');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shows', function (Blueprint $table) {


            $table->dropForeign(['network_id']);
            $table->dropColumn('network_id');
            //
        });
    }
};
