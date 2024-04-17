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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            $table->char('code', 11);
            $table->string('email')->unique();
            $table->string('address', 255);
            $table->string('company', 60);
            $table->string('phone', 11); // confirmar número de caracteres
            $table->char('telephone',8)->nullable(); // confirmar número de caracteres
            $table->enum('category', ["Profissional", "Associado", "Estudante"]);
            $table->enum('status', ['Aguardando pagamento', 'Paga', "Cancelada"])->default('Aguardando pagamento');
            $table->string('value');
            $table->string('password');
            $table->unsignedBigInteger("course_id");
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
