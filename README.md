# CakePHP 検証リポジトリ

CakePHP3 の機能確認を行うためのリポジトリです。

## 環境構築

dockerを利用した開発を前提としています。

### .envの設定

ローカル環境用`.env`の設定

    cp ./config/.env.local ./config/.env

### dockerの起動

起動

    docker-compose up -d

マイグレーション実行

    docker-compose exec phpfpm bin/cake migrations migrate

停止

    docker-compose down

### 動作確認

- URL
  - `http://localhost:8081`

## 開発 Tips

### パッケージインストールをローカルディレクトリに実行

    docker run --rm --interactive --tty -v $PWD:/var/www/html cakephp-sandbox_phpfpm composer install

### phinx migrationファイル作成

    docker-compose exec phpfpm php vendor/bin/phinx create {マイグレーションクラス名}

### bakeコマンド

    docker-compose exec phpfpm bin/cake bake all {テーブル名}

### マイグレーション migrate & rollback

    docker-compose exec phpfpm bin/cake migrations migrate
    docker-compose exec phpfpm bin/cake migrations rollback

### シーダーの実行

    docker-compose exec phpfpm php vendor/bin/phinx seed:run

### フォーマッタ php-cs-fixer

    # dry-run
    docker-compose exec phpfpm ./vendor/bin/php-cs-fixer fix --dry-run --diff --diff-format udiff ./src
    # run
    docker-compose exec phpfpm ./vendor/bin/php-cs-fixer fix --diff --diff-format udiff ./src

#### php-cs-fixerの設定変更

- 設定は`.php_cs.dist` より行います。
- 設定値については[こちら](https://mlocati.github.io/php-cs-fixer-configurator/#version:2.16|configurator)から確認・定義出力が可能です。
