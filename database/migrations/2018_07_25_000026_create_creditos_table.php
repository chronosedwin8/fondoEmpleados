<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'creditos';

    /**
     * Run the migrations.
     * @table creditos
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idcreditos');
            $table->unsignedInteger('idtipos_de_credito')->nullable();
            $table->string('cedula_titular', 45);
            $table->decimal('monto', 10, 3)->nullable();
            $table->date('fecha_solicitud_prestamo')->nullable();
            $table->date('fecha_desembolso')->nullable();
            $table->unsignedInteger('No_Meses')->nullable();
            $table->string('cedula_codeudorA', 45);
            $table->string('cedula_codeudorB', 45);
            $table->string('cedula_codeudorC', 45)->nullable();
            $table->string('revisado_por', 45);
            $table->string('aprobado_por', 45);
            $table->date('fecha_revision')->nullable();
            $table->date('fecha_aprobacion')->nullable();
            $table->string('No_transaccion_bancaria', 120)->nullable();
            $table->unsignedInteger('cuenta_desembolso');

            $table->index(["cedula_titular"], 'fk_usuarios_creditos_idx');

            $table->index(["idtipos_de_credito"], 'fk_tipos_credito_creditos_idx');

            $table->index(["cuenta_desembolso"], 'fk_cuentasBancarias_creditos_idx');


            $table->foreign('idtipos_de_credito', 'fk_tipos_credito_creditos_idx')
                ->references('idtipos_de_creditos')->on('tipos_de_creditos')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('cuenta_desembolso', 'fk_cuentasBancarias_creditos_idx')
                ->references('idcuentas_banca')->on('cuentas_banca')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('cedula_titular', 'fk_usuarios_creditos_idx')
                ->references('cedula')->on('usuarios')
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
