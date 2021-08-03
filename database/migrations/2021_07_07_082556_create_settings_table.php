<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('nameAr');
            $table->string('nameEn');
            $table->string('email');
            $table->string('phone');
            $table->string('phone2');
            $table->longText('ArDescription');
            $table->longText('EnDescription');
            $table->longText('ArMetaDescription');
            $table->longText('EnMetaDescription');
            $table->longText('ArMetaKeywords');
            $table->longText('EnMetaKeywords');
            $table->string('logo');
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
        Schema::dropIfExists('settings');
    }
}
