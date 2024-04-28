<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('area_id')->nullable();
            $table->foreignId('kecamatan_id');
            $table->string('nama_kost');
            $table->integer('harga_kost');
            $table->enum('tipe_kost',['putra','putri','campur']);
            $table->integer('jumlah_kost');
            $table->enum('status_kost',['penuh','sisa1','sisa2','sisa3','sisa4','sisa5','lebih5']);
            // $table->text('link_maps');
            $table->text('deskripsi');
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
        Schema::dropIfExists('kosts');
    }
}
