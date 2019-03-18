<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('kategori_id')->unsigned();
            $table->foreign('kategori_id')
            ->references('id')->on('kategori_artikel')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->smallInteger('users_id')->unsigned();
            $table->foreign('users_id')
            ->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('judul');
            $table->string('headerImage');
            $table->text('isi');
            $table->boolean('status_artikel');
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
        Schema::dropIfExists('artikel');
    }
}
