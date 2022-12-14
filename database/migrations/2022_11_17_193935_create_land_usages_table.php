<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('land_usages', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('land_usages');
    }
};
