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

        $murmur = array_values(Murmur::all('id')->toArray());
        $user = array_values(User::all('id')->toArray());

        foreach ($murmur as $MurmurAry) {
            foreach ($user as $userAry) {
                $end = random_int(3, 10);
                for ($i = 1; $i <= $end; $i++) {
                    $param = [
                        'murmur_id' => $MurmurAry["id"],
                        'user_id' => $userAry["id"],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    DB::table('likes')->insert($param);
                }

                for ($i = 1; $i <= $end; $i++) {
                    $param = [
                        'murmur_id' => $MurmurAry["id"],
                        'user_id' => $userAry["id"],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    DB::table('louds')->insert($param);
                }

                for ($i = 1; $i <= $end; $i++) {
                    $param = [
                        'murmur_id' => $MurmurAry["id"],
                        'user_id' => $userAry["id"],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    DB::table('replys')->insert($param);
                }
            }
        }
    }
}
