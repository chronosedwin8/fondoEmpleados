<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'usuarios';

    /**
     * Run the migrations.
     * @table usuarios
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cedula');
            $table->string('nombre1', 45);
            $table->string('nombre2', 45)->nullable();
            $table->string('apellido1', 45);
            $table->string('apellido2', 45)->nullable();
            $table->integer('idtipos_user');
            $table->integer('idestados');
            $table->integer('idprofesiones');
            $table->integer('idgeneros');
            $table->integer('idtipocuentauser');
            $table->integer('idjornadalabora');
            $table->integer('idestadocivil');
            $table->integer('idtipocontrato');
            $table->integer('idtiposalario');
            $table->integer('idorigenfondos');
            $table->unsignedInteger('idbancouser');
            $table->string('nocuentauser', 45);
            $table->string('direccion', 45);
            $table->string('cod_postal', 6)->nullable();
            $table->string('telefono', 45);
            $table->string('celular', 45);
            $table->string('barrio', 45)->nullable();
            $table->string('email', 100);
            $table->date('fechaingreso')->nullable();
            $table->date('fechanaci');
            $table->decimal('salario');
            $table->double('porcentaje_ahorro');

            $table->index(["idtipocontrato"], 'fk_usuarios_tipocontratos_tcontrato_tipo_idx');

            $table->index(["idtipos_user"], 'fk_usuarios_TiposUsers_idx');

            $table->index(["idjornadalabora"], 'fk_jornadas_jornadas_jornadas_idx');

            $table->index(["idbancouser"], 'fk_usuarios_banco_banco_banco_idx');

            $table->index(["idprofesiones"], 'fk_usuarios_profesiones_profesiones_idprofesiones_idx');

            $table->index(["idestadocivil"], 'fk_ecivil_user_ecivil_id_idx');

            $table->index(["idestados"], 'fk_usuarios_estados_idx');

            $table->index(["idorigenfondos"], 'fkorigenfon:origenfond_idx');

            $table->index(["idtipocuentauser"], 'fk_tipocuentas_user_tipocuentas_tipocuentas_idx');

            $table->index(["idtiposalario"], 'fk_tiposala_tipos_salrio_idx');

            $table->index(["idgeneros"], 'fk_usuarios_generos_generos_idgeneros_idx');
            $table->nullableTimestamps();


            $table->foreign('idtipos_user', 'fk_usuarios_TiposUsers_idx')
                ->references('idtipos_user')->on('TiposUsers')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idestados', 'fk_usuarios_estados_idx')
                ->references('idestados')->on('estados')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idprofesiones', 'fk_usuarios_profesiones_profesiones_idprofesiones_idx')
                ->references('idprofesiones')->on('profesiones')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idgeneros', 'fk_usuarios_generos_generos_idgeneros_idx')
                ->references('idgeneros')->on('generos')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idtipocontrato', 'fk_usuarios_tipocontratos_tcontrato_tipo_idx')
                ->references('idtipocontrato')->on('tcontratos')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idbancouser', 'fk_usuarios_banco_banco_banco_idx')
                ->references('idbancos')->on('bancos')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idtipocuentauser', 'fk_tipocuentas_user_tipocuentas_tipocuentas_idx')
                ->references('idtiposdecuentas')->on('tiposdecuentas')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idjornadalabora', 'fk_jornadas_jornadas_jornadas_idx')
                ->references('idjornadalaboral')->on('jlaboral')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idestadocivil', 'fk_ecivil_user_ecivil_id_idx')
                ->references('idestadocivil')->on('ecivil')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idtiposalario', 'fk_tiposala_tipos_salrio_idx')
                ->references('idtiposalario')->on('tsalarios')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idorigenfondos', 'fkorigenfon:origenfond_idx')
                ->references('idorigenfondos')->on('origenfondos')
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
