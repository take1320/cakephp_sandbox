<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property int $price_excluding_tax
 * @property \Cake\I18n\FrozenTime $start_selling_at
 * @property \Cake\I18n\FrozenTime $end_of_sale_at
 * @property bool $can_order
 * @property int $quantity_per_lot
 * @property int $min_order_lot_quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Food[] $foods
 */
class Product extends Entity
{
    const TYPE = [
        'food' => '食品',
        'item' => '物品',
    ];

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'type' => true,
        'name' => true,
        'price_excluding_tax' => true,
        'start_selling_at' => true,
        'end_of_sale_at' => true,
        'can_order' => true,
        'quantity_per_lot' => true,
        'min_order_lot_quantity' => true,
        'created' => true,
        'modified' => true,
        'foods' => true,
    ];
}
