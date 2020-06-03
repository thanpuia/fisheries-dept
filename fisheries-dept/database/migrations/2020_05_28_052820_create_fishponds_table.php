<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFishpondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fishponds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60)->nullable();
            $table->string('fname',50)->nullable();
            $table->text('address')->nullable();
            $table->string('district',30)->nullable();
            $table->text('location_of_pond')->nullable();
            $table->string('tehsil',60)->nullable();
            $table->string('image')->nullable();
            $table->string('area')->nullable();
            $table->string('epic_no',30)->nullable();
            $table->text('name_of_scheme')->nullable();

            $table->string('pondImages')->nullable();
            $table->double('lat',10,8)->nullable();
            $table->double('lng',10,8)->nullable();
            $table->string('approve')->default('0')->nullable();

            $table->timestamps();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
            ->references('id')
            ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fishponds');
    }
}
