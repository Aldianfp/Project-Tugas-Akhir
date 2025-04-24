<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('companies', function (Blueprint $table) {
        $table->id();
        $table->text('visi');
        $table->text('misi');
        $table->text('kebijakan');
        $table->text('jasapelayanan');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('companies');
}

};
