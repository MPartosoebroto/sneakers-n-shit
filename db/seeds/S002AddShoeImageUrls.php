<?php


use Phinx\Seed\AbstractSeed;

class S002AddShoeImageUrls extends AbstractSeed
{
    public function run()
    {
        $this->execute("
            INSERT INTO shoe_images (SHOE_ID, IMAGE_URL)
                VALUES
                  (1, 'https://pbs.twimg.com/media/DFmNkjvU0AAYixV.jpg'),
                  (2, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/zwnqu2emjltkspwxjcvs/air-max-93-herenschoen-CJ5htx.jpg'),
                  (3, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/nnlbjfn53g8az6bqcwde/air-max-97-ultra-17-herenschoen-KlJ5C8.jpg'),
                  (4, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/rvowiaueoo9b6pev3vjd/air-max-1-herenschoen-GjP8rz.jpg'),
                  (5, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/sjsdbrifujzaic1imvg8/air-max-270-flyknit-herenschoen-1ld5NV.jpg'),
                  (6, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/dd5xjngvnsmuc81xawgv/air-max-90-herenschoen-fZs9lt.jpg'),
                  (7, 'https://c.static-nike.com/a/images/t_PDP_864_v1/f_auto/fdzahwprexmkepaucuhm/air-max-95-herenschoen-t2DTvw.jpg')
        ");
    }
}
