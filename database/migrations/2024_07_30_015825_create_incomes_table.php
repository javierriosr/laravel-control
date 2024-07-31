<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id(); // ID auto-incremental
            $table->foreignId('user_id') // Clave foránea para el usuario
                  ->constrained() // Define la relación con la tabla 'users'
                  ->onDelete('cascade'); // Elimina los ingresos si se elimina el usuario
            $table->decimal('amount', 10, 2); // Monto con precisión de 10 y 2 decimales
            $table->string('description'); // Descripción del ingreso
            $table->date('date'); // Fecha del ingreso
            $table->timestamps(); // Timestamps de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes'); // Elimina la tabla si no existe
    }
}
