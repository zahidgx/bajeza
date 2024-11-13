<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // Columna ID
            $table->string('nombre_cliente'); // Nombre del cliente
            $table->text('descripcion_pedido'); // Descripción del pedido
            $table->string('ubicacion'); // Ubicación
            $table->boolean('enviado')->default(false); // Si el pedido fue enviado
            $table->timestamps(); // Timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
