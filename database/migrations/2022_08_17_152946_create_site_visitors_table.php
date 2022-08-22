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
        Schema::create('site_visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
            $table->string('country_name');
            $table->string('country_code');
            $table->string('region_code');
            $table->string('region_name');
            $table->string('city_name');
            $table->string('zip_code');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('area_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_visitors');
    }
};
