<?php

use $useClassName;

class $className extends AbstractMigration
{
    public function up()
    {
        // $table = $this->table('sample', [
        //     'collation' => 'utf8mb4_unicode_ci',
        //     'comment' => 'サンプル情報'
        // ]);
        // // 必要なカラムを定義
        // // 共通カラム
        // $table->addColumn('created', 'datetime', [
        //     'null' => false,
        //     'default' => null,
        //     'comment' => '作成日時',
        // ]);
        // $table->addColumn('modified', 'datetime', [
        //     'null' => false,
        //     'default' => null,
        //     'comment' => '更新日時',
        // ]);
        // $table->create();
    }

    public function down()
    {
        // $this->table('sample')->drop()->save();
    }
}
