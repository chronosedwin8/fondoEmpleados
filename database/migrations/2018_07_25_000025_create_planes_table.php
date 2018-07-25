<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'planes';

    /**
     * Run the migrations.
     * @table planes
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idplanes');
            $table->string('plan', 45)->nullable();
            $table->integer('idservicio');
            $table->integer('idempresa');
            $table->integer('logicdel')->nullable();

            $table->index(["idempresa"], 'idempresasas_planesidemep_idx');

            $table->index(["idservicio"], 'idservi_servicios_idx');
            $table->nullableTimestamps();


            $table->foreign('idempresa', 'idempresasas_planesidemep_idx')
                ->references('idempresaservicios')->on('empresaservicios')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idservicio', 'idservi_servicios_idx')
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
