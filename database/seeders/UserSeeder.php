<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        DB::table('users')->truncate();

        $data = [
            // [
            //     'name' => 'Administrador',
            //     'email' => 'admin@mail.test',
            //     'email_verified_at' => Carbon::now(),
            //     'password' => bcrypt('password'),
            //     'remember_token' => Str::random(10),
            // ],
            [
                'name' => 'KAREM LOPEZ',
                'email' => 'klopez@mail.test',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'ALBERTO ROMERO',
                'email' => 'aromero@mail.test',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'ELVIA TULIA ORJUELA',
                'email' => 'elviatorjuela@mail.test',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
            ],
        ];

        foreach ($data as $row) {
            User::create(
                [
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'email_verified_at' => $row['email_verified_at'],
                    'password' => $row['password'],
                    'remember_token' => $row['remember_token'],
                ]
            );
        }

        Schema::enableForeignKeyConstraints();
    }
}
