<?php

namespace Database\Seeders;

use App\Models\Liga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=new Liga();
        $data->name='Liga 1 Indonesia';
        $data->save();
    }
}
