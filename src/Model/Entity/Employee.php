<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $family_name
 * @property string $given_name
 * @property string $family_name_kana
 * @property string $given_name_kana
 * @property string $gender
 * @property string $email
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Employee extends Entity
{
    const GENDER = [
        'not_known' => '不明',
        'male' => '男性',
        'female' => '女性',
        'not_applicable' => '適用不能'
    ];

    const ROLE = [
        'member' => 'メンバー',
        'owner' => 'オーナー',
        'admin' => '管理者',
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
        'family_name' => true,
        'given_name' => true,
        'family_name_kana' => true,
        'given_name_kana' => true,
        'gender' => true,
        'email' => true,
        'password' => true,
        'role' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }

    protected function _getGenderLabel()
    {
        return self::GENDER[$this->_properties['gender']];
    }

    protected function _getRoleLabel()
    {
        return self::ROLE[$this->_properties['role']];
    }
}
