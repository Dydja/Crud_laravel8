<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *manipulation des clés etrangères
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->foreignId('classroom_id')->constrained('classes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });

        /**
         * Activons les clés etrangeres
         *
         * @return void
         */
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiants',function(Blueprint $table){
            $table->dropForeign(['classroom_id']);
        });
        Schema::dropIfExists('etudiants');
    }
}
