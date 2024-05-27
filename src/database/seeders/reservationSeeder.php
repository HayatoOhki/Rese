<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SplFileObject = new \SplFileObject(__DIR__ . '/data/reservations.csv');
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
                'user_id' => trim($row[0]),
                'shop_id' => trim($row[1]),
                'date' => trim($row[2]),
                'time' => trim($row[3]),
                'number' => trim($row[4]),
            ];
        }

        DB::table('reservations')->insert($params);
    }
}
