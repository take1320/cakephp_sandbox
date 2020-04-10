# CakePHP 検証リポジトリ

CakePHP3 の機能確認を行うためのリポジトリです。

## 環境構築

### .envの設定

ローカル環境用`.env`の設定

```
$ cp ./config/.env.local ./config/.env
```

### dockerによる環境構築
dockerを起動

```
$ docker-compose up -d
```

マイグレーション実行

```
$ docker-compose exec phpfpm bin/cake migrations migrate
```

composer installをローカルディレクトリに実行（コード参照用等）

```
$ docker run --rm --interactive --tty -v $PWD:/var/www/html cakephp_sandbox_phpfpm composer install
```

## 開発 Tips

### コマンド
phinx migrationファイル作成

```
$ docker-compose exec phpfpm php vendor/bin/phinx create {マイグレーションクラス名}
```

bakeコマンド

```
$ docker-compose exec phpfpm bin/cake bake all {テーブル名}
```

マイグレーション migrate & rollback

```
$ docker-compose exec phpfpm bin/cake migrations migrate
$ docker-compose exec phpfpm bin/cake migrations rollback
```

### フォーマッタ

php-cs-fixerの実行
```
# dry-run
$ docker-compose exec phpfpm ./vendor/bin/php-cs-fixer fix --dry-run --diff --diff-format udiff ./src
# run
$ docker-compose exec phpfpm ./vendor/bin/php-cs-fixer fix --diff --diff-format udiff ./src
```

php-cs-fixerの設定変更
`.php_cs.dist` を使って設定しています。
設定値については[こちら](https://mlocati.github.io/php-cs-fixer-configurator/#version:2.16|configurator)から確認・定義出力が可能です。
