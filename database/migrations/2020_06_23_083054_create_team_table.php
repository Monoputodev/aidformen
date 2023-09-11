<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',64)->nullable();
            $table->string('slug',64)->nullable();
            $table->string('email',64)->nullable();
            $table->string('phone',64)->nullable();
            $table->string('designation',64)->nullable();
            $table->string('facebook_link',64)->nullable();
            $table->string('twitter_link',64)->nullable();
            $table->string('linkndin_link',64)->nullable();
            $table->string('skype_link',64)->nullable();
            $table->string('education',64)->nullable();
            $table->text('description')->nullable();
            $table->string('image_link',128)->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();

            $table->engine= 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}
