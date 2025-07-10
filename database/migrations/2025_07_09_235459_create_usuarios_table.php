<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();

            $table->string('usuario', 50)->unique();
            $table->string('senha', 255);

            // Campos criptografados precisam ser do tipo TEXT
            $table->text('nome');
            $table->string('email', 100)->unique(); // SEM criptografia
            $table->text('cpf');                    // Com criptografia, precisa ser TEXT

            $table->text('tipo');                   // Também criptografado, então TEXT
            $table->boolean('status')->default(true);

            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
