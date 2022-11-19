
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('land_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_property_id')->constrained()->onDelete('cascade');
            $table->foreignId('land_usage_id')->nullable();
            $table->unsignedBigInteger('cadastral_nr');
            $table->float('total_area(ha)');
            $table->date('measurement_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('land_units');
    }
};
