<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
    public function up()
    {
        Schema::create('ad_views', function (Blueprint $table) {
            $table->id();
            $table->text('directlink')->nullable();
            $table->text('appopenmessenger')->nullable();
            $table->text('appopenlink')->nullable();
            $table->text('appopenbanner')->nullable();
            $table->text('bannermessenger')->nullable();
            $table->text('bannerlink')->nullable();
            $table->text('bannerimg')->nullable();
            $table->text('inter')->nullable();
            $table->text('img')->nullable();
            $table->text('messenger')->nullable();
            $table->text('link')->nullable();
            $table->text('hlbannerimg')->nullable();
            $table->text('hlbannerlink')->nullable();
            $table->text('hlbannermessenger')->nullable();
            $table->text('hlinter')->nullable();
            $table->text('hlimg')->nullable();
            $table->text('hlmessenger')->nullable();
            $table->text('hllink')->nullable();
            $table->text('videoad')->nullable();
            $table->text('testad')->nullable();
            $table->text('test_no')->nullable();
            $table->text('imglink')->nullable();
            $table->text('message')->nullable();
            $table->text('messagelink')->nullable();
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
        Schema::dropIfExists('ad_views');
    }
}
