<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LembagaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'visi' => 'Mewujudkan Lembaga yang berdaya saing dan berwawasan lingkungan',
            'misi' => '<ol> 
            <li>Menghasilkan lulusan yang berdaya saing dan berwawasan lingkungan</li>
            <li>Menghasilkan penelitian yang bermutu dan berwawasan lingkungan</li>
            <li>Menghasilkan pengabdian kepada masyarakat yang bermutu dan berwawasan lingkungan</li>
            <li>Menghasilkan karya inovasi yang bermutu dan berwawasan lingkungan</li>
            <li>Menghasilkan kerjasama yang bermutu dan berwawasan lingkungan</li>
            </ol>',
            'sejarah' => 'Pada awalnya, Jurusan Teknik Informatika berdiri pada tahun 2003 dengan nama Jurusan Teknik Informatika dan Komputer (TIK). Pada tahun 2008, Jurusan TIK berubah nama menjadi Jurusan Teknik Informatika (TI). Pada tahun 2012, Jurusan TI berubah nama menjadi Jurusan Teknik Informatika dan Komputer (TIK) kembali. Pada tahun 2017, Jurusan TIK berubah nama menjadi Jurusan Teknik Informatika (TI) kembali. Pada tahun 2020, Jurusan TI berubah nama menjadi Jurusan Teknik Informatika dan Komputer (TIK) kembali. Pada tahun 2021, Jurusan TIK berubah nama menjadi Jurusan Teknik Informatika (TI) kembali.',
        ];

        $this->db->table('lembaga')->insert($data);
    }
}
