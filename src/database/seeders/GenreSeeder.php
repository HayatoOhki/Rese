<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SplFileObject = new \SplFileObject(__DIR__ . '/data/genres.csv');
        $SplFileObject->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        foreach ($SplFileObject as $key => $row) {
            if ($key === 0) {
                continue;
            }

            $params[] = [
                'genre' => trim($row[0]),
            ];
        }

        DB::table('genres')->insert($params);
    }
}
