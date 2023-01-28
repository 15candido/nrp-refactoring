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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('demand_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demand_id')->nullable()->constrained();
            $table->foreignId('item_id')->nullable()->constrained();
            $table->integer('quantity');
            $table->string('note');
            $table->timestamps();
        });

        Schema::create('item_person', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->nullable()->constrained();
            $table->foreignId('person_id')->nullable()->constrained();
            $table->integer('quantity');
            $table->string('note');
            $table->date('donate_date');
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
};
