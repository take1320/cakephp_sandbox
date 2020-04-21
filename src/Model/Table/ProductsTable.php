<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\FoodsTable&\Cake\ORM\Association\HasMany $Foods
 *
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('products');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Foods', [
            'foreignKey' => 'product_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->integer('price_excluding_tax')
            ->requirePresence('price_excluding_tax', 'create')
            ->notEmptyString('price_excluding_tax');

        $validator
            ->dateTime('start_selling_at')
            ->requirePresence('start_selling_at', 'create')
            ->notEmptyDateTime('start_selling_at');

        $validator
            ->dateTime('end_of_sale_at')
            ->requirePresence('end_of_sale_at', 'create')
            ->notEmptyDateTime('end_of_sale_at');

        $validator
            ->boolean('can_order')
            ->notEmptyString('can_order');

        $validator
            ->integer('quantity_per_lot')
            ->requirePresence('quantity_per_lot', 'create')
            ->notEmptyString('quantity_per_lot');

        $validator
            ->integer('min_order_lot_quantity')
            ->requirePresence('min_order_lot_quantity', 'create')
            ->notEmptyString('min_order_lot_quantity');

        return $validator;
    }
}
