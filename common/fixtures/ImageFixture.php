<?php

namespace common\fixtures;

use yii\test\ActiveFixture;

class ImageFixture extends ActiveFixture
{
    public $modelClass = 'common\models\Image';
    
    public function load()
    {
        $faker = \Faker\Factory::create();
		for ($i = 0; $i <= 20; $i++) {
            $this->data[] = [
				'id' => $i,
                'url' => $faker->url,
            ];
        }
         
        parent::load();
    }
}
