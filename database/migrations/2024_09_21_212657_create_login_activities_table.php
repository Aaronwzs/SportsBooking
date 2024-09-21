<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('login_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('ip_address');
            $table->timestamp('login_at'); // Column to store login timestamp
            $table->timestamps(); // Created at and updated at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('login_activities');
    }
}
