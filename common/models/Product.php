<?php

namespace common\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName() {
        return 'product';
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
            [['date_added'], 'datetime'],
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
            'date_added' => 'Когда добавлен',
        ];
    }
    
    public function getImage() {
        return $this->hasOne(Image::class, ['id' => 'id']);
    }
}