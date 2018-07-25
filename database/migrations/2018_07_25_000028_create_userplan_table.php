<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserplanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'userplan';

    /**
     * Run the migrations.
     * @table userplan
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_user_plan');
            $table->string('cedula', 45);
            $table->integer('idplan');
            $table->integer('logicdel')->nullable();

            $table->index(["cedula"], 'fk_userplan_usuarioscedula_idx');

            $table->index(["idplan"], 'fk_cod_plam_plan_idplan_idx');
            $table->nullableTimestamps();


            $table->foreign('cedula', 'fk_userplan_usuarioscedula_idx')
                ->references('cedula')->on('usuarios')
                ->onDelete('no action')
                ->onUpdate('cascade');

            $table->foreign('idplan', 'fk_cod_plam_plan_idplan_idx')
                ->references('idplanes')->on('planes')
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
