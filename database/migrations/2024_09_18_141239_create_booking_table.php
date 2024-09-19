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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('ref_code', 10) -> nullable();
            $table->integer('user_id');
            $table->string('facility_id');
            $table->date('booking_date');
            $table->time('time_from');
            $table->time('time_to');
            $table->integer('status');
            $table->timestamp('date_created')->useCurrent();
            $table->timestamp('date_updated')->useCurrent()->useCurrentOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking');
    }
};
