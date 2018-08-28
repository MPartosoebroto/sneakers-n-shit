<?php


use Phinx\Migration\AbstractMigration;

class CreateShoeImagesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE shoe_images (
              SHOE_IMAGE_ID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              SHOE_ID INT(11) UNSIGNED NOT NULL,
              IMAGE_URL VARCHAR(256) NOT NULL,
              FOREIGN KEY fk_shoe(SHOE_ID)
                REFERENCES shoes(SHOE_ID)
                ON UPDATE CASCADE
                ON DELETE RESTRICT
              )
        ');
    }
}
