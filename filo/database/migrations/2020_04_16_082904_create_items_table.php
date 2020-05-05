<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->enum('category', ['Pet','Phone','Jewellery']);
            $table->date('foundtime');
            $table->char('founduser', 50);
            $table->char('foundplace', 100);
            $table->string('colour', 10);
            $table->binary('image');
            $table->text('description', 250);
            $table->string('other', 250)->nullable();
            $table->enum('status', ['available', 'unavailable'])->default('available');
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
        Schema::dropIfExists('items');
    }
}
