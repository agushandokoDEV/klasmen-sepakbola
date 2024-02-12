<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\SkorPertandingan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $match=array(
            [
                'home_club_id'=>Club::where('name','Persija')->first()->id,
                'away_club_id' => Club::where('name', 'Persib')->first()->id,
            ],
            [
                'home_club_id' => Club::where('name', 'Persebaya')->first()->id,
                'away_club_id' => Club::where('name', 'Arema')->first()->id,
            ]
        );

        foreach ($match as $item) {
            $data=new SkorPertandingan();
            $data->home_club_id=$item['home_club_id'];
            $data->away_club_id = $item['away_club_id'];
            $data->status_match='progress';
            $data->save();
        }
    }
}
