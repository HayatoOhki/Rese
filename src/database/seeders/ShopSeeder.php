<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ShopSplFileObject = new \SplFileObject(__DIR__ . '/data/shops.csv');
        $ShopSplFileObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        foreach ($ShopSplFileObject as $key => $row) {
            if ($key === 0) {
                continue;
            }

            $params[] = [
                'name' => trim($row[0]),
                'area_id' => trim($row[1]),
                'genre_id' => trim($row[2]),
                'overview' => trim($row[3]),
                'url' => trim($row[4]),
            ];
        }

        DB::table('shops')->insert($params);
    }
}
