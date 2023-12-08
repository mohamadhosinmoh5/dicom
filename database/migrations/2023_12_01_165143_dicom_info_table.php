<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dicomInfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('dicom_id')->unsigned();
            $table->foreign('dicom_id')->references('id')->on('dicoms')->cascadeOnDelete();
            $table->string('Encoding')->nullable();
            $table->string('Strength')->nullable();
            $table->string('date')->nullable();
            $table->string('Manufacture')->nullable();
            $table->string('Modality')->nullable();
            $table->string('Model')->nullable();
            $table->string('slicesCount')->nullable();
            $table->string('Sequence')->nullable();
            $table->string('Series')->nullable();
            $table->string('UID')->nullable();
            $table->string('Station')->nullable();
            $table->string('bandwidth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dicomInfos');
    }
};
