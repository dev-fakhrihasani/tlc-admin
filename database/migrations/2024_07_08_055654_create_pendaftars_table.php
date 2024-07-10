<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->string('jenjang_pendidikan');
            $table->string('asal_sekolah');
            $table->string('kelas');
            $table->string('peminatan');
            $table->string('alasan_join');
            $table->string('ss1')->nullable()->default('https://abdillahfakhri.cloud/img/img-icon.webp');
            $table->string('ss2')->nullable()->default('https://abdillahfakhri.cloud/img/img-icon.webp');
            $table->string('ss3')->nullable()->default('https://abdillahfakhri.cloud/img/img-icon.webp');
            $table->string('ss4')->nullable()->default('https://abdillahfakhri.cloud/img/img-icon.webp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
