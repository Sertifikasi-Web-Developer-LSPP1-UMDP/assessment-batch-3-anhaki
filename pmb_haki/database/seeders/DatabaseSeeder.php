<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Pengumuman;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Create users with different statuses and mhs_status
        $users = [];
        for ($i = 1; $i <= 50; $i++) {
            $isRelated = $i % 3 !== 0; // Determine if the user should have related mahasiswa data

            if ($isRelated) {
                // Users with related mahasiswa data
                $userName = $faker->firstName;
                $email = strtolower($userName) . '@' . $faker->freeEmailDomain;
                $user = User::create([
                    'name' => $userName,
                    'email' => $email,
                    'password' => Hash::make($userName . '123'),
                    'roles' => 'user',
                    'status' => 'verified',
                    'mhs_status' => $this->getRandomMhsStatus(),
                ]);

                $users[] = $user;

                // Create mahasiswa data for users with related mahasiswa data
                $createdAt = $this->getRandomDateIn2024();
                Mahasiswa::create([
                    'user_id' => $user->id,
                    'nama' => $userName . ' ' . $faker->lastName,
                    'telepon' => $faker->phoneNumber,
                    'alamat' => $faker->address,
                    'tanggal_lahir' => $faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
                    'program_studi' => $faker->randomElement(['Teknik Informatika', 'Sistem Informasi', 'Manajemen', 'Akuntansi']),
                    'asal_sma' => $faker->company . ' High School',
                    'nilai_ijazah' => $faker->randomFloat(2, 70, 100),
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);
            } else {
                // Users without related mahasiswa data
                $userName = $faker->firstName;
                $email = strtolower($userName) . '@' . $faker->freeEmailDomain;
                $user = User::create([
                    'name' => $userName,
                    'email' => $email,
                    'password' => Hash::make($userName . '123'),
                    'roles' => 'user',
                    'status' => $this->getRandomStatusForUnrelated(),
                    'mhs_status' => 'unregistered',
                ]);

                $users[] = $user;
            }
        }

        // // Seeder for pengumuman related to admin users
        // for ($i = 1; $i <= 5; $i++) {
        //     Pengumuman::create([
        //         'user_id' => $i % 2 === 0 ? $admin2->id : $admin1->id,
        //         'judul' => $faker->sentence(6),
        //         'deskripsi' => $faker->paragraph,
        //         'gambar' => "storage/pengumuman-$i.jpg",
        //     ]);
        // }
    }

    private function getRandomStatus()
    {
        $statuses = ['verified', 'unverified', 'rejected'];
        return $statuses[array_rand($statuses)];
    }

    private function getRandomMhsStatus()
    {
        $statuses = ['accepted', 'rejected', 'pending'];
        return $statuses[array_rand($statuses)];
    }

    private function getRandomStatusForUnrelated()
    {
        return ['unverified', 'rejected'][array_rand(['unverified', 'rejected'])];
    }

    private function getRandomDateIn2024()
    {
        $month = rand(1, 12);
        $day = rand(1, cal_days_in_month(CAL_GREGORIAN, $month, 2024));
        return "2024-$month-$day";
    }
}
