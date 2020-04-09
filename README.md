# CakePHP 検証リポジトリ

CakePHP3 の機能確認を行うためのリポジトリです。

## 環境構築

ローカル環境用`.env`の設定

```
$ cp ./config/.env.local ./config/.env
```

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

## 開発用コマンド

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
