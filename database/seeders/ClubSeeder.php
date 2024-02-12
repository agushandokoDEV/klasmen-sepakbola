<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Liga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs=array(
            [
                'name'=>'Persija',
                'city'=>'Jakarta'
            ],
            [
                'name' => 'Persib',
                'city' => 'Bandung'
            ],
            [
                'name' => 'Arema',
                'city' => 'Malang'
            ],
            [
                'name' => 'Persebaya',
                'city' => 'Surabaya'
            ],
        );

        foreach ($clubs as $club) {
            $data=new Club();
            $data->liga_id=Liga::where('name','Liga 1 Indonesia')->first()->id;
            $data->name=$club['name'];
            $data->city = $club['city'];
            $data->save();
        }
    }
}
