<?php


use Phinx\Migration\AbstractMigration;

class AddAddedColumnToShoesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            ALTER TABLE shoes ADD COLUMN ADDED DATETIME NOT NULL AFTER RELEASE_DATE
        ');
    }
}
