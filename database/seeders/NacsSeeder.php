<?php

namespace Database\Seeders;

use App\Models\Nacs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class NacsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('nacs')->truncate();

        $data = [
            ['name' => 'ALCALÁ'],
            ['name' => 'ANDALUCÍA'],
            ['name' => 'ANSERMANUEVO'],
            ['name' => 'ARGELIA'],
            ['name' => 'BOLIVAR'],
            ['name' => 'BUENAVENTURA'],
            ['name' => 'BUGA'],
        ];

        foreach ($data as $row) {
            Nacs::create([
                'name' => $row['name'],
            ]);
        }
        
        Schema::enableForeignKeyConstraints();
    }
}
