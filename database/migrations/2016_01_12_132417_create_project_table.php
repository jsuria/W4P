<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'project',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('title'); // Title of the project
                $table->string('brief'); // Description in less than 255 characters
                $table->text('description')->nullable(); // Longer description, initially nullable
                $table->string('video_url')->nullable(); // Video URL
                $table->decimal('currency')->default(0); // Currency
                $table->dateTime('starts_at');
                $table->dateTime('ends_at');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('project');
    }
}
