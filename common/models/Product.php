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
            [['price'], 'double'],
            [['image_id'], 'integer'],
            [['description'], 'text'],
            [['sku'], 'integer'],
            [['barcode'], 'string'],
            [['quantity'], 'integer'],
            [['status'], 'integer'],
            [['date_added'], 'datetime'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
            'image_id' => 'ID изображения',
            'description' => 'Описание',
            'sku' => 'Артикул',
            'barcode' => 'Штрихкод',
            'quantity' => 'Количество',
            'status' => 'Статус',
            'date_added' => 'Когда добавлен',
        ];
    }
    
    public function getImage() {
        return $this->hasOne(Image::class, ['id' => 'image_id']);
    }
}