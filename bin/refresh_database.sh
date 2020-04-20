#!/bin/sh

set -ex

# rollback all
bin/cake migrations rollback -t 0

# migrate
bin/cake migrations migrate

# seeder run
php vendor/bin/phinx seed:run

# TODO: キャッシュクリアが必要なケースが判明したらコメントアウト削除
#bin/cake cache clear_all
