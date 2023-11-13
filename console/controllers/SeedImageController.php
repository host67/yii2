<?php

namespace console\controllers;
 
use yii;
use yii\console\Controller;
use common\models\Image;
 
class SeedImageController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();
        $image = new Image();
        for ( $i = 1; $i <= 20; $i++ ) {
            $image->setIsNewRecord(true);
            $image->id = $i;
            $i % 2 == 0 ? $image->url = $faker->url : $image->url = null;
            $image->save();
        }
    }
}
