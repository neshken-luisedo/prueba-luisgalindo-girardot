<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apis', function (Blueprint $table) {
            $table->id();
            $table->string('consecutive', 191)->nullable();
            $table->unsignedBigInteger('monitor_id');
            $table->string('activity_name', 191);
            $table->date('activity_date');
            $table->time('start_time');
            $table->time('final_hour');
            $table->foreignId('expertise_id')->constrained('expertises');
            $table->foreignId('nac_id')->constrained('nacs');
            $table->foreignId('cultural_right_id')->constrained('cultural_rights');
            $table->timestamps();

            $table->foreign('monitor_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apis');
    }
}
