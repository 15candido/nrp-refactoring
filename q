[33mcommit fbbecb670a8cc7e89828fe304342ee00a444e525[m[33m ([m[1;36mHEAD -> [m[1;32mitems[m[33m)[m
Author: Cândido Silva <candido.da.silva.ca@gmail.com>
Date:   Thu Jan 12 13:02:07 2023 +0000

    Remoção das references alargadas para constarined, que têm a mesma função, contudo mais breve...,  e especificar as acções onUpdate e onDelete desejadas.

[1mdiff --git a/database/migrations/2022_09_30_213558_create_people_table.php b/database/migrations/2022_09_30_213558_create_people_table.php[m
[1mindex 41695e1..4c9dfcd 100644[m
[1m--- a/database/migrations/2022_09_30_213558_create_people_table.php[m
[1m+++ b/database/migrations/2022_09_30_213558_create_people_table.php[m
[36m@@ -15,9 +15,9 @@[m [mpublic function up()[m
     {[m
         Schema::create('people', function (Blueprint $table) {[m
             $table->id();[m
[31m-            $table->foreignId('user_id')[m
[31m-                ->nullable()[m
[31m-                ->constrained();[m
[32m+[m[32m            $table->foreignId('user_id')->nullable()[m
[32m+[m[32m                ->constrained()->onUpdate()[m
[32m+[m[32m                ->onDelete();[m
             $table->string('name');[m
             $table->string('username')->nullable()->unique();[m
             $table->string('email')->nullable()->unique();[m
[1mdiff --git a/database/migrations/2023_01_09_234809_create_projects_table.php b/database/migrations/2023_01_09_234809_create_projects_table.php[m
[1mindex 24d038b..c6d9472 100644[m
[1m--- a/database/migrations/2023_01_09_234809_create_projects_table.php[m
[1m+++ b/database/migrations/2023_01_09_234809_create_projects_table.php[m
[36m@@ -28,15 +28,13 @@[m [mpublic function up()[m
         Schema::create('person_project', function (Blueprint $table) {[m
             $table->id();[m
             $table->foreignId('person_id')->nullable()[m
[31m-                ->references('id')->on('people')[m
[31m-                ->constrained();[m
[32m+[m[32m                ->constrained()->onUpdate()[m
[32m+[m[32m                ->onDelete();[m
             $table->foreignId('project_id')->nullable()[m
[31m-                ->references('id')->on('projects')[m
[31m-                ->constrained();[m
[31m-            $table->date('project_start_date')->nullable()[m
[31m-                ->constrained();[m
[31m-            $table->date('project_end_date')->nullable()[m
[31m-                ->constrained();[m
[32m+[m[32m                ->constrained()->onUpdate()[m
[32m+[m[32m                ->onDelete();[m
[32m+[m[32m            $table->date('project_start_date')->nullable();[m
[32m+[m[32m            $table->date('project_end_date')->nullable();[m
             $table->timestamps();[m
         });[m
     }[m
[1mdiff --git a/database/migrations/2023_01_10_153754_create_demands_table.php b/database/migrations/2023_01_10_153754_create_demands_table.php[m
[1mindex ada5a56..d3b2be7 100644[m
[1m--- a/database/migrations/2023_01_10_153754_create_demands_table.php[m
[1m+++ b/database/migrations/2023_01_10_153754_create_demands_table.php[m
[36m@@ -26,12 +26,12 @@[m [mpublic function up()[m
 [m
         Schema::create('demand_project', function (Blueprint $table) {[m
             $table->id();[m
[31m-            $table->foreignId('demand_id')->nullable() [m
[31m-                ->references('id')->on('demands')[m
[31m-                ->constrained();[m
[31m-            $table->foreignId('project_id')->nullable() [m
[31m-                ->references('id')->on('projects')[m
[31m-                ->constrained();[m
[32m+[m[32m            $table->foreignId('demand_id')->nullable()->constrained()[m
[32m+[m[32m                ->onUpdate()[m
[32m+[m[32m                ->onDelete();[m
[32m+[m[32m            $table->foreignId('project_id')->nullable()->constrained()[m
[32m+[m[32m                ->onUpdate()[m
[32m+[m[32m                ->onDelete();[m
             $table->integer('quantity')->nullable();[m
             $table->text('note')->nullable();[m
             $table->timestamps();[m
