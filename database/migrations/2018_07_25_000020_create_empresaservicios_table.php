<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaserviciosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'empresaservicios';

    /**
     * Run the migrations.
     * @table empresaservicios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idempresaservicios');
            $table->string('nit', 45)->nullable();
            $table->string('nomempresa', 45);
            $table->string('contacto', 45);
            $table->string('dir', 45)->nullable();
            $table->integer('idservicios');
            $table->integer('logicdel')->nullable();

            $table->index(["idservicios"], 'fk_idservic_servic_serviciosid_idx');
            $table->nullableTimestamps();


            $table->foreign('idservicios', 'fk_idservic_servic_serviciosid_idx')
                ->references('idservicios')->on('servicios')
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
