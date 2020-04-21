<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_unicode_ci', 'comment' => '商品名', 'precision' => null, 'fixed' => null],
        'price_excluding_tax' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '税抜き価格', 'precision' => null, 'autoIncrement' => null],
        'start_selling_at' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '販売開始日時', 'precision' => null],
        'end_of_sale_at' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '販売終了日時', 'precision' => null],
        'can_order' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => '発注可能', 'precision' => null],
        'quantity_per_lot' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '１ロットあたりの数量', 'precision' => null, 'autoIncrement' => null],
        'min_order_lot_quantity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '発注時の最低ロット数', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '作成日時', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '更新日時', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'price_excluding_tax' => 1,
                'start_selling_at' => '2020-04-22 07:46:37',
                'end_of_sale_at' => '2020-04-22 07:46:37',
                'can_order' => 1,
                'quantity_per_lot' => 1,
                'min_order_lot_quantity' => 1,
                'created' => '2020-04-22 07:46:37',
                'modified' => '2020-04-22 07:46:37',
            ],
        ];
        parent::init();
    }
}
