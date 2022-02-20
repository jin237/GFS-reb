<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Loud;
use App\Models\Reply;
use App\Models\Murmur;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(2)->create()->each(function ($user) {
            Murmur::factory()->count(2)->make()->each(function ($murmur) use ($user) {
                $user->murmur()->save($murmur);
            });
        });

        for ($i = 1; $i <= 10; $i++) {
            $param = [
                'murmur_id' => random_int(1, 4),
                'user_id' => random_int(1, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            DB::table('likes')->insert($param);
            DB::table('louds')->insert($param);
            DB::table('replys')->insert($param);
        }
    }
}
