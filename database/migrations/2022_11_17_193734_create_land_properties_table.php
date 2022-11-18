<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('land_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->unsignedInteger('cadastral_nr');
            $table->unsignedInteger('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('land_properties');
    }
};
