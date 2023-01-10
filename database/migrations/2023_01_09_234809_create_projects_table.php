<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('excerpt');
            $table->text('description');
            $table->date('publish_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamps();
        });

        Schema::create('person_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()
                ->references('id')->on('people')
                ->constrained();
            $table->foreignId('project_id')->nullable()
                ->references('id')->on('projects')
                ->constrained();
            $table->date('project_start_date')->nullable()
                ->constrained();
            $table->date('project_end_date')->nullable()
                ->constrained();
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
        Schema::dropIfExists('projects');
    }
};
