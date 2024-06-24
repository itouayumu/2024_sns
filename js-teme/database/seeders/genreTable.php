<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class genreTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => 'action',
        ];
        DB::table('genre')->insert($param);

        $param = [
            'name' => 'shuting',
        ];
        DB::table('genre')->insert($param);

        $param = [
            'name' => 'fighting',
        ];
        DB::table('genre')->insert($param);
    }
}
