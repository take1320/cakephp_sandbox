<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MEmployees Model
 *
 * @method \App\Model\Entity\MEmployee get($primaryKey, $options = [])
 * @method \App\Model\Entity\MEmployee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MEmployee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MEmployee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MEmployee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MEmployee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MEmployee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MEmployee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MEmployeesTable extends Table
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

        $this->setTable('m_employees');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('employee_number')
            ->maxLength('employee_number', 50)
            ->requirePresence('employee_number', 'create')
            ->notEmptyString('employee_number');

        $validator
            ->scalar('family_name')
            ->maxLength('family_name', 30)
            ->requirePresence('family_name', 'create')
            ->notEmptyString('family_name');

        $validator
            ->scalar('given_name')
            ->maxLength('given_name', 30)
            ->requirePresence('given_name', 'create')
            ->notEmptyString('given_name');

        $validator
            ->scalar('family_name_kana')
            ->maxLength('family_name_kana', 30)
            ->requirePresence('family_name_kana', 'create')
            ->notEmptyString('family_name_kana');

        $validator
            ->scalar('given_name_kana')
            ->maxLength('given_name_kana', 30)
            ->requirePresence('given_name_kana', 'create')
            ->notEmptyString('given_name_kana');

        $validator
            ->scalar('gender')
            ->notEmptyString('gender');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
