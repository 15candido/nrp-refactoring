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
            $table->foreignId('person_id')->nullable()->constrained()
                ->onUpdate()
                ->onDelete();
            $table->foreignId('project_id')->nullable()->constrained()
                ->onUpdate()
                ->onDelete();
            $table->date('project_start_date')->nullable();
            $table->date('project_end_date')->nullable();
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
