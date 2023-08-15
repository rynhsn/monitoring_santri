<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class LembagaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'visi' => '<ol>
                <li>Terpadu, yaitu sistem yang memadukan kurikulum nasional dan kurikulum pondok pesantren Al-Islam,</li>
                <li>Boarding School, yaitu setiap santri wajib menginap di asrama yang disediakan oleh pondok pesantren Al-Islam,</li>
                <li>Full Day School, yaitu kegiatan belajar mengajar (KBM) 24 jam.</li>
                </ol>',
            'misi' => '<ol> 
                <li>Mencetak sumber daya manusia yang beriman dan bertaqwa kepada Allah SWT,</li>
                <li>Mencetak sumber daya manusia yang ber-akhlaqul karimah, jujur, cerdas, kreatif, dan mandiri.</li>
            </ol>',
            'sejarah' => '<p>Pondok Pesantren Modern Al-Islam merupakan pesantren yang terletak di jantung kota ini sejak berdirinya 1999 berkomitmen untuk mendidik santrinya dengan nilai-nilai islam sehingga diharapkan dapat terciptanya pribadi muslim yang memiliki iman yang benar, pengetahuan yang luas, dan budi pekerti yang luhur.</p>
            <p>Dengan motto al-ibqo` bilqodim ash-shohih wal akhdzu biljadidi al-ashlah ia tetap terbuka terhadap kemajuan teknologi dan pengetahuan, salah satu respon positif terhadap kemajuan adalah penetapan foreign language development program. Dimana pengajaran subjek tertentu disampaikan dengan pengantar bahasa asing, dan dimana para santri dituntut berkomunikasi dengan bahasa asing dalam kehidupan sehari-hari mereka.</p>'
        ];

        $this->db->table('lembaga')->insert($data);
    }
}
