<?php

use Phinx\Migration\AbstractMigration;

class CreateSessions extends AbstractMigration
{

    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `sessions` (
  `id` char(40) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data` blob DEFAULT NULL,
  `expires` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQL;
        $this->execute($sql);
    }

    public function down()
    {
        $this->table('sessions')->drop()->save();
    }
}
