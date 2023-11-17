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
			$product = new Product();

			$product->name = $faker->name;
			$product->description = $faker->text($maxNbChars = 200);
			$product->price  = $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 999);
			$product->quantity = $faker->randomNumber($nbDigits = 2, $strict = false);
			$product->sku = $faker->randomNumber($nbDigits = 5, $strict = false);
			$product->barcode = $faker->ean13;

			if( $product->save() == false ) {
				var_dump($product->getErrors()); die;
			}

			++$counter;
		}
	}
}
