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
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome', 100);
            $table->integer('idade');
            $table->string('sexo', 50);
            //$table->unsignedBigInteger('id_register');
    

        });
        // Schema::table('children', function(Blueprint $table){
        //     $table->foreignId('id_register')->references('id')->on('registers')->onDelete('cascade');

        //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('children');
    }
};
