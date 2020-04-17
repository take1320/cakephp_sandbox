<?php

use Phinx\Migration\AbstractMigration;

class CreatEmployees extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('employees', ['collation' => 'utf8mb4_unicode_ci']);
        $table->addColumn('family_name', 'string', [
            'null' => false,
            'limit' => 30,
            'comment' => '姓',
        ]);
        $table->addColumn('given_name', 'string', [
            'null' => false,
            'limit' => 30,
            'comment' => '名',
        ]);
        $table->addColumn('family_name_kana', 'string', [
            'null' => false,
            'limit' => 30,
            'comment' => '姓(カナ)',
        ]);
        $table->addColumn('given_name_kana', 'string', [
            'null' => false,
            'limit' => 30,
            'comment' => '名(カナ)',
        ]);
        $table->addColumn('gender', 'enum', [
            'null' => false,
            'values' => ['not_known', 'male', 'female', 'not_applicable'],
            'default' => 'not_known',
            'comment' => '性別',
        ]);
        $table->addColumn('email', 'string', [
            'null' => false,
            'limit' => 255,
            'comment' => 'Email',
        ]);
        $table->addColumn('password', 'string', [
            'null' => false,
            'limit' => 128,
            'comment' => 'パスワード',
        ]);
        $table->addColumn('role', 'enum', [
            'null' => false,
            'values' => ['member', 'owner', 'admin'],
            'default' => 'member',
            'comment' => '権限',
        ]);

        // 共通カラム
        $table->addColumn('created', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '作成日時',
        ]);
        $table->addColumn('modified', 'datetime', [
            'null' => false,
            'default' => null,
            'comment' => '更新日時',
        ]);
        $table->create();
    }

    public function down()
    {
        $this->table('employees')->drop()->save();
    }
}
