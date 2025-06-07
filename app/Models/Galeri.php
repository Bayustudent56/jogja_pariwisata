<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Galeri extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'galeris';
    protected $fillable = [
        'judul',
        'gambar',
        'keterangan',
        'kategori_galeri_id',
        'view_count',
        'slug', // Tambahkan 'slug'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }

    public function kategoriGaleri()
    {
        return $this->belongsTo(KategoriGaleri::class, 'kategori_galeri_id');
    }
}
