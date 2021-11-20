<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeuanganNazirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keuangan_nazirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('pwp');
            $table->integer('pwt');
            $table->integer('jp');
            $table->integer('ta');
            $table->integer('tbo');
            $table->integer('kan');
            $table->integer('hppaw');
            $table->integer('dp');
            $table->integer('dri');
            $table->integer('investasi');
            $table->integer('ksk');
            $table->integer('tp');
            $table->integer('bnhp');
            $table->integer('rpaw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keuangan_nazirs');
    }
}
