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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('apellido', 100)->nullable();
            $table->string('cedula' ,12)->nullable();
            $table->string('email' ,100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('usuario' ,30)->unique();
            $table->enum('sexo', ['masculino', 'femenino'])->nullable();
            $table->date('f_nacimiento')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('city' ,50)->nullable();
            $table->string('direccion', 100)->nullable();
            $table->string('telefono' ,100)->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
