<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'group' => 'gender',
                'data'  => [
                    [
                        'key'   => 'male',
                        'value' => 'Male'
                    ],
                    [
                        'key'   => 'female',
                        'value' => 'Female'
                    ]
                ]
            ],
            [
                'group' => 'month',
                'data'  => [
                    [
                        'key'   => '01',
                        'value' => 'Januari'
                    ],
                    [
                        'key'   => '02',
                        'value' => 'Februari'
                    ],
                    [
                        'key'   => '03',
                        'value' => 'Maret'
                    ],
                    [
                        'key'   => '04',
                        'value' => 'April'
                    ],
                    [
                        'key'   => '05',
                        'value' => 'Mei'
                    ],
                    [
                        'key'   => '06',
                        'value' => 'Juni'
                    ],
                    [
                        'key'   => '07',
                        'value' => 'Juli'
                    ],
                    [
                        'key'   => '08',
                        'value' => 'Agustus'
                    ],
                    [
                        'key'   => '09',
                        'value' => 'September'
                    ],
                    [
                        'key'   => '10',
                        'value' => 'Oktober'
                    ],
                    [
                        'key'   => '11',
                        'value' => 'November'
                    ],
                    [
                        'key'   => '12',
                        'value' => 'Desember'
                    ]
                ]
            ],
        ];

        foreach ($options as $option) {
            foreach ($option['data'] as $data) {
                Option::updateOrCreate(['group' => $option['group'], 'key' => $data['key']],[
                    'group' => $option['group'],
                    'key'   => $data['key'],
                    'value' => $data['value']
                ]);
            }
        }
    }
}
