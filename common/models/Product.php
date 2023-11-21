<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Product extends ActiveRecord
{
	public static function tableName() {
		return 'product';
	}
	
	public const STATUS_ACTIVE = 'active';
	public const STATUS_WAITING = 'waiting';
	public const STATUS_PRE_ORDER = 'pre_order';

	public function behaviors(){
		return [
			[
				'class' => TimestampBehavior::className(),
				'attributes' => [
					ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
					ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
				],
				'value' => new Expression('NOW()'), // For DATETIME format instead TIMESTAMP
			],
		];
	}

	public function rules() {
		return [
			[['name', 'price'], 'required'],
			[['name'], 'string'],
			[['description'], 'string'],
			[['price'], 'double'],
			[['quantity'], 'integer'],
			[['image_id'], 'integer'],
			[['sku'], 'integer'],
			[['barcode'], 'string'],
			[['created_at', 'updated_at'], 'safe'],
		];
	}

	public function attributeLabels() {
		return [
			'id' => 'ID',
			'name' => 'Название',
			'description' => 'Описание',
			'price' => 'Цена',
			'quantity' => 'Количество',
			'image_id' => 'ID изображения',
			'sku' => 'Артикул',
			'barcode' => 'Штрихкод',
			'created_at' => 'Когда добавлен',
			'updated_at' => 'Когда изменён',
		];
	}

	public function getImage() {
	return $this->hasOne(Image::class, ['id' => 'id']);
	}
}
