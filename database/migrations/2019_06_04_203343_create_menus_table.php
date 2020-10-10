<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent')->nullable();
            $table->char('code', 64);
            $table->string('name');
            $table->string('path')->nullable();
            $table->string('icon')->nullable();
            $table->string('variant')->default('info');
            $table->timestamps();
            $table->foreign('parent')->references('id')->on('menus')->onDelete('cascade');
        });
        Schema::create('menu_role', function (Blueprint $table) {
            $table->bigInteger('menu_id', 64);
            $table->string('role');
            $table->timestamps();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_role');
    }
}
