<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::create([
            'id' => '4bb17c2c-35b3-4c2b-b39a-8bf4bad6ba56',
            'type' => 'PUU',
            'name' => 'UU',
            'order' => 1
        ]);
        ServiceCategory::create([
            'id' => '5660292b-7077-4a88-b8d7-034d94657788',
            'type' => 'PUU',
            'name' => 'PP',
            'order' => 2
        ]);
        ServiceCategory::create([
            'id' => '4d14108e-e9ec-49e2-b354-d770f8f7f3fe',
            'type' => 'PUU',
            'name' => 'PERPRES',
            'order' => 3
        ]);
        ServiceCategory::create([
            'id' => 'd7c710dd-e547-47f1-a693-e5d6f8ade03e',
            'type' => 'PUU',
            'name' => 'PERMEN',
            'order' => 4
        ]);

        ServiceCategory::create([
            'id' => 'd88c44b5-e4e3-4874-a35f-850834c5c570',
            'type' => 'IH',
            'name' => 'SK',
            'order' => 1
        ]);
        ServiceCategory::create([
            'id' => 'ddd5df9a-6e75-40b2-bb96-a7f3cacfeaf2',
            'type' => 'IH',
            'name' => 'SE',
            'order' => 2
        ]);
        ServiceCategory::create([
            'id' => 'c91e89f4-e95e-4b53-ab31-bf8939664f5c',
            'type' => 'IH',
            'name' => 'Instruksi',
            'order' => 3
        ]);
        ServiceCategory::create([
            'id' => '54890678-c88a-4350-9cf9-f78083107f00',
            'type' => 'IH',
            'name' => 'Juklak/Juknis',
            'order' => 4
        ]);
        ServiceCategory::create([
            'id' => '44d6e26f-7276-4c37-836a-ee8527487ba5',
            'type' => 'IH',
            'name' => 'SOP',
            'order' => 5
        ]);
        ServiceCategory::create([
            'id' => 'ed97346a-18ab-4bad-9993-02fc00285023',
            'type' => 'IH',
            'name' => 'Pedoman',
            'order' => 6
        ]);
        ServiceCategory::create([
            'id' => '50b8a2be-dfda-410b-bbde-d4e5f001a810',
            'type' => 'IH',
            'name' => 'Perjanjian/MoU',
            'order' => 7
        ]);
        ServiceCategory::create([
            'id' => 'eb9cea01-8288-4002-9576-e8822549630a',
            'type' => 'IH',
            'name' => 'Dokumen Advokasi Hukum',
            'order' => 8
        ]);
    }
}
