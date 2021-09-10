<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            /** Student Data*/
            $table->string('full_name'); //Nome completo
            $table->decimal('family_income', $precision = 10, $scale = 2)->nullable(); //Renda familiar
            $table->date('birth_date')->nullable(); //Data de nascimento
            $table->string('avatar')->nullable(); //Foto do aluno

            /** Address */
            $table->string('zipcode')->nullable();
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('complement')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();

            $table->timestamps();
        });
    }

    //Nome Completo, Endereço, Renda Familiar, Data de Nascimento;

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
