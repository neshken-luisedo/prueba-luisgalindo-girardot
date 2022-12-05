<?php

namespace Database\Seeders;

use App\Models\Expertises;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExpertisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('expertises')->truncate();

        $data = [
           ['name' => 'Artes plásticas'],
           ['name' => 'Teatro'],
           ['name' => 'Música'],
           ['name' => 'Danza'],
           ['name' => 'Cocina tradicional'],
           ['name' => 'Juegos tradicionales'],
           ['name' => 'Promoción de lectura'],
        ];

        foreach($data as $row)
        {
            Expertises::create([
                'name' => $row['name']
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
