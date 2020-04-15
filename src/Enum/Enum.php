<?php

namespace App\Enum;

/**
 * @see https://qiita.com/Hiraku/items/71e385b56dcaa37629fe
 */
abstract class Enum
{
    private $scalar;

    // __construct newされたとき実行される
    public function __construct($value)
    {
        $ref = new \ReflectionObject($this);
        $consts = $ref->getConstants();
        if (!in_array($value, $consts, true)) {
            throw new \InvalidArgumentException;
        }

        $this->scalar = $value;
    }

    // __callStatic 存在しない静的メソッドが呼び出されたとき実行される
    // $name 静的メソッドとして実行しようとしたメソッド名 例）Hoge::FUGA() の場合、"FUGA"
    // $args 静的メソッドとして実行しようとしたメソッドの引数 例）Hoge::FUGA('piyo') の場合、"piyo"
    final public static function __callStatic($name, $args)
    {
        // get_called_class 静的メソッドのコール元クラス名を取得
        // 例） App\Enum\Hoge::FUGA()を指定した場合、"App\Enum\Hoge"を取得
        $class = get_called_class();

        // 呼び出し元クラスの定数を取得
        // 例） App\Enum\Hoge::FUGA()を指定した場合、"App\Enum\Hoge"の定数"FUGA"の値を取得
        $const = constant("$class::$name");

        // 指定したクラスと、定数値にてnewした結果を返す
        return new $class($const);
    }

    final public function valueOf()
    {
        return $this->scalar;
    }

    final public function __toString()
    {
        return (string) $this->scalar;
    }
}
