<?php

use Illuminate\Database\Seeder;

use App\kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = new kategori();
        $kategori->jenis = "Sport";
        $kategori->save();

        $kategori = new kategori();
        $kategori->jenis = "Otomatis";
        $kategori->save();

        $kategori = new kategori();
        $kategori->jenis = "Manual";
        $kategori->save();
    }
}
