<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   
            $table->string('nama');
            $table->string('telepon');
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->string('program_studi');
            $table->string('asal_sma'); // Field baru
            $table->decimal('nilai_ijazah', 5, 2); // Field baru dengan presisi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
