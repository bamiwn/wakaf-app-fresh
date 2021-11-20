<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPengelolaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_pengelolaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('keuangan_nazir_id')
                ->constrained('keuangan_nazirs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->double('nilai_total', 8, 2)->nullable();
            $table->string('kinerja')->nullable();
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
        Schema::dropIfExists('hasil_pengelolaans');
    }
}
