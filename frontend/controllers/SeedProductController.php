<?php

namespace frontend\controllers;
 
use yii;
use yii\web\Controller;
use common\models\Product;
 
class SeedProductController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();
        $product = new Product();
        for ( $i = 1; $i <= 20; $i++ ) {
            $product->setIsNewRecord(true);
            $product->id = $i;
            $product->name = $faker->name;
			$product->description = $faker->text($maxNbChars = 200);
			$product->price  = $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 999);
			$product->quantity = $faker->randomNumber($nbDigits = 2, $strict = false);
			$product->sku = $faker->randomNumber($nbDigits = 5, $strict = false);
			$product->barcode = $faker->ean13;
			echo '<br>'.$faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s');
			//Из-за этой строки не записывается в БД
			//$product->date_added = $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s');
			$product->save();
        }
    }
}
