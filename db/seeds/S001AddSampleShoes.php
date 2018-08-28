<?php


use Phinx\Seed\AbstractSeed;

class S001AddSampleShoes extends AbstractSeed
{
    public function run()
    {
        $this->execute("
            INSERT INTO shoes (SHOE_ID, SHOE_NAME, PRICE, RELEASE_DATE, ADDED)
              VALUES
              (1, 'Nike Flyknit Trainer', 15000, '2018/07/24', NOW()),
              (2, 'Nike Air Max 93', 14500, '2018/07/27', NOW()),
              (3, 'Nike Air Max 97 Ultra', 18000, '2018/08/16', NOW()),
              (4, 'Nike Air Max 1', 13500, '2018/09/06', NOW()),
              (5, 'Nike Air Max 270', 15000, '2018/09/13', NOW()),
              (6, 'Nike Air Max 90', 14000, '2018/09/17', NOW()),
              (7, 'Nike Air Max 95', 18000, '2018/09/22', NOW())
        ");
    }
}
