<?php

namespace console\controllers;
 
use yii;
use yii\console\Controller;
use common\models\Image;
 
class ExampleController extends Controller
{
    public function actionHello($name = 'World')
    {
        $faker = \Faker\Factory::create();
        echo 'Hello ' . $name . '!' . PHP_EOL;
        $image = new Image();
        for ( $i = 2; $i <= 20; $i++ ) {
            $image->setIsNewRecord(true);
            $image->id = $i;
            $i % 2 == 0 ? $image->url = $faker->url : $image->url = null;
            $image->save();
        }
    }
}