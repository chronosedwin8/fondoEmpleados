<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAhorrosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'ahorros';

    /**
     * Run the migrations.
     * @table ahorros
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idahorros');
            $table->string('cedula_titular', 45);
            $table->unsignedInteger('mes');
            $table->date('fecha_ingreso')->nullable();
            $table->string('reportado_por', 45)->nullable();
            $table->decimal('valor_ahorro', 10, 2)->nullable();

            $table->index(["cedula_titular"], 'fk_usuarios_ahorros_idx');

            $table->index(["mes"], 'fk_mes_ahorros_idx');


            $table->foreign('cedula_titular', 'fk_usuarios_ahorros_idx')
                ->references('cedula')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('mes', 'fk_mes_ahorros_idx')
                ->references('idmeses')->on('meses')
                ->onDelete('no action')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
