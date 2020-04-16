<?php

use Phinx\Seed\AbstractSeed;

class EmployeesSeed extends AbstractSeed
{
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'family_name' => 'メンバー',
                'given_name' => '太郎',
                'family_name_kana' => 'メンバー',
                'given_name_kana' => 'タロウ',
                'gender' => 'male',
                'email' => 'member@example.com',
                'password' => '$2y$10$wN5lUzWVkSCtT7vKGHzGKOTiI0jk1z3KjFgn8BnSk2KT5SsE5h80u',
                'role' => 'member',
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ],
            [
                'id' => 2,
                'family_name' => 'オーナー',
                'given_name' => '太郎',
                'family_name_kana' => 'オーナー',
                'given_name_kana' => 'タロウ',
                'gender' => 'female',
                'email' => 'owner@example.com',
                'password' => '$2y$10$wN5lUzWVkSCtT7vKGHzGKOTiI0jk1z3KjFgn8BnSk2KT5SsE5h80u',
                'role' => 'owner',
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ],
            [
                'id' => 3,
                'family_name' => '管理者',
                'given_name' => '太郎',
                'family_name_kana' => '管理者',
                'given_name_kana' => 'タロウ',
                'gender' => 'male',
                'email' => 'admin@example.com',
                'password' => '$2y$10$wN5lUzWVkSCtT7vKGHzGKOTiI0jk1z3KjFgn8BnSk2KT5SsE5h80u',
                'role' => 'admin',
                'created' => '2020-01-01 00:00:00',
                'modified' => '2020-01-01 00:00:00',
            ]
        ];
        $table = $this->table('employees');
        $table->insert($data)
            ->save();
    }
}
