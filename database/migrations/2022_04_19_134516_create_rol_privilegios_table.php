<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPrivilegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_privilegios', function (Blueprint $table) {
            $table->integer("idRol")->unsigned()->notnull();
            $table->foreign("idRol")->references("idRol")->on("rols");
            $table->integer("idPrivilegio")->unsigned()->notnull();
            $table->foreign("idPrivilegio")->references("idPrivilegio")->on("privilegio");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_privilegios');
    }
}
