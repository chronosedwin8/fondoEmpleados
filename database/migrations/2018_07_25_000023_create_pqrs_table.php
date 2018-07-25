<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePqrsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pqrs';

    /**
     * Run the migrations.
     * @table pqrs
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idpqr');
            $table->string('cedula', 45);
            $table->string('email', 100);
            $table->dateTime('fecha_suceso');
            $table->integer('idsolicitudes');
            $table->string('asuntopqr', 144);
            $table->string('descrip');
            $table->integer('estado_solicitud');
            $table->integer('logicdel')->nullable();

            $table->index(["idsolicitudes"], 'fk_pqr_idsolicitu_tsolici_id_idx');

            $table->index(["estado_solicitud"], 'fk_estados_estadospqr_idx');
            $table->nullableTimestamps();


            $table->foreign('idsolicitudes', 'fk_pqr_idsolicitu_tsolici_id_idx')
                ->references('idtsolicitudes')->on('tsolicitudes')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('estado_solicitud', 'fk_estados_estadospqr_idx')
                ->references('idestados_pqr')->on('estados_pqr')
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
