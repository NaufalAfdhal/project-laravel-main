<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat beberapa departemen
        $departments = [
            ['name' => 'PPLG 1', 'desc' => 'Program Pengembangan Lintas Generasi 1'],
            ['name' => 'PPLG 2', 'desc' => 'Program Pengembangan Lintas Generasi 2'],
            ['name' => 'AERODINAMIKA 1', 'desc' => 'Departemen Aerodinamika 1'],
            ['name' => 'AERODINAMIKA 2', 'desc' => 'Departemen Aerodinamika 2'],
            ['name' => 'ENGINEERING 1', 'desc' => 'Departemen Teknik Engineering 1'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        // Membuat beberapa grade yang terkait dengan departemen
        Grade::factory()->create([
            'name' => '11 PPLG 1',
            'department_id' => Department::where('name', 'PPLG 1')->first()->id,
        ]);
        Grade::factory()->create([
            'name' => '11 PPLG 2',
            'department_id' => Department::where('name', 'PPLG 2')->first()->id,
        ]);
        Grade::factory()->create([
            'name' => '11 PPLG 3',
            'department_id' => Department::where('name', 'AERODINAMIKA 1')->first()->id,
        ]);

        // Membuat data pengguna
        User::factory(10)->create();
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Membuat data siswa
        Student::factory(50)->create();
    }
}
