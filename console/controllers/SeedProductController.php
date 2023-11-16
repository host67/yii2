<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\Product;

class SeedProductController extends Controller
{
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();
        $counter = 0;

        while ( $counter < 20 ) {
            $product = new Product(); // здесь создаем каждый раз новый экземпляр

            $product->name = $faker->name;
			$product->description = $faker->text($maxNbChars = 200);
			$product->price  = $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 999);
			$product->quantity = $faker->randomNumber($nbDigits = 2, $strict = false);
			$product->sku = $faker->randomNumber($nbDigits = 5, $strict = false);
			$product->barcode = $faker->ean13;
            $product->status = '?'; //todo

            $preparedDateTime = $faker->dateTime($max = 'now', $timezone = 'Europe/Moscow')
                ->getTimestamp();
			$product->date_added = date('Y-m-d H:i:s', $preparedDateTime);

            if(!$product->save()) {
                print_r($product->getErrors());die;
            }

            $product->save();
            ++$counter;
        }
    }
}
