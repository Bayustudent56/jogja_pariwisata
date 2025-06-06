    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('galeris', function (Blueprint $table) {
                $table->id();
                $table->foreignId('kategori_galeri_id')->nullable()->constrained('kategori_galeris')->onDelete('set null');
                $table->string('judul');
                $table->string('slug')->unique()->nullable(); // Tambahkan kolom slug
                $table->string('gambar'); // Path gambar utama
                $table->longText('keterangan')->nullable(); // Isi dari TinyMCE
                $table->integer('view_count')->default(0);
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('galeris');
        }
    };
    