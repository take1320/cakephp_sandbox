<?php

use Phinx\Seed\AbstractSeed;

class FoodsSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'product_id' => '1',
                'serving_size' => 500,
                'shelf_life_day' => 180,
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ],
            [
                'id' => '2',
                'product_id' => '2',
                'serving_size' => 200,
                'shelf_life_day' => 3,
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ]
        ];
        $table = $this->table('foods');
        $table->insert($data)
            ->save();
    }
}
