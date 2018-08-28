<?php

use Phinx\Migration\AbstractMigration;

class CreateShoesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE shoes (
              SHOE_ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              SHOE_NAME VARCHAR(64) NOT NULL,
              PRICE INT(11) UNSIGNED,
              RELEASE_DATE DATE
            )
        ');
    }
}
