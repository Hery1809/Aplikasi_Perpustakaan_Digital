<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->integer('tahun_terbit');
            $table->unsignedBigInteger('kategori_id'); // tambahkan kolom kategori_id
            $table->enum('status', ['public', 'private']); // tambahkan kolom status
            $table->string('gambar')->nullable(); // tambahkan kolom gambar (nama file gambar)
            $table->string('pdf')->nullable(); // tambahkan kolom pdf (nama file pdf)
            $table->text('uraian')->nullable();
            $table->timestamps();

            // tambahkan foreign key constraint untuk kategori_id
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}
