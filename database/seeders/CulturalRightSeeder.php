<?php

namespace Database\Seeders;

use App\Models\CulturalRights;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CulturalRightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('cultural_rights')->truncate();

        $data = [
            ['name' => 'Identidad y patrimonios culturales'],
            ['name' => 'Referencias a comunidades culturales'],
            ['name' => 'Acceso y participación en la vida cultural'],
            ['name' => 'Educación y formación'],
            ['name' => 'Información y comunicación'],
            ['name' => 'Cooperación cultural'],
        ];

        foreach ($data as $row) {
            CulturalRights::create([
                'name' => $row['name'],
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
