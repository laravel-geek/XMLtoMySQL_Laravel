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
        //
        Schema::create('data', function (Blueprint $table) {
            $table->unsignedInteger('id')->unique();
            $table->string('mark', 50 )->default(null);
            $table->string('model', 50)->default(null);
            $table->string('generation', 100)->nullable()->default(null);
            $table->year('year')->nullable()->default(null);
            $table->unsignedMediumInteger('run')->nullable()->default(null);
            $table->string('color',50)->nullable()->default(null);
            $table->string('body_type',50)->nullable()->default(null);
            $table->string('engine_type',20)->nullable()->default(null);
            $table->string('transmission',100)->nullable()->default(null);
            $table->string('gear_type', 50)->nullable()->default(null);
            $table->unsignedInteger('generation_id')->nullable()->default(null);
            $table->unsignedTinyInteger('in_xml')->nullable()->default(0);
            $table->index('mark');
            $table->index('model');
            $table->index('generation');
            $table->index('year');
            $table->index('color');
            $table->index('body_type');
            $table->index('engine_type');
            $table->index('transmission');
            $table->index('gear_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
};
