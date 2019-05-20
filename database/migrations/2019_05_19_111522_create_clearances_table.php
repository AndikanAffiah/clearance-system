<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClearancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->boolean('is_submitted')->nullable();
            $table->boolean('is_cleared')->nullable();
            $table->timestamps();
        });

        
        Schema::table('clearances', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('clearances', function($table) {
            $table->dropForeign('clearances_user_id_foreign'); 
        });
        
        Schema::dropIfExists('clearances');
    }
}
