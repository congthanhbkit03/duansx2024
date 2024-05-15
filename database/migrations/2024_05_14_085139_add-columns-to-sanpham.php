<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanphams', function (Blueprint $table) {
            $table->string('tensp');
            $table->string('kieusp');
            $table->string('dai');
            $table->string('rong');
            $table->string('cao');
            $table->string('song');
            $table->string('kieuin');
            $table->string('somau');
            $table->string('ghichu');
            $table->string('daiphoi');
            $table->string('rongphoi');
            $table->string('nap1');
            $table->string('caonap1');
            $table->string('nap2');
            $table->string('caonap2');
            $table->string('nap3');
            $table->string('nap4');
            $table->string('lang');
            $table->string('bat');
            $table->string('lebien');
            $table->string('khogiay');
            $table->string('trongluong');
            $table->string('dientich');
            $table->string('dobuc');
            $table->string('nenetc');
            $table->string('nenfct');
            $table->string('mat3');
            $table->string('song3');
            $table->string('mat2');
            $table->string('song2');
            $table->string('mat1');
            $table->string('song1');
            $table->string('matin');
            $table->string('chongtham');
            $table->string('canmang');
            $table->string('boi');
            $table->string('chap');
            $table->string('be');
            $table->string('dam');
            $table->string('ghim');
            $table->string('bocot');
            $table->string('quanmang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanphams', function (Blueprint $table) {
            $table->dropColumn('tensp');
            $table->dropColumn('kieusp');
            $table->dropColumn('dai');
            $table->dropColumn('rong');
            $table->dropColumn('cao');
            $table->dropColumn('song');
            $table->dropColumn('kieuin');
            $table->dropColumn('somau');
            $table->dropColumn('ghichu');
            $table->dropColumn('daiphoi');
            $table->dropColumn('rongphoi');
            $table->dropColumn('nap1');
            $table->dropColumn('caonap1');
            $table->dropColumn('nap2');
            $table->dropColumn('caonap2');
            $table->dropColumn('nap3');
            $table->dropColumn('nap4');
            $table->dropColumn('lang');
            $table->dropColumn('bat');
            $table->dropColumn('lebien');
            $table->dropColumn('khogiay');
            $table->dropColumn('trongluong');
            $table->dropColumn('dientich');
            $table->dropColumn('dobuc');
            $table->dropColumn('nenetc');
            $table->dropColumn('nenfct');
            $table->dropColumn('mat3');
            $table->dropColumn('song3');
            $table->dropColumn('mat2');
            $table->dropColumn('song2');
            $table->dropColumn('mat1');
            $table->dropColumn('song1');
            $table->dropColumn('matin');
            $table->dropColumn('chongtham');
            $table->dropColumn('canmang');
            $table->dropColumn('boi');
            $table->dropColumn('chap');
            $table->dropColumn('be');
            $table->dropColumn('dam');
            $table->dropColumn('ghim');
            $table->dropColumn('bocot');
            $table->dropColumn('quanmang');
        });
    }
}
