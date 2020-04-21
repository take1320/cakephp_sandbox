<?php

use Phinx\Migration\AbstractMigration;

class CreateFoods extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('foods', [
            'collation' => 'utf8mb4_unicode_ci',
            'comment' => '食品'
        ]);
        $table->addColumn('product_id', 'integer', [
            'null' => false,
            'comment' => '商品ID',
        ]);
        $table->addColumn('serving_size', 'integer', [
            'null' => false,
            'comment' => '内容量(g)',
        ]);
        $table->addColumn('shelf_life_day', 'integer', [
            'null' => false,
            'comment' => '品質保持日数',
        ]);
        // TODO: お酒判定
        // TODO: JANコード?
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

        $table = $this->table('foods');
        $table->addForeignKey('product_id', 'products', 'id', [
            'delete' => 'CASCADE',
            'update' => 'CASCADE'
        ]);
        $table->update();
    }

    public function down()
    {
        $this->table('foods')
            ->dropForeignKey(
                'product_id'
            )->save();

        $this->table('foods')->drop()->save();
    }
}
