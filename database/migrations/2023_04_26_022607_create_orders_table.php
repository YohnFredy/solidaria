<?php

use App\Models\Order;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('app', 10)->nullable();
            $table->integer('app_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('phone' , 100)->nullable();
            $table->tinyInteger('status')->default(Order::PENDING);
            $table->tinyInteger('asc_points')->default(Order::PTS_ASIGNAR);
            $table->tinyInteger('envio_type')->default(Order::REGISTRO);
            $table->float('costo_total');
            $table->float('iva');
            $table->float('sub_total');
            $table->float('pts');
            $table->json('content')->nullable();

            /* $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade');

            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade'); */

            $table->string('address')->nullable();
            $table->string('references')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
