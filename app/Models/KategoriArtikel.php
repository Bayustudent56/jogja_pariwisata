<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class KategoriArtikel extends Model
{
    use HasFactory, HasSlug;

    protected $table = 'kategori_artikels';
    protected $fillable = ['nama_kategori', 'slug', 'gambar']; // Tambahkan 'gambar' di sini

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama_kategori')
            ->saveSlugsTo('slug');
    }

    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'kategori_artikel_id');
    }
}
