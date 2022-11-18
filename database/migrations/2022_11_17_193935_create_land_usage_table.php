<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    private const LAND_USAGE_TYPE = [
        'lauksaimniecības zeme',
        'meža zeme',
        'zeme zem ūdeņiem',
        'apbūves platība'
    ];

    public function up()
    {
        Schema::create('land_usage', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });

        // Insert default values
        foreach (self::LAND_USAGE_TYPE as $type) {
            DB::table('land_usage')->insert(['type' => $type]);
        }
    }

    public function down()
    {
        Schema::dropIfExists('land_usage');
    }
};
