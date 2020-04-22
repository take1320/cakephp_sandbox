<?php

use Phinx\Seed\AbstractSeed;

class ProductsSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'type' => 'food',
                'name' => '🍺ビール🍺',
                'price_excluding_tax' => '300',
                'start_selling_at' => '2020-01-01 00:00:00',
                'end_of_sale_at' => '2025-12-01 00:00:00',
                'can_order' => true,
                'quantity_per_lot' => '6',
                'min_order_lot_quantity' => '5',
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ],
            [
                'id' => '2',
                'type' => 'food',
                'name' => '🍣寿司🍣',
                'price_excluding_tax' => '200',
                'start_selling_at' => '2020-01-01 00:00:00',
                'end_of_sale_at' => '2025-12-01 00:00:00',
                'can_order' => true,
                'quantity_per_lot' => '6',
                'min_order_lot_quantity' => '2',
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ]
        ];
        $table = $this->table('products');
        $table->insert($data)
            ->save();
    }
}
