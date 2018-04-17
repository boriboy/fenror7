<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHumanoidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('humanoids', function (Blueprint $table) {
            $table->increments('id');

            // humanoid name
            $table->string('name');

            // humanoid species
            $table->enum('species', ['kree', 'kryptonian', 'mermanus', 'olympian', 'human', 'skrull']);

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
        Schema::dropIfExists('humanoids');
    }
}
