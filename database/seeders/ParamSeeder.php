<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Param::create( [
            'id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon1',
            'param'=>'Sekretariat Kementerian',
        ]);
        
        Param::create( [
            'id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Kewirausahaan',
        ]);

        Param::create( [
            'id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Usaha Kecil dan Menengah',
        ]);
        
        Param::create( [
            'id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon1',
            'param'=>'Deputi Bidang Perkoperasian',
        ]);

        Param::create( [
            'id'=>'173ed764-a97a-4c58-9bb3-459975dd5075',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Asdep Perlindungan dan Kemudahan Usaha Mikro',
        ]);
                    
        Param::create( [
            'id'=>'9caf4291-08d1-4a66-a8b9-c5babfc21fa2',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
        ]);
                    
        Param::create( [
            'id'=>'12440d0b-f46f-4767-995c-1ccc6d336512',
            'parent_id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon2',
            'param'=>'Biro Manajemen Kinerja, Organisasi, dan SDM Aparatur',
        ]);
        
        Param::create( [
            'id'=>'45e4eff8-e2b6-48f7-85c3-0cbbbae50c54',
            'parent_id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Kawasan dan Rantai Pasok',
        ]);
                    
        Param::create( [
            'id'=>'5f118387-9cbc-493e-8153-d71e5ffebcd5',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Asdep Konsultasi Bisnis dan Pendampingan',
        ]);
                    
        Param::create( [
            'id'=>'c38756f1-52c1-47cf-89e5-c98797870aa0',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'9571f219-3c77-4693-ba40-34b242628b4b',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'17300462-f175-47fe-a5ed-614fec7e132c',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Kapasitas Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'d9c317a3-7ed2-4637-b44b-c7f7a5e60235',
            'parent_id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon2',
            'param'=>'Asdep Pengawasan Koperasi',
        ]);

        Param::create( [
            'id'=>'d7970d86-86df-48b8-9267-9cd788f5a5b8',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Kewirausahaan',
        ]);

        Param::create( [
            'id'=>'af023131-7f52-4dc6-b9c4-a40508fb60a8',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Rantai Pasok Usaha Mikro',
        ]);

        Param::create( [
            'id'=>'2d9826ed-2b22-4fc0-adda-7b4e1c2ea001',
            'parent_id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan SDM Usaha Kecil dan Menengah',
        ]);

        Param::create( [
            'id'=>'253a5a60-14e0-4668-ac1a-a2ffb9de1012',
            'parent_id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon2',
            'param'=>'Biro Komunikasi dan Teknologi Informasi',
        ]);

        Param::create( [
            'id'=>'6c0c1fa1-d141-4178-8119-ad6749628075',
            'parent_id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Perkoperasian',
        ]);

        Param::create( [
            'id'=>'0961e0d0-59c6-44ff-9f54-2e2501643c0d',
            'parent_id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan dan Penjaminan Perkoperasian',
        ]);

        Param::create( [
            'id'=>'a3f6753d-ea70-4f11-9556-ae5299eec34e',
            'parent_id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon2',
            'param'=>'Biro Umum dan Keuangan',
        ]);

        Param::create( [
            'id'=>'f18fecd0-d3d0-49f9-9840-6e33c2a797b9',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Asdep Pemetaan Data, Analis, dan Pengkajian Usaha',
        ]);

        Param::create( [
            'id'=>'235167ea-95e4-450a-b256-ca8bd4f05283',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan Ekosistem Bisnis',
        ]);

        Param::create( [
            'id'=>'95bb6fb8-a345-44f0-b770-a3a8e959cc35',
            'parent_id'=>'54fe65b4-0308-4450-ab7a-6ad5b2876c6b',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan Wirausaha',
        ]);

        Param::create( [
            'id'=>'fed2779b-ccd3-48fd-a2e5-186531948ce8',
            'parent_id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon2',
            'param'=>'Biro Hukum dan Kerja Sama',
        ]);

        Param::create( [
            'id'=>'13175a58-4285-4b6b-aef7-40ebe5f762b1',
            'parent_id'=>'ee2400ae-7130-48c4-a275-534302b086b1',
            'category'=>'eselon2',
            'param'=>'Inspektorat',
        ]);
                    
        Param::create( [
            'id'=>'9fb296cd-a2a4-4f7f-9801-76b751f198b6',
            'parent_id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon2',
            'param'=>'Asdep Kemitraan dan Peluasan Pasar',
        ]);
                    
        Param::create( [
            'id'=>'ad7efb76-3c3c-4b6c-bb59-8ba05caa1cfc',
            'parent_id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan SDM',
        ]);
                    
        Param::create( [
            'id'=>'85a5c322-0a30-436c-a5a5-0f881edeb87d',
            'parent_id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon2',
            'param'=>'Asdep Pembiayaan dan Investasi Usaha Kecil dan Menengah',
        ]);

        Param::create( [
            'id'=>'e92427c2-e4f1-4924-8b1e-e102739d3ef5',
            'parent_id'=>'b0154910-2ed1-4c8b-8187-3781585f5658',
            'category'=>'eselon2',
            'param'=>'Sekretaris Deputi Bidang Usaha Kecil dan Menengah',
        ]);
                    
        Param::create( [
            'id'=>'7b65b66d-db7e-40c8-b552-0f48281e5108',
            'parent_id'=>'20a393cb-b601-44fd-bbb2-0bf25a66d580',
            'category'=>'eselon2',
            'param'=>'Asdep Pengembangan dan Pembaruan Perkoperasian',
        ]);
                    
        Param::create( [
            'id'=>'0fb3b0f3-13b1-4f11-9c28-7f855f78abaa',
            'parent_id'=>'930bf6a2-bc06-4775-9cbb-fe35086b0051',
            'category'=>'eselon2',
            'param'=>'Asdep Fasilitasi Hukum dan Konsultasi Usaha',
        ]);

        Param::create( [
            'id'=>'b41a65a6-547d-4024-b6fb-dca4ad459cc0',
            'parent_id'=> null,
            'category'=>'mandate',
            'param'=>'Delegasi',
        ]);

        Param::create( [
            'id'=>'7cbfdbe8-b028-40e7-96be-5161e209fbd1',
            'parent_id'=> null,
            'category'=>'mandate',
            'param'=>'Atribusi',
        ]);
    }
}
