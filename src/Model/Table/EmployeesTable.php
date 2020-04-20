<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

use App\Model\Entity\Employee;

/**
 * Employees Model
 *
 * @method \App\Model\Entity\Employee get($primaryKey, $options = [])
 * @method \App\Model\Entity\Employee newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Employee[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Employee|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Employee patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Employee[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Employee findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmployeesTable extends Table
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

        $this->setTable('employees');
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
            ->inList('gender', array_keys(Employee::GENDER), '正しい性別を入力して下さい')
            ->notEmptyString('gender');

        $validator
            ->email('email', false, "メールアドレスを入力して下さい")
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('password')
            ->lengthBetween('password', [8, 120], '8文字以上、120文字以下を入力して下さい')
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('role')
            ->inList('role', array_keys(Employee::ROLE), '正しい権限を入力して下さい')
            ->notEmptyString('role');

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
