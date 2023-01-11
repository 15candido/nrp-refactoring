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
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->date('demand_start_date');
            $table->date('demand_end_date');

            $table->timestamps();
        });

        Schema::create('demand_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demand_id')->nullable() 
                ->references('id')->on('demands')
                ->constrained();
            $table->foreignId('project_id')->nullable() 
                ->references('id')->on('projects')
                ->constrained();
            $table->integer('quantity')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('demands');
    }
};
