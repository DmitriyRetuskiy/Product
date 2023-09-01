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
//        Schema::create('roles', function (Blueprint $table) {
//            $table->bigIncrements('id');
//            $table->integer('id_user')->nullable();;
//            $table->char('name');
//            $table->char('role');
//            $table->timestamps();
//        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('roles', 'id_user');
//        Schema::dropIfExists('roles');
    }
};
