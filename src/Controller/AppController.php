<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use App\Enum\EmployeeRole;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $permissions = [];

    public function beforeFilter(Event $event)
    {
        $this->Auth->config('authenticate', [
            'Form' => ['userModel' => 'Employees'],
        ]);
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // 認証
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Authenticate',
                'action' => 'login'
            ],
            'authorize' => ['Controller'],
            'unauthorizedRedirect' => $this->referer()
        ]);
    }

    /**
     * メンバー権限による参照を可能とする
     */
    final public function addPermissionMember(){
        $this->permissions[] = EmployeeRole::MEMBER();
    }

    /**
     * オーナー権限による参照を可能とする
     */
    final public function addPermissionOwner(){
        $this->permissions[] = EmployeeRole::OWNER();
    }

    /**
     * 操作権限制御
     * 権限別の制御を行う場合はisAuthorizedDetailCondition()を
     * オーバーライドして制御する
     */
    final public function isAuthorized($user)
    {
        if (empty($user)) {
            return false;
        }

        // 管理者権限ば許可
        if ($user['role'] === EmployeeRole::ADMIN()) {
            return true;
        }

        // ロールが許可されている場合、詳細条件の判定を行う
        if (in_array($user['role'], $this->permissions)) {
            return $this->isAuthorizedDetailCondition($user);
        }

        // 権限該当無し
        $this->Auth->config('authError', 'このページを操作する権限がありません');
        return false;
    }

    /**
     * 操作権限制御詳細
     */
    protected function isAuthorizedDetailCondition($user)
    {
        // オーバーライドしない場合、trueeとして動作
        return true;
    }
}
