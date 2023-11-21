<?php

namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\Image;
use common\models\Product;

class SeedDataController extends Controller
{
	public const STATUS_ACTIVE = 'active';
	public const STATUS_WAITING = 'waiting';
	public const STATUS_PREORDER = 'pre-order';

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
			
			$image = new Image();
			$counter % 2 == 0 ? $image->url = $faker->url : $image->url = null;

			if( $image->save() == false ) {
				var_dump($product->getErrors()); die;
			}

			++$counter;
		}
	}
}
