<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtiquetasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'etiquetas';

    /**
     * Run the migrations.
     * @table etiquetas
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idetiqueta');
            $table->integer('idmodulo');
            $table->string('etiqueta', 45);
            $table->integer('orden');
            $table->string('descrip', 144)->nullable();
            $table->integer('logicdel')->nullable();

            $table->index(["idmodulo"], 'fk_idmodulo_modulo_idmodulo_idx');
            $table->nullableTimestamps();


            $table->foreign('idmodulo', 'fk_idmodulo_modulo_idmodulo_idx')
                ->references('idmodulo')->on('modulos')
                ->onDelete('cascade')
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
