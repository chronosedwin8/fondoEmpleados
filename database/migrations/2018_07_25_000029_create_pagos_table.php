<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'pagos';

    /**
     * Run the migrations.
     * @table pagos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idpagos');
            $table->string('cedula_titular', 45);
            $table->unsignedInteger('No_credito');
            $table->decimal('valor_pagado', 10, 2);
            $table->unsignedInteger('mes');

            $table->index(["cedula_titular"], 'fk_usuarios_pagos_idx');

            $table->index(["mes"], 'fk_mes_pagos_idx');

            $table->index(["No_credito"], 'fk_credito_pagos_idx');


            $table->foreign('cedula_titular', 'fk_usuarios_pagos_idx')
                ->references('cedula')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('mes', 'fk_mes_pagos_idx')
                ->references('idmeses')->on('meses')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('No_credito', 'fk_credito_pagos_idx')
                ->references('idcreditos')->on('creditos')
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
