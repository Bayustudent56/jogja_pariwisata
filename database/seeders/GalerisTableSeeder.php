<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan baris ini untuk mengimpor facade DB


class GalerisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('galeris')->delete();
        
        DB::table('galeris')->insert(array (
            0 => 
            array (
                'id' => 100,
                'kategori_galeri_id' => 5,
                'judul' => 'Gudeg Khas Yogyakarta',
                'slug' => 'gudeg-khas-yogyakarta',
                'gambar' => 'galeri/hxgGFijTrKHjsRVCstJIn3erIPek5N54IjNms2qn.jpg',
                'keterangan' => '<p>Gudeg adalah makanan tradisional khas Yogyakarta dan Jawa Tengah yang terbuat dari nangka muda yang dimasak dengan santan dan rempah-rempah, seperti gula aren, bawang putih, bawang merah, dan daun jati<br><br></p>
<table style="border-collapse: collapse; width: 100%; border-width: 1px;" border="1"><colgroup><col style="width: 33.2362%;"><col style="width: 33.2362%;"><col style="width: 33.2362%;"></colgroup>
<tbody>
<tr>
<td><img title="gudeg.jpg" src="../../storage/galeri_tinymce_uploads/b1g0CKHMaozpX97Vlcyeczetjquu8RJ2oGaUKJQt.jpg" alt="" width="500" height="400"></td>
<td><img title="gudeg3.jpg" src="../../storage/galeri_tinymce_uploads/T4JrvqJ1iyEQ4vbCgCQyAhRECvZUwX1zqL5FcGbP.jpg" alt="" width="500" height="400"></td>
<td><img title="gudegyudjum.jpg" src="../../storage/galeri_tinymce_uploads/KQOlFOcKT7s8FpNKIeftoRuktMa1eEAGHWFmNVZB.jpg" alt="" width="500" height="399"></td>
</tr>
</tbody>
</table>',
                'view_count' => 221,
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-07 11:04:40',
            ),
            1 => 
            array (
                'id' => 200,
                'kategori_galeri_id' => 2,
                'judul' => 'Tari Tradisional Jogja',
                'slug' => 'tari-tradisional-jogja',
                'gambar' => 'galeri/3uDl9A4z2SoGNSPFBAQtBddbahPOsc0C8UGF8HyY.jpg',
                'keterangan' => '<p>Kelezatan gudeg khas Jogja yang manis dan gurih.</p>',
                'view_count' => 210,
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-07 10:04:18',
            ),
            2 => 
            array (
                'id' => 300,
                'kategori_galeri_id' => 3,
                'judul' => 'Belajar di Museum',
                'slug' => 'belajar-di-museum',
                'gambar' => 'galeri/placeholder.jpg',
                'keterangan' => '<p>Pengalaman edukasi di museum yang kaya sejarah.</p>',
                'view_count' => 102,
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-07 03:25:43',
            ),
            3 => 
            array (
                'id' => 400,
                'kategori_galeri_id' => 4,
                'judul' => 'Karya Seni Lokal',
                'slug' => 'karya-seni-lokal',
                'gambar' => 'galeri/placeholder.jpg',
                'keterangan' => '<p>Karya seni unik dari seniman lokal Jogja.</p>',
                'view_count' => 121,
                'created_at' => '2025-06-06 03:39:30',
                'updated_at' => '2025-06-06 10:38:42',
            ),
        ));
        
        
    }
}