<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangs', function (Blueprint $table) {
            $table->id();
            $table->string('madonhang');
            $table->integer('soluong');
            $table->enum('loaidonhang', ['Đầy đủ', 'Không đầy đủ']);
            $table->date('ngaygiaohang');
            $table->enum('trangthai', ['Chưa sản xuất', 'Đang sản xuất', 'Đã hoàn tất', 'Đã hủy']);
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
        Schema::dropIfExists('donhangs');
    }
}
