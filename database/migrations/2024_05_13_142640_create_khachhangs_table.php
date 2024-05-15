<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhachhangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachhangs', function (Blueprint $table) {
            $table->id();
            $table->string('makh');
            $table->string('tenkh');
            $table->string('lienhe');
            $table->string('sdt');
            $table->string('diachi');
            $table->string('masothue');
            $table->string('giaohang1');
            $table->string('sdt1');
            $table->string('km1');
            $table->string('giaohang2');
            $table->string('sdt2');
            $table->string('km2');
            $table->string('mang');
            $table->text('ghichu');
            $table->string('nguoitao');
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
        Schema::dropIfExists('khachhangs');
    }
}
