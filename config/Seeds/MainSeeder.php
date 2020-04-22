
<?php

use Phinx\Seed\AbstractSeed;

/**
 * Seeder実行クラス
 * phinx seed:run コマンドでは実行順序を制御できないため実行時に外部キー制約によるエラーが発生する
 * 当クラスでは定義した順序に従ってseedを実行する
 */
class MainSeeder extends AbstractSeed
{
    // シーダークラスを実行順に指定
    protected $seedClasses = [
        EmployeesSeed::class,
        ProductsSeed::class,
        FoodsSeed::class,
    ];

    public function run()
    {
        foreach ($this->seedClasses as $seedClass) {
            $seeder = new $seedClass;
            $seeder->setAdapter($this->getAdapter());
            $seeder->run();
        }
    }
}
