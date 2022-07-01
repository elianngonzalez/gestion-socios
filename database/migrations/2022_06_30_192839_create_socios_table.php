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
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('id');   
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('doc', 9);
            //$table->foreignId('tipo-doc-id');
            $table->date('fecha_nac', 10);
            $table->string('lugar_nac', 50);
            $table->string('nacionalidad', 50);
            $table->string('profesion', 50);
            $table->string('domicilio', 50);
            $table->string('email', 50);
            $table->string('tel_laboral', 50);
            $table->string('tel_residencia', 50);
            //$table->foreignId('localidades-id');
            //$table->foreignId('estados-civiles-id');
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
        Schema::dropIfExists('socios');
    }
};
