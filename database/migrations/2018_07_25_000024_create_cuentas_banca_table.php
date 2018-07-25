<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentasBancaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'cuentas_banca';

    /**
     * Run the migrations.
     * @table cuentas_banca
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcuentas_banca');
            $table->unsignedInteger('idbancos');
            $table->string('no_cuenta', 144);
            $table->integer('idtiposdecuentas');
            $table->string('nom_titular', 144);
            $table->string('descrip', 144)->nullable();
            $table->unsignedInteger('logicdel')->nullable();

            $table->index(["idbancos"], 'fk_bancos_cuentabanca_idx');

            $table->index(["idtiposdecuentas"], 'fk_cuentas_idtpontas_ids_cuentasbanca_idx');
            $table->nullableTimestamps();


            $table->foreign('idbancos', 'fk_bancos_cuentabanca_idx')
                ->references('idbancos')->on('bancos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('idtiposdecuentas', 'fk_cuentas_idtpontas_ids_cuentasbanca_idx')
                ->references('idtiposdecuentas')->on('tiposdecuentas')
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
